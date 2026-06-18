<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SeoTag;
use App\Models\SeoTagHindi;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function createTag($lang)
    {
        $tags = ($lang == 'hi') ? SeoTagHindi::pluck('name')->toArray() : SeoTag::pluck('name')->toArray();

        return view('admin.tag.create', ['lang' => $lang, 'tags' => $tags]);
    }

    public function storeTag(Request $request, $lang)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        $tagTable = ($lang == 'hi') ? new SeoTagHindi() : new SeoTag();
        $existingTag = $tagTable->where('name', $request->tag)->first();

        if ($existingTag) {
            return redirect()->back()->with('warning', 'This Tag already exists.');
        }

        $tagTable->name = $request->tag;
        $tagTable->save();

        return redirect()->route('tag.list', ['lang' => $lang])->with('success', 'Tag Added Successfully.');
    }

    public function listTag(Request $request, $lang)
    {
        $tags = ($lang == 'hi') ? SeoTagHindi::query()->orderByDesc('tag_id') : SeoTag::query()->orderByDesc('tag_id');
        if (!empty($request->search))
            $tags = $tags->where('name', 'LIKE', '%' . $request->search . '%');
        $totalRecords = $tags->count();
        $tags = $tags->paginate(20);
        return view('admin.tag.list', compact('lang', 'tags', 'totalRecords'));
    }

    public function deleteTag($lang, $id)
    {
        $tagTable = ($lang == 'hi') ? SeoTagHindi::class : SeoTag::class;
        $tag = $tagTable::find($id);
        if (!$tag) {
            return redirect()->back()->with('error', 'Tag not found.');
        }
        $tag->delete();
        return redirect()->route('tag.list', ['lang' => $lang])->with('success', 'Tag Deleted Successfully.');
    }

    /**
     * Function to retrieve tags using ajax
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function associatedTags(Request $request, $lang)
    {
        $data = [];
        $search = $request->q;
        if ($search) {
            $model = ($lang === 'en') ? SeoTag::class : SeoTagHindi::class;

            $data = $model::query()
                ->select("tag_id", "name")
                ->where('name', 'LIKE', "%{$search}%")
                ->get();
        }
        // Return JSON response
        return response()->json($data);
    }
}
