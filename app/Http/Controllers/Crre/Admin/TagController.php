<?php

namespace App\Http\Controllers\Crre\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crre\CrreSeotags;
use App\Models\Crre\CrreSeotagshindi;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function createTag($lang)
    {
        $tags = ($lang == 'hi') ? CrreSeotagshindi::pluck('name')->toArray() : CrreSeotags::pluck('name')->toArray();

        return view('crreAdmin.tag.create', ['lang' => $lang, 'tags' => $tags]);
    }

    public function storeTag(Request $request, $lang)
    {
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        $tagTable = ($lang == 'hi') ? new CrreSeotagshindi() : new CrreSeotags();
        $existingTag = $tagTable->where('name', $request->tag)->first();

        if ($existingTag) {
            return redirect()->back()->with('warning', 'This Tag already exists.');
        }

        $tagTable->name = $request->tag;
        $tagTable->save();

        return redirect()->route('crreAdmin.tag.list', ['lang' => $lang])->with('success', 'Tag Added Successfully.');
    }

    public function listTag(Request $request, $lang)
    {
        $tags = ($lang == 'hi') ? CrreSeotagshindi::query()->orderByDesc('tag_id') : CrreSeotags::query()->orderByDesc('tag_id');
        if (!empty($request->search))
            $tags = $tags->where('name', 'LIKE', '%' . $request->search . '%');
        $totalRecords = $tags->count();
        $tags = $tags->paginate(20);
        return view('crreAdmin.tag.list', compact('lang', 'tags', 'totalRecords'));
    }

    public function deleteTag($lang, $id)
    {
        $tagTable = ($lang == 'hi') ? CrreSeotagshindi::class : CrreSeotags::class;
        $tag = $tagTable::find($id);
        if (!$tag) {
            return redirect()->back()->with('error', 'Tag not found.');
        }
        $tag->delete();
        return redirect()->route('crreAdmin.tag.list', ['lang' => $lang])->with('success', 'Tag Deleted Successfully.');
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
            $model = ($lang === 'en') ? CrreSeotags::class : CrreSeotagshindi::class;

            $data = $model::query()
                ->select("tag_id", "name")
                ->where('name', 'LIKE', "%{$search}%")
                ->get();
        }
        // Return JSON response
        return response()->json($data);
    }
}
