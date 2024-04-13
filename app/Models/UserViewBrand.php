<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserViewBrand extends Model
{
    use HasFactory;
    public $table         = 'user_viewbrand';
    protected $primaryKey = 'clickID';
    protected $fillable   = ['email', 'investor_id', 'franchisor_id', 'expressInt'];
    public $timestamps    = false;
}
