<?php

namespace App\Models\Crre;

use App\Models\AuthorList;
use App\Models\Crre\CrreHindiCategory;
use App\Models\Crre\CrreHindiSubCategory;
use App\Traits\hasEffectiveDate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrreHindiContentList extends Model
{
    use HasFactory, hasEffectiveDate, SoftDeletes;
    protected $table = 'crre_content_hi';
    protected $primaryKey = 'news_id';
    protected $fillable = [
        'news_type',
        'insight_type',
        'cat_id',
        'subcat_id',
        'title',
        'shortDesc',
        'content',
        'image',
        'img_alt',
        'slug',
        'time',
        'views',
        'status',
        'author_id',
        'updated_by',
        'scheduled_at',
        'published_date',
    ];
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
        'published_date' => 'datetime',
        'effective_date' => 'datetime',  // Important for display formatting
    ];
    /**
     * ACCESSOR: Display formatted date with "Last Updated"
     */
    public function getDisplayDateAttribute()
    {
        $effective = $this->effective_date ?? $this->created_at;

        if (!($effective instanceof Carbon)) {
            $effective = Carbon::parse($effective);
        }

        // When updated later than creation date
        if ($this->published_date > $this->created_at) {
            return 'Last Updated ' . $effective->format('M d, Y');
        }

        // Normal created/published date
        return $effective->format('M d, Y');
    }


    public function author()
    {
        return $this->hasMany(AuthorList::class, 'author_id', 'author_id');
    }
    public function category()
    {
        return $this->hasMany(CrreHindiCategory::class, 'id', 'cat_id');
    }
    public function Subcategory()
    {
        return $this->hasMany(CrreHindiSubCategory::class, 'id', 'subcat_id');
    }

    public function ContentTagsAssignedHindi()
    {
        return $this->hasMany(CrreContentAssignedTagsHindi::class, 'content_id', 'news_id');
    }
}
