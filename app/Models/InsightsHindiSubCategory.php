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

    public function category()
    {
        return $this->hasMany(InsightsHindiCategory::class, 'id','mcat_id');
    }

}
