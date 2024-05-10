<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagazineComment extends Model
{
    use HasFactory;
    public $table = 'magazine_comment';
    public $timestamps = false;
}
