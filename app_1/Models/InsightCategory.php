<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsightCategory extends Model
{
    use HasFactory;
    protected $table = 'insights_category';
    protected $primaryKey = 'id';

    protected $fillable = ['catname', 'slug']; // Allow mass assignment
    public $timestamps = false; // Disable automatic timestamps

}
