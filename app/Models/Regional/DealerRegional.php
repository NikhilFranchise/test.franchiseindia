<?php

namespace App\Models\Regional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerRegional extends Model
{
    use HasFactory;
    protected $table = "dealer_regional_page_brands";
    protected $id = 'brand_id';
}
