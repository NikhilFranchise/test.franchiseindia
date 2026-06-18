<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorLocCountry extends Model
{
    use HasFactory;
    protected $table      = 'franchisor_loc_countries';
    protected $primaryKey = 'fran_country_id';

}
