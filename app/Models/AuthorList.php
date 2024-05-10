<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorList extends Model
{
    use HasFactory;
    public $table = 'author_list';
    protected $primaryKey = 'author_id';
}
