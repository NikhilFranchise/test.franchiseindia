<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsightViews extends Model
{
    use HasFactory;
    protected $table = 'insight_views';
    protected $primaryKey = 'id';

    protected $fillable = [
        'insightID',
        'ip_address',
        'times',
        'created_at',
        'updated_at', // Add if needed
    ];
    // public $timestamps = false; // Disable timestamps if 'updated_at' is missing

}
