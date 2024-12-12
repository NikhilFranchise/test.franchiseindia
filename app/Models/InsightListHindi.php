<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AuthorList;
use App\Models\InsightsHindiCategory;
use App\Models\InsightsHindiSubcategory;

class InsightListHindi extends Model
{
    use HasFactory;
    protected $table = 'insights_list_hindi';
    protected $primaryKey = 'news_id';

    public function author()
    {
        return $this->hasMany(AuthorList::class, 'author_id', 'author_id');
    }
    public function category()
    {
        return $this->hasMany(InsightsHindiCategory::class, 'id', 'cat_id');
    }
    public function Subcategory()
    {
        return $this->hasMany(InsightsHindiSubcategory::class, 'id', 'subcat_id');
    }

    public function ContentTagsAssignedHindi()
    {
        return $this->hasMany(ContentTagsAssignedHindi::class, 'content_id', 'news_id');
    }
}
