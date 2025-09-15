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
    protected $fillable = [
        'investor_id',
        'franchisor_id',
        'email',
        'expressInt',
        'visibility',
        'visit_date',
        'franchisor_visibility',
        'franchisor_visibility_date',
    ];

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
        return $this->belongsTo(InvestorDetails::class, 'investor_id', 'investor_id');
    }
}
