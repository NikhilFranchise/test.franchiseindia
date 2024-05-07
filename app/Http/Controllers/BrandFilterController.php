<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserClick;
use App\FranchisorTradePartner;
use App\UniqueVisit;
use App\ContentList;
use App\UserViewBrand;
use App\FranchisorSliderTenure;
use App\FranchisorLike;
use App\OiBrands;
use App\Models\FranchisorBusinessDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;



class BrandFilterController extends Controller
{
     /**
     * @return mixed
     */
	public function brandsitemap()
    {
	$brandsitemap = FranchisorBusinessDetail::query()
			->where('profile_status', 1)
			->orderBy('fran_detail_id', 'DESC')
			->take(100)
			->get();
	return view('franchisor/landing/brandsitemap', compact('brandsitemap'));
    }
	 
    public function brandfilter(Request $request)
    {
    $brandUrlParam     = $request->abre;
	$brandlist = FranchisorBusinessDetail::query()
		->where('company_name', 'LIKE', $brandUrlParam . '%')
		->where('profile_status', 1)
		->paginate(200);
		//->get();
	return view('franchisor/landing/brandfilter', compact('brandlist', 'brandUrlParam'));
    }
    public function topbrands()
{
    $franDetailIds = [
        "85046","12738","58200","11869","15829","28935","29235","21731","16842","62757",
        "73050","29220","19955","76825","17892","75529","2812","21030","75439","74995",
        "39821","15172","36311","71156","75501","66348","30137","30485","8762","63053",
        "74814","51513","711","32619","5938","28534","34860","37903","74924","78544",
        "72722","57551","17643","76646","54470","4262","70657","78545","1085","1475",
        "36959","29348","16787","21117","75104","76405","13373","51077","75487","58113",
        "59641","27821","84696","32275","62691","70181","19677","3697","40911","38217",
        "12340","20273","75793","15956","1009","57920","1132","7664","59704","35507",
        "30726","77309","37263","6140","78464","49833","65245","886","14092","1234",
        "70810","231","9805","51366","21455","73512","28841","29533","31823","29095"
    ];

    $brand = FranchisorBusinessDetail::query()
        ->select('company_name', 'profile_name', 'fran_detail_id')
        ->whereIn('fran_detail_id', $franDetailIds)
        ->orderBy(DB::raw('FIELD(fran_detail_id, ' . implode(',', $franDetailIds) . ')'))
        ->get();

    return view('franchisor.landing.mostbrands', compact('brand'));
}

}
