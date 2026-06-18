<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaSubscribe extends Model
{
    use HasFactory;
    public $table = 'instasubscribe';
    protected $fillable = [
        'mobileno',
        'emailid',
        'client_ip',
    ];
}
