<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagazineSubscribe extends Model
{
    use HasFactory;
    public $table = 'magazine_subscribe';
    protected $primaryKey = 'sub_id';
}
