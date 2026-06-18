<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopFranchiseLeader extends Model
{
    use HasFactory;
    public $table = 'top_franchise_leaders';
    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'designation',
        'image_path',
        'seoTitle',
        'seoDescription',
        'description',
        'year',
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    /**
     * Scope to filter leaders by year
     */
    public function scopeByYear($query, $year = null)
    {
        if ($year) {
            return $query->where('year', $year);
        }
        return $query->where('year', date('Y'));
    }
}
