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
        'sno',
        'videoID',
        'podcast_id',
        'title',
        'category',
        'image',
        'image_path',
        'maxresimage',
        'subcategory',
        'description',
        'keyword',
        'duration',
        'podcast_type',
        'podcast_link',
        'pod_lang',
        'total_comment',
        'total_votes',
        'total_value',
        'views',
        'status',
        'create_date',
        'fbshare',
        'twittershare',
        'linkedinshare',
        'whasupshare'
    ];

    public function VideoCategory()
    {
        return $this->hasMany(FihlVideoCategory::class, 'catid', 'category');
    }
}
