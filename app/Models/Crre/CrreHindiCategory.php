<?php

namespace App\Models\Crre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrreHindiCategory extends Model
{
    use HasFactory;
    protected $table = 'crre_categories_hi';
    protected $primaryKey = 'id';
    protected $fillable = ['catname', 'slug'];
    public $timestamps = false;
}
