<?php

namespace App\Models\Regional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseRegional extends Model
{
    use HasFactory;
    protected $table = 'regional_page_brands';
    protected $id = 'brand_id';
}
