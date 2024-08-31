<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentList;
use App\Models\SeoTagHindi;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    public function sitemap()
    {
        try {
            ini_set('memory_limit', '-1');
            $siteMapInitializer = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
            $siteMapTerminator = "</urlset>";

            $subCategories = Config('constants.subCategoryArr');
            $subSubCategories = Config('constants.subSubCategoryArr');

            // Function to create and save sitemap files
            $saveSitemap = function ($sitemapContent, $filename) use ($siteMapInitializer, $siteMapTerminator) {
                $sitemapFullContent = $siteMapInitializer . $sitemapContent . $siteMapTerminator;
                file_put_contents(public_path($filename), $sitemapFullContent);
            };
            //Range constant
            $range = Config('constants.InvestRange');
            $locationState = Config('location.stateArr');

            // Master Category Sitemap
            $masterCategories = Config('constants.CategoryArr');
            $siteMapMasterCategory = '';
            foreach ($masterCategories as $key => $category) {
                $siteMapMasterCategory .= "<url>
                    <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($category) . ".m" . $key . "</loc>
                    <lastmod>" . date('Y-m-d') . "</lastmod>
                </url>";
            }
            if (!empty($siteMapMasterCategory)) {
                $saveSitemap($siteMapMasterCategory, "sitemap_mastercategory.xml");
            }



            //For Mastercat/catid/stateid
            $siteMapCategorywithlocationState = '';
            foreach ($locationState as $key1 => $location) {
                // Assuming $key1 corresponds to the location's key and $key to the master category key
                foreach ($masterCategories as $key => $category) {
                    // dd($category,$location,$key,$key1);
                    $siteMapCategorywithlocationState .= "<url>
                    <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($category) . "-in-" . Str::slug($location) . "/mc-" . $key . "/loc-" . $key1 . "</loc>
                    <lastmod>" . date('Y-m-d') . "</lastmod>
                </url>";
                }
            }
            if (!empty($siteMapCategorywithlocationState)) {
                $saveSitemap($siteMapCategorywithlocationState, "sitemap_MasterCategorywithlocationState.xml");
            }

            $siteMapMasterCategorywithRange = '';
            foreach ($masterCategories as $key => $category) {
                foreach ($range as $key2 => $price) {
                    $range1 = Config('constants.InvestRange');
                    foreach ($range1 as $key3 => $price2) {

                        $siteMapMasterCategorywithRange .= "<url>
                        <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($category) . "-in-india/mc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>
                        <lastmod>" . date('Y-m-d') . "</lastmod>
                    </url>";
                    }
                }
            }
            if (!empty($siteMapMasterCategorywithRange)) {
                $saveSitemap($siteMapMasterCategorywithRange, "sitemap_MasterCategorywithrange.xml");
            }

           
            $siteMapMasterCategoryData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
            $siteMapMasterCategoryData .= "<sitemap><loc>" . url($siteMapMasterCategory) . "</loc><lastmod>" . date('Y-m-d') . "</lastmod></sitemap>";
            $siteMapMasterCategoryData .= "<sitemap><loc>" . url('sitemap_MasterCategorywithrange.xml') . "</loc><lastmod>" . date('Y-m-d') . "</lastmod></sitemap>";
            $siteMapMasterCategoryData .= "<sitemap><loc>" . url('sitemap_MasterCategorywithlocationState.xml') . "</loc><lastmod>" . date('Y-m-d') . "</lastmod></sitemap>";
            $siteMapMasterCategoryData .= "</sitemapindex>";

            file_put_contents(public_path("sitemap_mastercategory.xml"), $siteMapMasterCategoryData);


            // Sub Category Sitemap
            $siteMapSubCategory = '';
            foreach ($subCategories as $masterKey => $subCats) {
                foreach ($subCats as $key => $subCategory) {
                    $siteMapSubCategory .= "<url>
                <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($subCategory) . ".sc" . $key . "</loc>
                <lastmod>" . date('Y-m-d') . "</lastmod>
            </url>";

                }
            }
            if (!empty($siteMapSubCategory)) {
                $saveSitemap($siteMapSubCategory, "sitemap_subcategory.xml");
            }


            //For Subcat/catid/stateid
            $siteMapSubCategorywithlocationState = '';
            foreach ($subCategories as $masterKey => $subCats) {
                foreach ($subCats as $key => $subCategory) {

                    $siteMapSubCategorywithlocationState .= "<url>
                        <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($subCategory) . "-in-" . Str::slug($location) . "/sc-" . $key . "/loc-" . $key1 . "</loc>
                        <lastmod>" . date('Y-m-d') . "</lastmod>
                    </url>";
                }
            }

            // Save the location city sitemap
            if (!empty($siteMapSubCategorywithlocationState)) {
                $saveSitemap($siteMapSubCategorywithlocationState, "sitemap_SubCategorywithlocationState.xml");
            }


            $siteMapSubCategorywithRange = '';
            $fileIndex = 1;
            $totalUrls = 0;
            $subcategoryFiles = [];
            foreach ($subCategories as $key => $subCats) {
                foreach ($subCats as $key => $subCategory) {

                    foreach ($range as $key2 => $price) {
                        $range1 = Config('constants.InvestRange');
                        foreach ($range1 as $key3 => $price2) {

                            $siteMapSubCategorywithRange .= "<url>
                        <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($subCategory) . "-in-india/sc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>
                        <lastmod>" . date('Y-m-d') . "</lastmod>
                    </url>";
                            $totalUrls++;
                            // Check if the URL count has reached 5000
                            if ($totalUrls >= 5000) {
                                $filename = "sitemap_subcategorywithrange_{$fileIndex}.xml";
                                $saveSitemap($siteMapSubCategorywithRange, $filename);
                                $subcategoryFiles[] = $filename;
                                $siteMapSubCategorywithRange = '';  // Reset the string for the next batch
                                $fileIndex++;
                                $totalUrls = 0;
                            }

                        }
                    }
                }
            }

            // Check if there are leftover URLs and create the last sitemap file
            if (!empty($siteMapSubCategorywithRange)) {
                $filename = "sitemap_subcategorywithrange_{$fileIndex}.xml";
                $saveSitemap($siteMapSubCategorywithRange, $filename);
                $subcategoryFiles[] = $filename;
            }


            // Generate the sitemap index file for the subcategory with range
            $siteMapSubCategoryIndexData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

            foreach ($subcategoryFiles as $file) {
                $siteMapSubCategoryIndexData .= "    <sitemap>\n";
                $siteMapSubCategoryIndexData .= "        <loc>" . url($file) . "</loc>\n";
                $siteMapSubCategoryIndexData .= "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                $siteMapSubCategoryIndexData .= "    </sitemap>\n";
            }

            $siteMapSubCategoryIndexData .= "</sitemapindex>";
            file_put_contents(public_path("sitemap_subcategorywithrange.xml"), $siteMapSubCategoryIndexData);



            $siteMapSubCategoryData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
            $siteMapSubCategoryData .= "<sitemap><loc>" . url($siteMapSubCategory) . "</loc><lastmod>" . date('Y-m-d') . "</lastmod></sitemap>";
            $siteMapSubCategoryData .= "<sitemap><loc>" . url('sitemap_SubCategorywithrange.xml') . "</loc><lastmod>" . date('Y-m-d') . "</lastmod></sitemap>";
            $siteMapSubCategoryData .= "<sitemap><loc>" . url('sitemap_SubCategorywithlocationState.xml') . "</loc><lastmod>" . date('Y-m-d') . "</lastmod></sitemap>";
            $siteMapSubCategoryData .= "</sitemapindex>";

            file_put_contents(public_path("sitemap_subcategory.xml"), $siteMapSubCategoryData);



            //For Subsubcat/catid/stateid
            $siteMapSubSUbCategorywithlocationState = '';
            foreach ($subSubCategories as $subCatKey => $subSubCats) {
                foreach ($subSubCats as $key => $subSubCategory) {


                    $siteMapSubSUbCategorywithlocationState .= "<url>
        <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($subSubCategory) . "-in-" . Str::slug($location) . "/sc-" . $key . "/loc-" . $key1 . "</loc>
        <lastmod>" . date('Y-m-d') . "</lastmod>
    </url>";

                }
            }
            //  dd($siteMapSubSUbCategorywithlocationState);
            // Save the location city sitemap

            if (!empty($siteMapSubSUbCategorywithlocationState)) {
                $saveSitemap($siteMapSubSUbCategorywithlocationState, "sitemap_SubSubCategorywithlocationState.xml");
            }




            // Sub-Sub Category Sitemap
            $siteMapSubSubCategory = '';
            $fileIndex = 1;
            foreach ($subSubCategories as $subCatKey => $subSubCats) {
                foreach ($subSubCats as $key => $subSubCategory) {
                    $siteMapSubSubCategory .= "<url>
                        <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($subSubCategory) . ".ssc" . $key . "</loc>
                        <lastmod>" . date('Y-m-d') . "</lastmod>
                    </url>";

                }
            }
            if (!empty($siteMapSubSubCategory)) {
                $saveSitemap($siteMapSubSubCategory, "sitemap_subsubcategory.xml");
            }

            // Generate the Category Sitemap (links to mastercategory, subcategory, and subsubcategory sitemaps)
            $siteMapCategoryData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
            foreach (glob(public_path('sitemap_mastercategory.xml')) as $filename) {
                $siteMapCategoryData .= "    <sitemap>\n";
                $siteMapCategoryData .= "        <loc>" . url(basename($filename)) . "</loc>\n";
                $siteMapCategoryData .= "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                $siteMapCategoryData .= "    </sitemap>\n";
            }
            foreach (glob(public_path('sitemap_subcategory.xml')) as $filename) {
                $siteMapCategoryData .= "    <sitemap>\n";
                $siteMapCategoryData .= "        <loc>" . url(basename($filename)) . "</loc>\n";
                $siteMapCategoryData .= "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                $siteMapCategoryData .= "    </sitemap>\n";
            }
            foreach (glob(public_path('sitemap_subsubcategory.xml')) as $filename) {
                $siteMapCategoryData .= "    <sitemap>\n";
                $siteMapCategoryData .= "        <loc>" . url(basename($filename)) . "</loc>\n";
                $siteMapCategoryData .= "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                $siteMapCategoryData .= "    </sitemap>\n";
            }
            $siteMapCategoryData .= "</sitemapindex>";
            file_put_contents(public_path("sitemap_category.xml"), $siteMapCategoryData);


            // Brands Sitemap
            $brands = FranchisorBusinessDetail::query()
                ->where('profile_status', 1)
                ->where('ind_main_cat', '!=', 5)
                ->orderBy('fran_detail_id', 'desc')
                ->get();

            $siteMapBrands = '';
            $fileIndex = 1;
            $totalUrls = 0;
            $brandsFiles = [];
            $latestUpdatedAt = null;

            foreach ($brands as $brand) {
                $siteMapBrands .= "<url>
                    <loc>https://www.franchiseindia.com/brands/" . str_replace('&', '&amp;', $brand->profile_name) . "." . $brand->fran_detail_id . "</loc>
                    <lastmod>" . date('Y-m-d', strtotime($brand->updated_at)) . "</lastmod>
                </url>";
                // Track the latest `updated_at` timestamp
                if ($latestUpdatedAt === null || strtotime($brand->updated_at) > strtotime($latestUpdatedAt)) {
                    $latestUpdatedAt = $brand->updated_at;
                }
                $totalUrls++;

                if ($totalUrls >= 5000) {
                    $filename = "sitemap_brands_{$fileIndex}.xml";
                    $saveSitemap($siteMapBrands, $filename);
                    $brandsFiles[] = $filename;
                    $siteMapBrands = '';
                    $fileIndex++;
                    $totalUrls = 0;
                }
            }

            // Check if there are leftover URLs and create the last sitemap file
            if ($totalUrls > 0) {
                $filename = "sitemap_brands_{$fileIndex}.xml";
                $saveSitemap($siteMapBrands, $filename);
                $brandsFiles[] = $filename;
            }

            // Generate the Brands Sitemap Index (sitemap_brands.xml)
            if (count($brandsFiles) > 0) {
                $siteMapBrandsIndexData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

                foreach ($brandsFiles as $file) {
                    $siteMapBrandsIndexData .= "    <sitemap>\n";
                    $siteMapBrandsIndexData .= "        <loc>" . url($file) . "</loc>\n";
                    $siteMapBrandsIndexData .= "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                    $siteMapBrandsIndexData .= "    </sitemap>\n";
                }

                $siteMapBrandsIndexData .= "</sitemapindex>";
                file_put_contents(public_path("sitemap_brands.xml"), $siteMapBrandsIndexData);
            }

            //For location State
            $siteMaplocationState = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

            foreach ($locationState as $key => $state) {
                $siteMaplocationState .= "<url>\n";
                $siteMaplocationState .= "    <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($state) . ".LOC" . $key . "</loc>\n";
                $siteMaplocationState .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                $siteMaplocationState .= "</url>\n";
            }
            $siteMaplocationState .= "</urlset>";
            // Save the location state sitemap
            file_put_contents(public_path("sitemap_locationState.xml"), $siteMaplocationState);

            //For location City
            $locationCity = Config('location.City');
            $siteMaplocationCity = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

            foreach ($locationCity as $key => $city) {
                $siteMaplocationCity .= "<url>\n";
                $siteMaplocationCity .= "    <loc>https://www.franchiseindia.com/location/" . Str::slug($city) . "</loc>\n";
                $siteMaplocationCity .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                $siteMaplocationCity .= "</url>\n";
            }
            $siteMaplocationCity .= "</urlset>";
            // dd($siteMaplocationCity);
            // Save the location city sitemap
            file_put_contents(public_path("sitemap_locationCity.xml"), $siteMaplocationCity);





            //For Subcategory in india/sc-id/range
            //  https://www.franchiseindia.com/business-opportunities/business-services-in-india/mc-6/range-50000-1000000

            $siteMapSubCategorywithRange = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

            foreach ($subCategories as $masterKey => $subCats) {
                foreach ($subCats as $key => $subCategory) {
                    foreach ($range as $key2 => $price) {
                        $range1 = Config('constants.InvestRange');
                        foreach ($range1 as $key3 => $price2) {

                            $siteMapSubCategorywithRange .= "<url>\n";
                            $siteMapSubCategorywithRange .= "  <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($subCategory) . "-in-india/sc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>\n";
                            $siteMapSubCategorywithRange .= "  <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                            $siteMapSubCategorywithRange .= "</url>\n";
                        }
                    }
                }
            }

            // dd($siteMapSubCategorywithRange);
            // Save the location city sitemap
            file_put_contents(public_path("sitemap_SubSubCategorywithlocationState.xml"), $siteMapSubCategorywithRange);


            //For SubSubcategory in india/ssc-id/range
            $siteMapSubSubCategorywithRange = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
            $totalUrls = 0;
            $fileIndex = 1;
            $subSubCategoryFiles = [];

            foreach ($subSubCategories as $subCatKey => $subSubCats) {
                foreach ($subSubCats as $key => $subSubCategory) {
                    foreach ($range as $key2 => $price) {
                        $range1 = Config('constants.InvestRange');
                        foreach ($range1 as $key3 => $price2) {
                            $siteMapSubSubCategorywithRange .= "<url>\n";
                            $siteMapSubSubCategorywithRange .= "  <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($subSubCategory) . "-in-india/sSc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>\n";
                            $siteMapSubSubCategorywithRange .= "  <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                            $siteMapSubSubCategorywithRange .= "</url>\n";
                            $totalUrls++;
                            // Check if the current file has reached the 5,000 URLs limit
                            if ($totalUrls >= 5000) {
                                $siteMapSubSubCategorywithRange .= "</urlset>"; // Close the XML structure
                                $filename = "sitemap_SubSubCategorywithlocationState_{$fileIndex}.xml";
                                file_put_contents(public_path($filename), $siteMapSubSubCategorywithRange);
                                $subSubCategoryFiles[] = $filename;

                                // Reset variables for the next file
                                $siteMapSubSubCategorywithRange = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
                                $totalUrls = 0;
                                $fileIndex++;
                            }
                        }
                    }
                }
            }

            // Save the last sitemap file if there are leftover URLs
            if ($totalUrls > 0) {
                $siteMapSubSubCategorywithRange .= "</urlset>"; // Close the XML structure

                $filename = "sitemap_SubSubCategorywithlocationState_{$fileIndex}.xml";
                file_put_contents(public_path($filename), $siteMapSubSubCategorywithRange);
                $subSubCategoryFiles[] = $filename;
            }

            // Generate the SubSubCategory Sitemap Index (sitemap_SubSubCategorywithlocationState.xml)
            if (count($subSubCategoryFiles) > 0) {
                $siteMapSubSubCategoryIndexData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

                foreach ($subSubCategoryFiles as $file) {
                    $siteMapSubSubCategoryIndexData .= "    <sitemap>\n";
                    $siteMapSubSubCategoryIndexData .= "        <loc>" . url($file) . "</loc>\n";
                    $siteMapSubSubCategoryIndexData .= "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
                    $siteMapSubSubCategoryIndexData .= "    </sitemap>\n";
                }

                $siteMapSubSubCategoryIndexData .= "</sitemapindex>";
                // dd($siteMapSubSubCategoryIndexData);
                file_put_contents(public_path("sitemap_SubSubCategorywithlocationState.xml"), $siteMapSubSubCategoryIndexData);
            }

            //articles


            // Generate the main sitemap index file (links to sitemap_category.xml)
            $siteMapIndexData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
            $siteMapIndexData .= "    <sitemap>\n";
            $siteMapIndexData .= "        <loc>" . url('sitemap_category.xml') . "</loc>\n";
            $siteMapIndexData .= "        <loc>" . url('sitemap_brands.xml') . "</loc>\n";
            $siteMapIndexData .= "        <loc>" . url('sitemap_locationState.xml') . "</loc>\n";
            $siteMapIndexData .= "        <loc>" . url('sitemap_locationCity.xml') . "</loc>\n";
            $siteMapIndexData .= "        <loc>" . url('sitemap_CategorywithlocationState.xml') . "</loc>\n";
            $siteMapIndexData .= "        <loc>" . url('sitemap_SubSubCategorywithlocationState.xml') . "</loc>\n";

            $siteMapIndexData .= "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
            $siteMapIndexData .= "    </sitemap>\n";
            $siteMapIndexData .= "</sitemapindex>";
            file_put_contents(public_path("sitemap.xml"), $siteMapIndexData);

            return "Sitemaps generated successfully!";

        } catch (\Exception $e) {
            return "Error generating sitemaps: " . $e->getMessage();
        }
    }
}
