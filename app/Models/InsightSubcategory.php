<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InsightCategory;

class InsightSubcategory extends Model
{
    protected $table = 'insights_sub_category';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->hasMany(InsightCategory::class, 'id','mcat_id');
    }
}
