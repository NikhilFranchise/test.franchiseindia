<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorLike extends Model
{
    use HasFactory;
    protected $table      = 'franchisor_likes';
    protected $primaryKey = 'like_id';
}
