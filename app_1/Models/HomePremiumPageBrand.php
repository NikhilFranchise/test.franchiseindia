<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePremiumPageBrand extends Model
{
    use HasFactory;
    protected $table      = "home_premium_page_brands";
    protected $primaryKey = "brand_id";
}
