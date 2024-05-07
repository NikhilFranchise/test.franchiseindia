<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FranchisorBusinessDetail;
class FixedBrand extends Model
{
    use HasFactory;
    protected $table = 'fixed_brands';

    /**
     * Get the record associated with the user of InvestorDetails.
     */
    public function franchisorDetails()
    {
        return $this->hasOne(FranchisorBusinessDetail::class, 'franchisor_id', 'franchisor_id');
    }
}
