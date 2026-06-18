<?php

namespace App\Models\Crre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrreHindiSubCategory extends Model
{
    use HasFactory;
    protected $table = 'crre_subcategories_hi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mcat_id',        // Main category ID
        'subcat_name',    // Subcategory name
        'slug',           // Slug
    ];

    public function category()
    {
        return $this->hasMany(CrreHindiCategory::class, 'id', 'mcat_id');
    }
}
