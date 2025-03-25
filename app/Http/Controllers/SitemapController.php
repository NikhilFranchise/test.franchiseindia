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
            $siteMapTerminator  = "</urlset>";

            $saveSitemap = function ($sitemapContent, $filename) use ($siteMapInitializer, $siteMapTerminator) {
                $sitemapFullContent = $siteMapInitializer . $sitemapContent . $siteMapTerminator;
                file_put_contents(public_path($filename), $sitemapFullContent);
            };

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
            //changes by GP 12-August-2024
            /* Category page Site map Generation Start */
            $categories       = Config('category.SeoCategoryArr');
            unset($categories[5]);
            $locations        = Config('location.stateArr');
            $range            = Config('constants.InvestRange');
            $subCategories    = Config('category.SeoSubCategoryArr');
            $subSubCategories = Config('category.SeoSubSubCategoryArr');
            $siteMapData      = '<url>
                                <loc>https://www.franchiseindia.com/business-opportunities/all/all</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-50k</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-2lac</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-5lac</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-10lac</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-20lac</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-30lac</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-50lac</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-1cr</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-2cr</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-under-5cr</loc>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/business-opportunities/franchises-5cr-or-above</loc>
                            </url>';

            foreach ($categories as $key => $category) {
                $siteMapData .= "<url>
                            <loc>https://www.franchiseindia.com/business-opportunities/" . $category . ".m" . $key . "</loc>
                            <lastmod>" . date('Y-m-d') . "</lastmod>
                        </url>";
                foreach ($locations as $key1 => $location) {
                    $siteMapData .= "<url>
                                    <loc>https://www.franchiseindia.com/business-opportunities/" . $category . "-in-" . Str::slug($location) . "/mc-" . $key . "/loc-" . $key1 . "</loc>
                                    <lastmod>" . date('Y-m-d') . "</lastmod>
                                </url>";
                }

                foreach ($range as $key2 => $price) {

                    $range1  = Config('constants.InvestRange');
                    foreach ($range1 as $key3 => $price2) {
                        $siteMapData .= "<url>
                                    <loc>https://www.franchiseindia.com/business-opportunities/" . $category . "-in-india/mc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>
                                    <lastmod>" . date('Y-m-d') . "</lastmod>
                                </url>";
                    }
                }
            }


            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_category.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            /* Category page Site map Generation End */


            $siteMapData = "";
            foreach ($locations as $key => $location) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/business-opportunities/" . Str::slug($location) . ".LOC" . $key . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_category_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024


            $siteMapData = "";
            foreach ($subCategories as $key => $category) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/business-opportunities/" . $category . ".sc" . $key . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";

                foreach ($locations as $key1 => $location) {
                    $siteMapData .= "<url>
                                    <loc>https://www.franchiseindia.com/business-opportunities/" . $category . "-in-" . Str::slug($location) . "/sc-" . $key . "/loc-" . $key1 . "</loc>
                                    <lastmod>" . date('Y-m-d') . "</lastmod>
                                </url>";
                }

                foreach ($range as $key2 => $price) {
                    foreach ($range as $key3 => $price2) {
                        $siteMapData .= "<url>
                                        <loc>https://www.franchiseindia.com/business-opportunities/" . $category . "-in-india/sc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>
                                        <lastmod>" . date('Y-m-d') . "</lastmod>
                                    </url>";
                    }
                }
            }

            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_scategory_price_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024


            $siteMapData = "";
            $subCount    = 0;
            foreach ($subSubCategories as $key => $category) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/business-opportunities/" . $category . ".ssc" . $key . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";

                foreach ($locations as $key1 => $location) {
                    $siteMapData .= "<url>
                                    <loc>https://www.franchiseindia.com/business-opportunities/" . $category . "-in-" . Str::slug($location) . "/ssc-" . $key . "/loc-" . $key1 . "</loc>
                                    <lastmod>" . date('Y-m-d') . "</lastmod>
                                </url>";
                    ++$subCount;

                    if ($subCount % 10000 == 0) {
                        //changes by GP 12-August-2024
                        file_put_contents(public_path("sitemap_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        //changes by GP 12-August-2024

                        $siteMapData = "";
                    }
                }

                foreach ($range as $key2 => $price) {

                    foreach ($range as $key3 => $price1) {
                        if ($price['min'] < $price1['max']) {
                            $siteMapData .= "<url>
                                        <loc>https://www.franchiseindia.com/business-opportunities/" . $category . "-in-india/ssc-" . $key . "/range-" . $price['min'] . "-" . $price1['max'] . "</loc>
                                        <lastmod>" . date('Y-m-d') . "</lastmod>
                                    </url>";
                            ++$subCount;

                            if ($subCount % 10000 == 0) {
                                //changes by GP 12-August-2024
                                file_put_contents(public_path("sitemap_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                                //changes by GP 12-August-2024

                                $siteMapData = "";
                            }
                        }
                    }
                    ++$subCount;

                    if ($subCount % 10000 == 0) {
                        //changes by GP 12-August-2024
                        file_put_contents(public_path("sitemap_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        //changes by GP 12-August-2024
                        $siteMapData = "";
                    }
                }
                ++$subCount;

                if ($subCount % 10000 == 0) {
                    //changes by GP 12-August-2024
                    file_put_contents(public_path("sitemap_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                    //changes by GP 12-August-2024
                    $siteMapData = "";
                }
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_sscategory_price_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024
            /* Category page Site map Generation End */




            /* Hindi Category page Site map Generation Start */
            $siteMapData  = '<url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/all/all</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-50k</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-2lac</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-5lac</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-10lac</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-20lac</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-30lac</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-50lac</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-1cr</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-2cr</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-under-5cr</loc>
                        </url>
                        <url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/franchises-5cr-or-above</loc>
                        </url>';


            foreach ($categories as $key => $category) {
                $siteMapData .= "<url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . ".m" . $key . "</loc>
                            <lastmod>" . date('Y-m-d') . "</lastmod>
                        </url>";

                foreach ($locations as $key1 => $location) {
                    $siteMapData .= "<url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . "-in-" . Str::slug($location) . "/mc-" . $key . "/loc-" . $key1 . "</loc>
                            <lastmod>" . date('Y-m-d') . "</lastmod>
                        </url>";
                }

                foreach ($range as $key2 => $price) {
                    foreach ($range as $key3 => $price2) {
                        $siteMapData .= "<url>
                            <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . "-in-india/mc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>
                            <lastmod>" . date('Y-m-d') . "</lastmod>
                        </url>";
                    }
                }
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_hi_category.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            /* Category page Site map Generation End */

            $siteMapData = "";
            foreach ($locations as $key => $location) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/hi/business-opportunities/" . Str::slug($location) . ".LOC" . $key . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_hi_category_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024


            $siteMapData = "";
            foreach ($subCategories as $key => $category) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . ".sc" . $key . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";

                foreach ($locations as $key1 => $location) {
                    $siteMapData .= "<url>
                                    <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . "-in-" . Str::slug($location) . "/sc-" . $key . "/loc-" . $key1 . "</loc>
                                    <lastmod>" . date('Y-m-d') . "</lastmod>
                                </url>";
                }

                foreach ($range as $key2 => $price) {
                    foreach ($range as $key3 => $price2) {
                        $siteMapData .= "<url>
                                        <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . "-in-india/sc-" . $key . "/range-" . $price['min'] . "-" . $price2['max'] . "</loc>
                                        <lastmod>" . date('Y-m-d') . "</lastmod>
                                    </url>";
                    }
                }
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_hi_scategory_price_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024


            $siteMapData = "";
            $subCount    = 0;
            foreach ($subSubCategories as $key => $category) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . ".ssc" . $key . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";

                foreach ($locations as $key1 => $location) {
                    $siteMapData .= "<url>
                                    <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . "-in-" . Str::slug($location) . "/ssc-" . $key . "/loc-" . $key1 . "</loc>
                                    <lastmod>" . date('Y-m-d') . "</lastmod>
                                </url>";
                    ++$subCount;
                    if ($subCount % 10000 == 0) {
                        //changes by GP 12-August-2024
                        file_put_contents(public_path("sitemap_hi_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        //changes by GP 12-August-2024

                        $siteMapData = "";
                    }
                }

                foreach ($range as $key2 => $price) {
                    foreach ($range as $key3 => $price1) {
                        if ($price['min'] < $price1['max']) {
                            $siteMapData .= "<url>
                                        <loc>https://www.franchiseindia.com/hi/business-opportunities/" . $category . "-in-india/ssc-" . $key . "/range-" . $price['min'] . "-" . $price1['max'] . "</loc>
                                        <lastmod>" . date('Y-m-d') . "</lastmod>
                                    </url>";
                            ++$subCount;
                            if ($subCount % 10000 == 0) {
                                //changes by GP 12-August-2024
                                file_put_contents(public_path("sitemap_hi_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                                //changes by GP 12-August-2024

                                $siteMapData = "";
                            }
                        }
                    }
                    ++$subCount;
                    if ($subCount % 10000 == 0) {
                        //changes by GP 12-August-2024
                        file_put_contents(public_path("sitemap_hi_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        //changes by GP 12-August-2024
                        $siteMapData = "";
                    }
                }
                ++$subCount;

                if ($subCount % 10000 == 0) {
                    //changes by GP 12-August-2024
                    file_put_contents(public_path("sitemap_hi_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                    //changes by GP 12-August-2024

                    $siteMapData = "";
                }
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_hi_sscategory_price_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            /* Category page Site map Generation End */

            /* Top City Site map Generation Start */
            $siteMapData = "";
            $cities     = Config('location.City');
            foreach ($cities as $citi) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/location/" . str_replace('&', '&amp;', Str::slug($citi)) . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";
            }

            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_cities.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024


            /* Top City Site map Generation End */
            /* Articles Site map Generation Start */
            $siteMapData = "";
            // $articles    = ContentList::query()->where('site_type', 'fi')->where('status', 1)->orderBy('content_id', 'desc')->get();
            // foreach ($articles as $article) {
            //     $siteMapData .= "<url>
            //                     <loc>
            //                     https://www.franchiseindia.com/content/" . str_replace('&', '&amp;', $article->slug) . "." . $article->content_id . "</loc>
            //                     <lastmod>" . substr($article->created_at, 0, 10) . "</lastmod>
            //                 </url>";
            // }
            // //changes by GP 12-August-2024
            // file_put_contents(public_path("sitemap_articles.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);

            //changes by GP 12-August-2024


            /* Articles Site map Generation End */


            /* static url here */
            $siteMapData = "<url>
    <loc>https://www.franchiseindia.com/</loc>

  </url>
  <url>
    <loc>https://www.franchiseindia.com/about</loc>
    <lastmod>2013-08-06</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/contact/</loc>
    <lastmod>2017-08-06</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/feedback/</loc>
    <lastmod>2017-08-06</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/event</loc>
    <lastmod>2013-08-06</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/sitemap</loc>
    <lastmod>2013-08-06</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/international/</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/premiumbrand/</loc>
    <lastmod>2017-10-23</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/advertise/</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/investor/create/</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/franchisorregistration/</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/terms</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/fro_event/</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=srs</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=tc</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=fc</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=tango</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=syor</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=salon2014</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=salon2013</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=education2013</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=eretail2013</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=franchise2012</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=salon2012</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=restaurant2012</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=educaton2012</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=realestate2011</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=education2011</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=food2011</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=smallbusiness</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=fashionlifestyle</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=educaton2009</loc>
    <lastmod>2016-01-27</lastmod>
  </url>
  <url>
    <loc>https://www.franchiseindia.com/book/view?id=food2009</loc>
    <lastmod>2016-01-27</lastmod>
  </url>";

            file_put_contents(public_path("sitemap_static.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /* static url here */
            // Generate the main sitemap index file (links to sitemap_category.xml)
            $siteMapIndexData = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
            $siteMapIndexData .= "    <sitemap>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_brands.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_category.xml') . "</loc>\n";
            // $siteMapIndexData .= "<loc>" . url('sitemap_articles.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_category.xml') . "</loc>\n";
            // $siteMapIndexData .= "<loc>" . url('entrepreneur_sitemap.xml') . "</loc>\n";
            // $siteMapIndexData .= "<loc>" . url('sitemap_magazine.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_sscategory_price_location_60000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_sscategory_price_location_50000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_sscategory_price_location_40000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_sscategory_price_location_30000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_sscategory_price_location_20000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_sscategory_price_location_10000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_sscategory_price_location.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_scategory_price_location.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_sscategory_price_location_60000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_sscategory_price_location_50000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_sscategory_price_location_40000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_sscategory_price_location_30000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_sscategory_price_location_20000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_sscategory_price_location_10000.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_sscategory_price_location.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_scategory_price_location.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_hi_category_location.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_category_location.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/news.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/article.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/article2.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/interview.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/report.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/event.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/categories.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/subcategories.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/en/tags.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/news.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/article.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/interview.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/report.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/event.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/categories.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/subcategories.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('insights/hi/tags.xml') . "</loc>\n";
            $siteMapIndexData .= "<loc>" . url('sitemap_static.xml') . "</loc>\n";

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
