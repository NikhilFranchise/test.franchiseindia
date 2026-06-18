<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchMonitor extends Model
{
    use HasFactory;
    protected $table = 'user_top_search';
    public $timestamps = false; // because you're using a custom `date` field instead of Laravel's default `created_at`
    protected $fillable = [
        'keyword',
        'source',
        'date',
        'count', 
        'ip_address',

    ];

}
