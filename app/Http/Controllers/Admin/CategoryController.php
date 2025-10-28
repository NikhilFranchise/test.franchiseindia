<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsightCategory;
use App\Models\InsightsHindiCategory;
use App\Models\InsightsHindiSubCategory;
use App\Models\InsightSubcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // category functions here

    public function createCategory($lang)
    {
        session()->put('lang', $lang);
        return view('admin.category.create');
    }

    public function storeCategory(Request $request, $lang)
    {
        // Validate request
        $request->validate([
            'maincat' => 'required|string|max:255',
        ]);

        // Dynamic model
        $catModel = ($lang === 'en') ? new InsightCategory() : new InsightsHindiCategory();

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
            ->route('cat.list', ['lang' => $lang])
            ->with('success', 'Main Category created successfully.');
    }

    public function listCategory(Request $request, $lang)
    {
        // $locale = $request->segment(2); // Retrieve the locale
        $search = $request->input('search'); // Retrieve the search input

        // Determine the model based on the locale
        $categoryModel = $lang === 'en' ? InsightCategory::class : InsightsHindiCategory::class;

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

        return view('admin.category.list', compact('catdata', 'lang', 'totalRecords'));
    }

    public function editCategory($lang, $id)
    {
        $catClass = $lang === 'en' ? InsightCategory::class : InsightsHindiCategory::class;

        $editData = $catClass::find($id);

        if (!$editData) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        return view('admin.category.edit', compact('editData', 'lang'));
    }

    public function updateCategory($lang, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'maincat' => 'required|string|max:255',
        ]);
        $catClass = $lang === 'en' ? InsightCategory::class : InsightsHindiCategory::class;

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

        return redirect()->route('cat.list', ['lang' => $lang])->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($lang, $id)
    {
        try {
            // Determine the model class based on the locale
            $catclass = $lang == 'en' ? InsightCategory::class : InsightsHindiCategory::class;

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
        $model = $lang === 'en' ? InsightSubcategory::class : InsightsHindiSubCategory::class;
        $subcategories = $model::select('id', 'subcat_name')->where('mcat_id', $catid)->get();
        return response()->json($subcategories);
    }
    // sub category functions here
    public function createSubCategory($lang)
    {
        $cat = $lang == 'en'
            ? InsightCategory::all()
            : InsightsHindiCategory::all();

        $subCat = $lang == 'en'
            ? InsightSubcategory::class
            : InsightsHindiSubCategory::class;

        $subCategories = $subCat::query()
            ->select('mcat_id', 'subcat_name', 'slug')
            ->get()
            ->map(function ($item) use ($lang) {
                // Add lang so frontend can filter properly
                $item->lang = $lang;
                return $item;
            });

        return view('admin.subcategory.create', compact('cat', 'subCategories', 'lang'));
    }


    public function storeSubCategory(Request $request, $lang)
    {

        // dd($request->all());
        $request->validate([
            'maincat' => 'required|integer',
            'sub_categories' => 'required',
        ]);

        $subcatclass = $lang == 'en' ? InsightSubcategory::query() : InsightsHindiSubCategory::query();

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
        return redirect()->route('subcat.list', ['lang' => $lang])->with('success', 'Sub Category Created Successfully.');
    }




    public function listSubCategory(Request $request, $lang)
    {

        $search = $request->input('search'); // Retrieve search input

        // Determine the model based on locale
        $subcatModel = $lang === 'en' ? InsightSubcategory::class : InsightsHindiSubcategory::class;

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

        return view('admin.subcategory.list', compact('subCat', 'lang', 'totalRecords'));
    }
    public function editSubCategory($lang, $id)
    {
        // dd($lang, $id);
        $catClass = $lang === 'en' ? InsightCategory::class : InsightsHindiCategory::class;
        $subCatClass = $lang === 'en' ? InsightSubcategory::class : InsightsHindiSubCategory::class;

        $editData = $subCatClass::find($id);
        dd($editData);
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

        return view('admin.subcategory.create', compact('editData', 'lang', 'cat', 'subCategories'));
    }

    public function deleteSubCategory($lang, $id)
    {
        // dd($id, $lang);
        // Determine the appropriate subcategory model based on the locale
        try {
            $subcatclass = $lang == 'en'
                ? InsightSubcategory::class
                : InsightsHindiSubCategory::class;

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
