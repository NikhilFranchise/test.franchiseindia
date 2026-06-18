<?php

namespace App\Models\Crre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrreSubCategory extends Model
{
    use HasFactory;
    protected $table = 'crre_subcategory';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mcat_id',        // Main category ID
        'subcat_name',    // Subcategory name
        'slug',           // Slug
    ];

    public function category()
    {
        return $this->hasMany(CrreCategory::class, 'id', 'mcat_id');
    }
}
