<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorSliderTenure extends Model
{
    use HasFactory;
    protected $table      = 'franchisor_slider_tenure';
    protected $primaryKey = 'fran_slider_id';
}
