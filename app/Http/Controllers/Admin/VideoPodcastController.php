<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FihlPodcastVideo;
use App\Models\FihlVideoCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class VideoPodcastController extends Controller
{
    public function podcastcreate($lang)
    {
        return view('admin.podcast.create', compact('lang'));
    }

    public function podcastore(Request $request, $lang)
    {
        try {
            $validator = validator($request->all(), [
                'podcastId' => 'required',
                'Podcast_url' => 'required|unique:fihl_podcstvideo,podcast_link',
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:150', // Make image optional if not always provided
                'podcast_dur' => 'required',
                'podcast_lang' => 'required',
                'content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $fihlvideo = new FihlPodcastVideo();

            $fihlvideo->podcast_id = $request->input('podcastId');
            $fihlvideo->podcast_link = $request->input('Podcast_url');
            $fihlvideo->title = $request->input('title');
            $fihlvideo->pod_lang = $request->input('podcast_lang');
            $fihlvideo->duration = $request->input('podcast_dur');
            $fihlvideo->podcast_type = 'A';
            $fihlvideo->status = 'A';
            $fihlvideo->category = 0;
            $fihlvideo->description = $request->input('content');
            $fihlvideo->create_date = Carbon::now();

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Define the upload path based on language
                $uploadPath =  config("constants.ARTICLE_UPLOAD_PATH");

                // Resize the image using Image Intervention (optional)
                $resizedImage = Image::make($image)->resize(512, 512)->encode('webp', 90);

                // Generate a unique image name (e.g., timestamp-based)
                $imageName = time() . '.webp';

                // Save the resized image to S3
                $path = Storage::disk('s3')->put($uploadPath . $imageName, $resizedImage->__toString(), 'public');

                // Now that the image is uploaded, save the full URL to the database
                if ($path) {
                    $fihlvideo->image_path = $imageName; // Full S3 URL
                    $fihlvideo->image = $imageName; // Full S3 URL
                }
            }


            // Save the podcast record
            $fihlvideo->save();
            // Redirect after success

            return redirect()->route('podcast.list', ['lang' => $lang])->with("success", 'Podcast Has Been Added');
        } catch (\Exception $e) {
            // Log the error and return a failure response
            Log::error('Error in podcastore: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the podcast.');
        }
    }

    public function podcastlist(Request $request, $lang)
    {
        $search = $request->input('search');

        $query = FihlPodcastVideo::query()
            ->where('podcast_type', 'A')
            ->where('pod_lang', $lang)
            ->whereIn('status', ['A', 'D'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('podcast_id', $search);
                });
            })
            ->orderByDesc('create_date');
        $podlist = $query->paginate(10);
        $totalRecords = $query->count();

        return view('admin.podcast.podlist', compact('podlist', 'lang', 'totalRecords'));
    }


    public function updatepodcastatus(Request $request)
    {
        $podId    = $request->podId;
        $status    = $request->status;
        FihlPodcastVideo::query()->where('sno', $podId)->update(['status' => $status]);
        return response()->json(['status' => $status, 'success' => 'Status Updated Successfully.']);
    }

    public function deletepodcast($lang, $id)
    {
        // dd($lang, $id);
        $data = FihlPodcastVideo::find($id);

        if (!$data) {
            return response()->json(['error' => 'Podcast not found.'], 404);
        }
        FihlPodcastVideo::query()->where('sno', $id)->where('pod_lang', $lang)->delete();
        return redirect()->route('podcast.list', ['lang' => $lang])->with('success', 'Podcast Deleted Successfully.');
    }

    public function podcastEdit($lang, $id)
    {
        $data = FihlPodcastVideo::query()->where('sno', $id)->first();
        return view('admin.podcast.edit', compact('data', 'lang'));
    }

    public function podcastUpdate(Request $request, $lang)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'podcastId'     => 'required',
            'Podcast_url'   => 'required',
            'title'         => 'required',
            'podcast_dur'   => 'required',
            'podcast_lang'  => 'required',
            'content'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator)->withInput();
        }

        try {
            // Find the existing podcast record
            $podcast = FihlPodcastVideo::where('sno', $request->p_id)->first();

            if (!$podcast) {
                return redirect()->back()->with('error', 'Podcast not found.');
            }

            // Handle image upload if provided
            $fimage = $podcast->image_path; // Default to existing image path

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Define the upload path for S3
                $uploadPath = config("constants.ARTICLE_UPLOAD_PATH");

                // Resize the image using Image Intervention (optional)
                $resizedImage = Image::make($image)->resize(512, 512)->encode('webp', 90);

                // Generate a unique filename
                $imageName = time() . '.webp'; // Unique file name based on the current time

                // Save the image to S3
                $path = Storage::getFacadeRoot()->disk('s3')->put($uploadPath . $imageName, $resizedImage->__toString(), 'public');

                // Generate the full URL of the image on S3
                if ($path) {
                    $fimage = $imageName; // Full S3 URL
                }
            }


            // Update the podcast attributes
            $updateData = [
                'podcast_id'   => $request->input('podcastId'),
                'podcast_link' => $request->input('Podcast_url'),
                'title'        => $request->input('title'),
                'image_path'   => $fimage,
                'image'   => $fimage,
                'duration'     => $request->input('podcast_dur'),
                'pod_lang'     => $request->input('podcast_lang'),
                'status'       => $request->input('status', 'A'),
                'podcast_type' => 'A', // Fixed type
                'description'  => $request->input('content'),
            ];

            Log::info('Podcast Update Data', $updateData);
            $podcast->update($updateData);


            // Redirect based on language
            // dd($podcast);
            return redirect()->route('podcast.list', ['lang' => $lang])->with('success', 'Podcast has been updated successfully.');
        } catch (\Exception $e) {
            // Log the error and return an error response
            Log::error('Error in podcastUpdate: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the podcast.');
        }
    }


    // video functions
    public function videoCreate($lang)
    {
        $category = FihlVideoCategory::all();
        return view('admin.videos.create', compact('category', 'lang'));
    }

    public function videostore(Request $request, $lang)
    {

        // dd($request->all(), $lang);
        try {
            $validator = validator($request->all(), [
                'videoId' => 'required',
                'category' => 'required',
                'title' => 'required',
                'video_duration' => 'required',
                'pod_lang' => 'required',
                'content' => 'required',
            ]);
            // dd($validator);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator) // ✅ Correct way
                    ->withInput();
            }

            $fihlvideo = new FihlPodcastVideo();

            $fihlvideo->videoID = $request->input('videoId');
            $fihlvideo->title = $request->input('title');
            $fihlvideo->pod_lang = $request->input('pod_lang');
            $fihlvideo->duration = $request->input('video_duration');
            $fihlvideo->podcast_type = 'V';
            $fihlvideo->status = 'A';
            $fihlvideo->category = $request->input('category');
            $fihlvideo->description = $request->input('content');
            $fihlvideo->create_date = Carbon::now();

            // Save the podcast record
            $fihlvideo->save();
            // Redirect after success

            return redirect()->route('video.list', ['lang' => $lang])->with("success", 'Video Has Been Added');
        } catch (\Exception $e) {
            // Log the error and return a failure response
            Log::error('Error in podcastore: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the video.');
        }
    }

    public function videoList(Request $request, $lang)
    {
        $search = $request->input('search');
        // Build the query
        $query = FihlPodcastVideo::query()
            ->with('VideoCategory')
            ->whereIn('status', ['A', 'D'])
            ->where('podcast_type', 'v')
            ->where('pod_lang', $lang);
        $query->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('videoID', $search);
            });
        });
        $videos = $query->orderBy('create_date', 'desc')->paginate(20);
        $totalRecords = $query->count();


        return view('admin.videos.list', compact('videos', 'lang', 'totalRecords'));
    }
    public function videoStatus(Request $request)
    {
        $videoId    = $request->vId;
        $status    = $request->status;
        FihlPodcastVideo::query()->where('sno', $videoId)->update(['status' => $status]);
        return response()->json(['status' => $status, 'success' => 'Status Updated Successfully.']);
    }

    public function videoEdit($lang, $id)
    {
        // dd($id, $lang);
        $category = FihlVideoCategory::all();
        $data = FihlPodcastVideo::query()->where('sno', $id)->first();
        return view('admin.videos.edit', compact('data', 'category', 'lang'));
    }

    public function videoUpdate(Request $request, $lang)
    {
        // dd($request->all(), $lang);
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'videoId'     => 'required',
            'category'   => 'required',
            'title'         => 'required',
            'video_duration'   => 'required',
            'pod_lang'  => 'required',
            'content'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Find the existing podcast record
            $video = FihlPodcastVideo::where('sno', $request->sno)->first();

            if (!$video) {
                return redirect()->back()->with('error', 'Video not found.');
            }


            // Update the podcast attributes
            $updateData = [
                'videoID'   => $request->input('videoId'),
                'category' => $request->input('category'),
                'title'        => $request->input('title'),
                // 'image_path'   => $fimage,
                // 'image'   => $fimage,
                'duration'     => $request->input('video_duration'),
                'pod_lang'     => $request->input('pod_lang'),
                'status'       => $request->input('status', 'A'),
                'podcast_type' => 'V', // Fixed type
                'description'  => $request->input('content'),
            ];

            Log::info('Video Update Data', $updateData);
            $video->update($updateData);


            // Redirect based on language
            // $route = $request->pod_lang === 'en' ? 'videolist' : 'hindivideolist';
            return redirect()->route('video.list', ['lang' => $lang])->with('success', 'Video has been updated successfully.');
        } catch (\Exception $e) {
            // Log the error and return an error response
            Log::error('Error in VideoUpdate: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the Video.');
        }
    }

    public function videoDelete($lang, $id)
    {
        $data = FihlPodcastVideo::find($id);

        if (!$data) {
            return response()->json(['error' => 'Video not found.'], 404);
        }
        FihlPodcastVideo::query()->where('sno', $id)->where('pod_lang', $lang)->delete();
        return redirect()->route('podcast.list', ['lang' => $lang])->with('success', 'Video Deleted Successfully.');
    }
}
