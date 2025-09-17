<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FihlVideoCategory;
class FihlPodcastVideo extends Model
{
    use HasFactory;
    protected $table = 'fihl_podcstvideo';
    protected $primaryKey = 'sno';
    public $incrementing = true; // Set to true if it's an auto-increment field
    protected $keyType = 'int';

    protected $fillable = [
        'videoID',
        'podcast_id',
        'podcast_link',
        'title',
        'image_path',
        'duration',
        'pod_lang',
        'status',
        'podcast_type',
        'description',
    ];

    public function VideoCategory(){
        return $this->hasMany(FihlVideoCategory::class, 'catid', 'category');
    }
}
