<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FranchisorMultiUnit;
use App\Models\FranchisorLocState;
use App\Models\FranchisorLike;
use App\Models\FranchisorSliderImage;
use App\Models\UserActivity;
use App\Models\UniqueVisit;
use App\Models\UserClick;
use App\Models\UserAccount;
use App\Models\TopFranchisorLeaders;
use App\Models\FranchisorTradePartner;
use App\Models\Regional\DealerRegional;
use App\Models\Regional\FranchiseRegional;
use App\Models\Regional\RegionalFranchisorSliderTenure;
use App\Models\Regional\RegionalFranPaymentHistory;

class FranchisorBusinessDetail extends Model
{
    use HasFactory;

    protected $table      = 'franchisor_business_details';
    protected $primaryKey = 'fran_detail_id';

    /**
     * Get the record associated with the user of multiunit.
     */
    public function multiUnit()
    {
        return $this->hasOne(FranchisorMultiUnit::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user of location.
     */
    public function franchisorLocState()
    {
        return $this->hasMany(FranchisorLocState::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user of likes and rating.
     */
    public function franchisorLike()
    {
        return $this->hasOne(FranchisorLike::class, 'franchisor_id', 'franchisor_id');
    }


    /**
     * Get the record associated with the user of Slider Images.
     */
    public function franchisorSliderImage()
    {
        return $this->hasOne(FranchisorSliderImage::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user of interaction with investor.
     */
    public function userActivity()
    {
        return $this->hasOne(UserActivity::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user of unique visits.
     */
    public function uniqueVisit()
    {
        return $this->hasOne(UniqueVisit::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user of .
     */
    public function userClick()
    {
        return $this->hasOne(UserClick::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user of franchisor_id.
     */
    public function userDetail()
    {
        return $this->hasOne(UserAccount::class, 'profile_str', 'franchisor_id');
    }

    public function topFranchisorLeaders()
    {
        return $this->belongsTo(TopFranchisorLeaders::class, 'franchisor_id', 'franchisor_id');
    }
    public function franchisorTradePartner()
    {
        return $this->hasOne(FranchisorTradePartner::class, 'franchisor_id', 'franchisor_id');
    }
    /**
     * Get the related regional franchisors for the business.
     */
    public function franchiseRegionals()
    {
        return $this->hasMany(FranchiseRegional::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the related dealer regional franchisors for the business.
     */
    public function dealerRegionals()
    {
        return $this->hasMany(DealerRegional::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the related regional slider tenures for the business.
     */
    public function regionalSliderTenures()
    {
        return $this->hasMany(RegionalFranchisorSliderTenure::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the related regional franchisor payment history.
     */
    public function regionalFranPaymentHistory()
    {
        return $this->hasMany(RegionalFranPaymentHistory::class, 'franchisor_id', 'franchisor_id');
    }
}
