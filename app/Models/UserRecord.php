<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvestorDetails;
use App\Models\FranchisorBusinessDetail;

class UserRecord extends Model
{
    use HasFactory;
    protected $table      = "user_records";
    protected $fillable = ['profile_str', 'last_updated_by_user', 'last_updated_by_service', 'last_login_time', 'last_logout_time', 'last_activity_user'];

    public function investor()
    {
        return $this->hasOne(InvestorDetails::class, 'investor_id', 'profile_str');
    }

	/**
     * Get the record associated with the user of InvestorIndustry.
     */
    public function franchisor()
    {
        return $this->hasOne(FranchisorBusinessDetail::class, 'franchisor_id', 'profile_str');
    }
}
