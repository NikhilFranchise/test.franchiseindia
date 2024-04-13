<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClick extends Model
{
    use HasFactory;
    protected $table = "userclicks";
    protected $fillable   = ['franchisor_id', 'clicks'];
}
