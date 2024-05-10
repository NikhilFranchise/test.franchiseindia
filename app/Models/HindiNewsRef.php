<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HindiNewsRef extends Model
{
    use HasFactory;
    public $table      = 'hindi_news_ref';
    public $primaryKey = 'news_id';
    public $fillable   = ['news_id', 'kicker', 'home_title', 'title', 'short_desc', 'content', 'author', 'slug', 'time', 'views', 'status', 'updated_by'];

}
