<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    protected $table = "fi_homepage_videos";
    protected $primaryKey = "fih_id";
    // In your Videos model
protected $fillable = ['fih_id','fih_url','fih_imageurl','fih_title','fih_description','fih_views','fih_date','fih_status','updated_at'];


}
