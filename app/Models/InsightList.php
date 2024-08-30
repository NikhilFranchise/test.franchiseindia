<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AuthorList;
use App\Models\InsightCategory;
use App\Models\InsightSubcategory;
class InsightList extends Model
{
    use HasFactory;
    protected $table = 'insights_list_new';
    protected $primaryKey = 'news_id';

    public function author()
    {
        return $this->hasMany(AuthorList::class, 'author_id','author_id');
    }
    public function category()
    {
        return $this->hasMany(InsightCategory::class, 'id','cat_id');
    }
    public function Subcategory()
    {
        return $this->hasMany(InsightSubcategory::class, 'id','subcat_id');
    }
}
