<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InsightCategory;

class InsightSubcategory extends Model
{
    protected $table = 'insights_sub_category';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mcat_id',        // Main category ID
        'subcat_name',    // Subcategory name
        'slug',           // Slug
    ];

    public function category()
    {
        return $this->hasMany(InsightCategory::class, 'id','mcat_id');
    }
}
