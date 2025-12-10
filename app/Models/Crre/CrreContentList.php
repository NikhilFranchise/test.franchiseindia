<?php

namespace App\Models\Crre;

use App\Models\AuthorList;
use App\Models\Crre\CrreCategory;
use App\Models\Crre\CrreSubCategory;
use App\Traits\hasEffectiveDate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrreContentList extends Model
{
    use HasFactory, hasEffectiveDate;
    protected $table = 'crre_content';
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
        return $this->hasMany(CrreAuthors::class, 'author_id', 'author_id');
    }
    public function category()
    {
        return $this->hasMany(CrreCategory::class, 'id', 'cat_id');
    }
    public function Subcategory()
    {
        return $this->hasMany(CrreSubCategory::class, 'id', 'subcat_id');
    }
    public function ContentTagsAssigned()
    {
        return $this->hasMany(CrreContentAssignedTags::class, 'content_id', 'news_id');
    }
}
