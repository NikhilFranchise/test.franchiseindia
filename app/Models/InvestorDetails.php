<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserAccount;

class InvestorDetails extends Model
{
    use HasFactory;
    protected $table = "investor_details";
    protected $primaryKey = 'inv_det_id';


    public function userDetail()
    {
        return $this->belongsTo(UserAccount::class, 'investor_id', 'profile_str');
    }
}
