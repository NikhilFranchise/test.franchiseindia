<?php

namespace App\Models\Crre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrreCategory extends Model
{
    use HasFactory;
    protected $table = 'crre_category';
    protected $primaryKey = 'id';

    protected $fillable = ['catname', 'slug']; // Allow mass assignment
    public $timestamps = false; // Disable automatic timestamps

}
