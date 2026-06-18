<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFinal extends Model
{
    use HasFactory;
    protected $table      = 'category_final';
    protected $primaryKey = 'cid';
}
