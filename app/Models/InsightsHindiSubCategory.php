<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InsightsHindiCategory;

class InsightsHindiSubCategory extends Model
{
    use HasFactory;
    protected $table = 'insights_hindisub_category';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mcat_id',        // Main category ID
        'subcat_name',    // Subcategory name
        'slug',           // Slug
    ];

    public function category()
    {
        return $this->belongsTo(InsightsHindiCategory::class, 'mcat_id', 'id');
    }
}
