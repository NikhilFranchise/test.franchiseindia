<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;


    protected $table      = "useractivity";
    protected $primaryKey = 'clickID';
    public $timestamps    = false;
    
    /**
     * Get the record associated with the user: franchisor.
     */
    public function franchisor()
    {
        return $this->hasOne(FranchisorBusinessDetail::class, 'franchisor_id', 'franchisor_id');
    }

    /**
     * Get the record associated with the user: investor.
     */
    public function investor()
    {
        return $this->hasOne(InvestorDetails::class, 'investor_id', 'investor_id');
    }
}
