<?php

namespace App\Models;
use App\Models\FranchisorMultiUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FranchisorBusinessDetail extends Model
{
    use HasFactory;


    protected $table      = 'franchisor_business_details';
    protected $primaryKey = 'fran_detail_id';
    protected $guarded = []; // Allow all fields to be mass assignable

    /**
     * Get the record associated with the multiunit.
     */
    public function multiUnit(): HasOne
    {
        return $this->hasOne(FranchisorMultiUnit::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the records associated with the locations.
     */
    public function franchisorLocStates(): HasOne
    {
        return $this->hasOne(FranchisorLocState::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the likes and rating.
     */
    public function franchisorLike(): HasOne
    {
        return $this->hasOne(FranchisorLike::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the slider images.
     */
    public function franchisorSliderImage(): HasOne
    {
        return $this->hasOne(FranchisorSliderImage::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the interaction with investors.
     */
    public function userActivity(): HasOne
    {
        return $this->hasOne(UserActivity::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the unique visits.
     */
    public function uniqueVisit(): HasOne
    {
        return $this->hasOne(UniqueVisit::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user clicks.
     */
    public function userClick(): HasOne
    {
        return $this->hasOne(UserClick::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user details.
     */
    public function userDetail(): HasOne
    {
        return $this->hasOne(UserAccount::class, 'profile_str', 'franchisor_id');
    }
}
