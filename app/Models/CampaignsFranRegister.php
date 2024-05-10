<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignsFranRegister extends Model
{
    use HasFactory;
    public $table = 'campaigns_fran_register';
    protected $primaryKey = 'id';
    protected $fillable = ['franchisor_id', 'utm_campaign', 'utm_source'];
}
