<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FihlVideoCategory;
class FihlPodcastVideo extends Model
{
    use HasFactory;
    protected $table = 'fihl_podcstvideo';
    protected $primarykey = 'sno';
    public function VideoCategory(){
        return $this->hasMany(FihlVideoCategory::class, 'catid', 'category');
    }
}
