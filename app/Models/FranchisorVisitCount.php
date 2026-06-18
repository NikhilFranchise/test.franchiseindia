<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorVisitCount extends Model
{
    use HasFactory;
    protected $table = 'franchisor_visits'; // Set the table name
    protected $fillable = ['franchisor_id', 'total','record_date']; 

}
