<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueVisit extends Model
{
    use HasFactory;
    public    $table      = 'unique_visits';
    protected $primaryKey = 'id';
    protected $fillable   = ['franchisor_id', 'ip', 'date'];
    public $timestamps    = false;
}
