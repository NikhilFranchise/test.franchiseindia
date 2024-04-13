<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvestorDetails;
use App\Models\InvestorIndustry;
use App\Models\FranchisorBusinessDetail;

class UserAccount extends Model
{
    use HasFactory;
    protected $table      = "user_accounts";
    protected $primaryKey = "user_id";

    public function investorDetails()
    {
        return $this->hasOne(InvestorDetails::class, 'investor_id', 'profile_str');
    }

    /**
     * Get the record associated with the user of InvestorIndustry.
     */
    public function investorIndustry()
    {
        return $this->hasMany(InvestorIndustry::class, 'investor_id', 'profile_str');
    }

    /**
     * Get the record associated with the user: franchisor.
     */
    public function franchisor()
    {
        return $this->hasOne(FranchisorBusinessDetail::class, 'franchisor_id', 'profile_str');
    }

    /**
     * Get the record associated with the user: investor.
     */
    public function investor()
    {
        return $this->hasOne(InvestorDetails::class, 'investor_id', 'profile_str');
    }
}
