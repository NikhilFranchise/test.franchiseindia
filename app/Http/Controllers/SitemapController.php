<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentList;
use App\Models\SeoTagHindi;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Storage;

class SitemapController extends Controller
{
    public function sitemap()
    {
        try {
            ini_set('memory_limit', '-1');

            $siteMapInitializer = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
            $siteMapTerminator = "</urlset>";

            /* Brands Site map Generation start */
            $siteMapData = '';
            $brands = FranchisorBusinessDetail::query()->where('profile_status', 1)->where('ind_main_cat', '!=', 5)->orderBy('fran_detail_id', 'desc')->get();
            foreach ($brands as $brand) {
                $siteMapData .= "<url>
                                <loc>https://www.franchiseindia.com/brands/" . str_replace('&', '&amp;', $brand->profile_name) . "." . $brand->fran_detail_id . "</loc>
                                <lastmod>" . date('Y-m-d', strtotime($brand->updated_at)) . "</lastmod>
                            </url>";
            }

            Storage::put("sitemap_brands.xml", $siteMapInitializer . $siteMapData . $siteMapTerminator);
            /* Brands Site map Generation End */

            // Generate other sitemaps similarly...

            return "Sitemaps generated successfully!";
        } catch (\Exception $e) {
            return "Error generating sitemaps: " . $e->getMessage();
        }
    }
}
