<?php

namespace App\Models\Insights;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedInsightsContent extends Model
{
    use HasFactory;
    protected $table = 'featured_insights_contents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'slot',
        'locale',
        'news_id',
        'insight_type',
        'start_at',
        'end_at',
        'status',
        'created_by',
    ];

    protected $casts = [
        'start_at' => 'date',
        'end_at'   => 'date',
    ];
    public function scopeActive($query)
    {
        return $query->where('start_at', '<=', now())
            ->where('end_at', '>=', now());
    }
}
