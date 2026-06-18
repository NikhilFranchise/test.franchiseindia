<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AuthorList;
use App\Models\InsightsHindiCategory;
use App\Models\InsightsHindiSubCategory;
use App\Traits\hasEffectiveDate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsightListHindi extends Model
{
    use HasFactory, hasEffectiveDate, SoftDeletes;

    protected $table = 'insights_list_hindi';
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
        return $this->belongsTo(AuthorList::class, 'author_id', 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(InsightsHindiCategory::class, 'cat_id', 'id');
    }
    public function Subcategory()
    {
        return $this->belongsTo(InsightsHindiSubCategory::class, 'subcat_id', 'id');
    }

    public function ContentTagsAssigned()
    {
        return $this->belongsTo(ContentTagsAssignedHindi::class, 'content_id', 'news_id');
    }

    public function scopePopularArticles($query)
    {
        return $query->with('category')
            ->select(
                'news_id',
                'insight_type',
                'news_type',
                'cat_id',
                'title',
                'shortDesc',
                'slug',
                'image',
                'views',
                'created_at',
                'published_date'
            )
            ->withEffectiveDate()
            ->where('insight_type', 'Article')
            ->whereNotIn('news_type', ['ir', 'ri'])
            ->where('status', 1)
            ->whereNotNull(['image', 'cat_id'])
            ->orderByDesc('views');
    }
}
