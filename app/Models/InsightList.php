<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AuthorList;
use App\Models\InsightCategory;
use App\Models\InsightSubcategory;
use App\Traits\hasEffectiveDate;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsightList extends Model
{
    use HasFactory, hasEffectiveDate, SoftDeletes;

    protected $table = 'insights_list_english';
    protected $primaryKey = 'news_id';
    protected $dates = ['deleted_at'];


    public function author()
    {
        return $this->hasMany(AuthorList::class, 'author_id', 'author_id');
    }
    public function category()
    {
        return $this->hasMany(InsightCategory::class, 'id', 'cat_id');
    }
    public function Subcategory()
    {
        return $this->hasMany(InsightSubcategory::class, 'id', 'subcat_id');
    }
    public function ContentTagsAssigned()
    {
        return $this->hasMany(ContentTagsAssigned::class, 'content_id', 'news_id');
    }
}
