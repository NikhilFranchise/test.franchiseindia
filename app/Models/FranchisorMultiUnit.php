<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorMultiUnit extends Model
{
    use HasFactory;
    protected $table      = 'franchisor_multiunits';
    protected $primaryKey = 'fran_multi_id';
}
