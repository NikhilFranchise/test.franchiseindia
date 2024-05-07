<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskFranchisor extends Model
{
    use HasFactory;
    protected $table = 'ask_franchisor';
    protected $fillable = ['name'];


}
