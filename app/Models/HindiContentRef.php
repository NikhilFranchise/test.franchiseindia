<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HindiContentRef extends Model
{
    use HasFactory;
    public $table      = 'hindi_content_ref';
    public $primaryKey = 'content_id';
    public $fillable   = ['content_id', 'kicker', 'home_title', 'title', 'short_desc', 'content', 'author', 'slug', 'time', 'views', 'status', 'updated_by'];

}
