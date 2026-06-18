<?php

namespace App\Http\Controllers\Crre\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crre\CrreCategory;
use App\Models\Crre\CrreHindiCategory;
use App\Models\Crre\CrreHindiSubCategory;
use App\Models\Crre\CrreSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // category functions here

    public function createCategory($lang)
    {
        session()->put('lang', $lang);
        return view('crreAdmin.category.create');
    }

    public function storeCategory(Request $request, $lang)
    {
        // Validate request
        $request->validate([
            'maincat' => 'required|string|max:255',
        ]);

        // Dynamic model
        $catModel = ($lang === 'en') ? new CrreCategory() : new CrreHindiCategory();

        // Check for existing category
        $existing = $catModel->where('catname', $request->maincat)->first();

        if ($existing) {
            return redirect()->back()->with('warning', 'This Main Category already exists.');
        }

        // Generate slug (safe for all languages)
        $slug = $lang === 'en'
            ? Str::slug($request->maincat)
            : $request->slug; // fallback for Hindi

        // Insert the category
        $catModel->insert([
            'catname' => $request->maincat,
            'slug'    => $slug
        ]);

        return redirect()
            ->route('crreAdmin.cat.list', ['lang' => $lang])
            ->with('success', 'Main Category created successfully.');
    }

    public function listCategory(Request $request, $lang)
    {
        // $locale = $request->segment(2); // Retrieve the locale
        $search = $request->input('search'); // Retrieve the search input

        // Determine the model based on the locale
        $categoryModel = $lang === 'en' ? CrreCategory::class : CrreHindiCategory::class;

        // Build the query
        $query = $categoryModel::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('catname', 'LIKE', "%{$search}%")
                        ->orWhere('id', $search);
                });
            });
        $totalRecords = $query->count();
        $catdata = $query->orderByDesc('id')->paginate(10);

        return view('crreAdmin.category.list', compact('catdata', 'lang', 'totalRecords'));
    }

    public function editCategory($lang, $id)
    {
        $catClass = $lang === 'en' ? CrreCategory::class : CrreHindiCategory::class;

        $editData = $catClass::find($id);

        if (!$editData) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        return view('crreAdmin.category.edit', compact('editData', 'lang'));
    }

    public function updateCategory($lang, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'maincat' => 'required|string|max:255',
        ]);
        $catClass = $lang === 'en' ? CrreCategory::class : CrreHindiCategory::class;

        $category = $catClass::find($request->catid);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        // Generate slug (safe for all languages)
        $slug = $lang === 'en'
            ? Str::slug($request->maincat)
            : $request->slug; // fallback for Hindi

        $category->update([
            'catname' => $request->maincat,
            'slug' => $slug,
        ]);

        return redirect()->route('crreAdmin.cat.list', ['lang' => $lang])->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($lang, $id)
    {
        try {
            // Determine the model class based on the locale
            $catclass = $lang == 'en' ? CrreCategory::class : CrreHindiCategory::class;

            // Find and delete the category
            $category = $catclass::findOrFail($id);
            $category->delete();

            // Set a success message in the session
            return redirect()->back()->with('success', 'Category Deleted Successfully.');
        } catch (\Exception $e) {
            // Handle unexpected errors
            return redirect()->back()->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }

    // end category functions
    public function getSubcategories($lang, $catid)
    {
        $model = $lang === 'en' ? CrreSubCategory::class : CrreHindiSubCategory::class;
        $subcategories = $model::select('id', 'subcat_name')->where('mcat_id', $catid)->get();
        return response()->json($subcategories);
    }
    // sub category functions here
    public function createSubCategory($lang)
    {
        $cat = $lang == 'en'
            ? CrreCategory::all()
            : CrreHindiCategory::all();

        $subCat = $lang == 'en'
            ? CrreSubCategory::class
            : CrreHindiSubCategory::class;

        $subCategories = $subCat::query()
            ->select('mcat_id', 'subcat_name', 'slug')
            ->get()
            ->map(function ($item) use ($lang) {
                // Add lang so frontend can filter properly
                $item->lang = $lang;
                return $item;
            });

        return view('crreAdmin.subcategory.create', compact('cat', 'subCategories', 'lang'));
    }


    public function storeSubCategory(Request $request, $lang)
    {

        // dd($request->all());
        $request->validate([
            'maincat' => 'required|integer',
            'sub_categories' => 'required',
        ]);

        $subcatclass = $lang == 'en' ? CrreSubCategory::query() : CrreHindiSubCategory::query();

        // Main category ID and subcategories
        $maincatid = $request->maincat;
        $subcategories = $request->sub_categories;

        // Handle slugs (string or array)
        $slugs = [];
        if ($lang == 'hi') {
            if (is_array($request->sub_catslug)) {
                foreach ($request->sub_catslug as $slugValue) {
                    $slugs = array_merge($slugs, explode(',', $slugValue));
                }
            } else {
                $slugs = explode(',', $request->sub_catslug);
            }

            // Trim and clean slugs
            $slugs = array_map('trim', $slugs);
        }

        foreach ($subcategories as $key => $subcategoryName) {
            // Check if the subcategory already exists
            $exists = $subcatclass->where('mcat_id', $maincatid)
                ->where('subcat_name', $subcategoryName)
                ->exists();

            if (!$exists) {
                // Generate slug based on locale
                if ($lang == 'en') {
                    $finalSlug = Str::slug($subcategoryName);
                } else {
                    $finalSlug = isset($slugs[$key]) ? $slugs[$key] : Str::slug($subcategoryName);
                }

                // Insert the new subcategory
                $subcatclass->create([
                    'mcat_id' => $maincatid,
                    'subcat_name' => $subcategoryName,
                    'slug' => $finalSlug,
                ]);
            } else {
                // Flash error message and return if a subcategory exists
                return redirect()->back()->with('error', "Sub Category '{$subcategoryName}' already exists.");
            }
        }

        // Redirect with success message
        return redirect()->route('crreAdmin.subcat.list', ['lang' => $lang])->with('success', 'Sub Category Created Successfully.');
    }




    public function listSubCategory(Request $request, $lang)
    {

        $search = $request->input('search'); // Retrieve search input

        // Determine the model based on locale
        $subcatModel = $lang === 'en' ? CrreSubCategory::class : CrreHindiSubCategory::class;

        // Build the query
        $query = $subcatModel::with('category')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('subcat_name', 'LIKE', "%{$search}%")
                        ->orWhere('id', $search);
                });
            });
        $totalRecords = $query->count();
        $subCat = $query->orderByDesc('id')->paginate(10);

        return view('crreAdmin.subcategory.list', compact('subCat', 'lang', 'totalRecords'));
    }
    public function editSubCategory($lang, $id)
    {
        // dd($lang, $id);
        $catClass = $lang === 'en' ? CrreCategory::class : CrreHindiCategory::class;
        $subCatClass = $lang === 'en' ? CrreSubCategory::class : CrreHindiSubCategory::class;

        $editData = $subCatClass::find($id);
        // dd($editData);
        $cat = $catClass::all();
        $subCategories = $subCatClass::query()
            ->select('mcat_id', 'subcat_name', 'slug')
            ->get()
            ->map(function ($item) use ($lang) {
                // Add lang so frontend can filter properly
                $item->lang = $lang;
                return $item;
            });
        if (!$editData) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        return view('crreAdmin.subcategory.create', compact('editData', 'lang', 'cat', 'subCategories'));
    }

    public function deleteSubCategory($lang, $id)
    {
        // dd($id, $lang);
        // Determine the appropriate subcategory model based on the locale
        try {
            $subcatclass = $lang == 'en'
                ? CrreSubCategory::class
                : CrreHindiSubCategory::class;

            // Find and delete the subcategory
            $subcategory = $subcatclass::findOrFail($id);
            $subcategory->delete();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Sub Category Deleted Successfully.');
        } catch (\Exception $e) {
            // Handle unexpected errors
            return redirect()->back()->with('error', 'Failed to delete sub category: ' . $e->getMessage());
        }
    }
    // end sub category functions
}
