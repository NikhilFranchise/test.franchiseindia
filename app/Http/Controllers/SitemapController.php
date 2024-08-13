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

            /* Brands Site map Generation start */
            $siteMapData  = '';
            //$brands      = FranchisorBusinessDetail::query()->where('profile_status', 1)->orderBy('fran_detail_id', 'desc')->get();
            $brands      = FranchisorBusinessDetail::query()->where('profile_status', 1)->where('ind_main_cat', '!=', 5)->orderBy('fran_detail_id', 'desc')->get();
            foreach ($brands as $brand) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/brands/" . str_replace('&', '&amp;', $brand->profile_name) . "." . $brand->fran_detail_id . "</loc>
                                <lastmod>" . date('Y-m-d', strtotime($brand->updated_at)) . "</lastmod>
                            </url>";
            }

            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_brands.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            //Storage::getFacadeRoot()->put("sitemap_brands.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /* Brands Site map Generation End */

            /* Articles Site map Generation Start */
            $siteMapData = "";
            $articles    = ContentList::query()->where('site_type', 'fi')->where('status', 1)->orderBy('content_id', 'desc')->get();
            foreach ($articles as $article) {
                $siteMapData .= "<url>
                                <loc>
                                https://www.franchiseindia.com/content/" . str_replace('&', '&amp;', $article->slug) . "." . $article->content_id . "</loc>
                                <lastmod>" . substr($article->created_at, 0, 10) . "</lastmod>
                            </url>";
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_articles.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);

            //changes by GP 12-August-2024

            //Storage::getFacadeRoot()->put("sitemap_articles.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);

            /* Articles Site map Generation End */

            /* Education Articles Site map Generation Start */
            $siteMapData = '<url>
                                <loc>https://www.franchiseindia.com/education/</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                            <loc>https://www.franchiseindia.com/education/about</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                            <loc>https://www.franchiseindia.com/education/contact/</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/education/feedback/</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/education/terms</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>';
            $eduArticles     = ContentList::query()->where('site_type', 'edu')->where('status', 1)->orderBy('content_id', 'desc')->get();

            foreach ($eduArticles as $article) {
                $siteMapData .= "<url>
                                    <loc>
                                    https://www.franchiseindia.com/education/" . str_replace('&', '&amp;', $article->slug) . "." . $article->content_id . "</loc>
                                    <lastmod>" . substr($article->created_at, 0, 10) . "</lastmod>
                                </url>";
            }

            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_educontent.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            //Storage::getFacadeRoot()->put("sitemap_educontent.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);

            /* Wellness Articles Site map Generation Start */
            $siteMapData = '<url>
                                <loc>https://www.franchiseindia.com/wellness/</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                            <loc>https://www.franchiseindia.com/wellness/about</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                            <loc>https://www.franchiseindia.com/wellness/contact/</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/wellness/feedback/</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>
                            <url>
                                <loc>https://www.franchiseindia.com/wellness/terms</loc>
                                <lastmod>' . date('Y-m-d') . '</lastmod>
                            </url>';
            $wellArticles     = ContentList::query()->where('site_type', 'wi')->where('status', 1)->orderBy('content_id', 'desc')->get();

            foreach ($wellArticles as $article) {
                $siteMapData .= "<url>
                                    <loc>
                                    https://www.franchiseindia.com/wellness/" . str_replace('&', '&amp;', $article->slug) . "." . $article->content_id . "</loc>
                                    <lastmod>" . substr($article->created_at, 0, 10) . "</lastmod>
                                </url>";
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_wellness.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            //Storage::getFacadeRoot()->put("sitemap_wellness.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /* Wellness Articles Site map Generation End */

            /* Article Kickers Site map Generation Start */
            $siteMapData = "";
            $kickers     = array_unique(ContentList::query()->select('kicker')->where('kicker', '!=', '')->where('status', 1)->get()->pluck('kicker')->toArray());
            foreach ($kickers as $kicker) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/content/" . str_replace('&', '&amp;', Str::slug($kicker)) . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_kicker.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

             //Storage::getFacadeRoot()->put("sitemap_kicker.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /* Article Kickers Site map Generation End */

            /* Hindi Article Kickers Site map Generation Start */
            $siteMapData  = '';
            $kickers     = SeoTagHindi::query()->get();
            foreach ($kickers as $kicker) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/hi/content/" . $kicker->name . "/" . $kicker->tag_id . "</loc>
                                <lastmod>" . date('Y-m-d') . "</lastmod>
                            </url>";
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_hindi_kicker.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            //Storage::getFacadeRoot()->put("sitemap_hindi_kicker.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /*Hindi Article Kickers Site map Generation End */

            /* Hindi Articles Site map Generation Start */
            $siteMapData  = '';
            $hiArticles     = ContentList::query()->where('is_hindi', 1)->where('status', 1)->orderBy('content_id', 'desc')->get();

            foreach ($hiArticles as $article) {
                $siteMapData .= "<url>
                                <loc>
                                https://www.franchiseindia.com/hi/" . Config('constants.articleArr.' . $article->site_type) . "/" . str_replace('&', '&amp;', $article->slug) . "." . $article->content_id . "</loc>
                                <lastmod>" . substr($article->created_at, 0, 10) . "</lastmod>
                            </url>";
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_hindi_content.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

             //Storage::getFacadeRoot()->put("sitemap_hindi_content.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /* Restaurant Articles Site map Generation End */




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

            //Storage::getFacadeRoot()->put("sitemap_category.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
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

            //Storage::getFacadeRoot()->put("sitemap_category_location.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);

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

            //Storage::getFacadeRoot()->put("sitemap_scategory_price_location.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);

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

                         //Storage::getFacadeRoot()->put("sitemap_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
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

                                //Storage::getFacadeRoot()->put("sitemap_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
                                $siteMapData = "";
                            }
                        }
                    }
                    ++$subCount;

                    if ($subCount % 10000 == 0) {
                        //changes by GP 12-August-2024
                        file_put_contents(public_path("sitemap_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        //changes by GP 12-August-2024
                        //Storage::getFacadeRoot()->put("sitemap_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        $siteMapData = "";
                    }
                }
                ++$subCount;

                if ($subCount % 10000 == 0) {
                    //changes by GP 12-August-2024
                    file_put_contents(public_path("sitemap_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                    //changes by GP 12-August-2024
                    //Storage::getFacadeRoot()->put("sitemap_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
                    $siteMapData = "";
                }
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_sscategory_price_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024
             //Storage::getFacadeRoot()->put("sitemap_sscategory_price_location.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
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

             //Storage::getFacadeRoot()->put("sitemap_hi_category.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
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

             //Storage::getFacadeRoot()->put("sitemap_hi_category_location.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);

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

             //Storage::getFacadeRoot()->put("sitemap_hi_scategory_price_location.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);

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

                        //Storage::getFacadeRoot()->put("sitemap_hi_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
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

                                //Storage::getFacadeRoot()->put("sitemap_hi_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
                                $siteMapData = "";
                            }
                        }
                    }
                    ++$subCount;
                    if ($subCount % 10000 == 0) {
                        //changes by GP 12-August-2024
                        file_put_contents(public_path("sitemap_hi_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        //changes by GP 12-August-2024
                        //Storage::getFacadeRoot()->put("sitemap_hi_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
                        $siteMapData = "";
                    }
                }
                ++$subCount;

                if ($subCount % 10000 == 0) {
                    //changes by GP 12-August-2024
                    file_put_contents(public_path("sitemap_hi_sscategory_price_location_" . $subCount . ".xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
                    //changes by GP 12-August-2024

                    //Storage::getFacadeRoot()->put("sitemap_hi_sscategory_price_location_" . $subCount . ".xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
                    $siteMapData = "";
                }
            }
            //changes by GP 12-August-2024
            file_put_contents(public_path("sitemap_hi_sscategory_price_location.xml"), $siteMapInitializer . $siteMapData . $siteMapTerminator);
            //changes by GP 12-August-2024

            //Storage::getFacadeRoot()->put("sitemap_hi_sscategory_price_location.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
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

            //Storage::getFacadeRoot()->put("sitemap_cities.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /* Top City Site map Generation End */

            return "Sitemaps generated successfully!";
        } catch (\Exception $e) {
            return "Error generating sitemaps: " . $e->getMessage();
        }
    }
}
