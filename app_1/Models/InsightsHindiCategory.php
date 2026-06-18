<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsightsHindiCategory extends Model
{
    use HasFactory;
    protected $table = 'insights_hindi_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['catname', 'slug']; // Allow mass assignment
    public $timestamps = false; // Disable automatic timestamps


}
