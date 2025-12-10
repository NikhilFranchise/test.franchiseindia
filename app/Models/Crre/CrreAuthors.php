<?php

namespace App\Models\Crre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrreAuthors extends Model
{
    use HasFactory;

    public $table = 'crre_authors';
    protected $primaryKey = 'author_id';

    protected $fillable = [
        'admin_id',
        'title',
        'company',
        'designation',
        'address',
        'phone_no',
        'linkedin_profile',
        'facebook_profile',
        'twitter_profile',
        'insta_profile',
        'text',
        'emailid',
        'slug',
        'authorType',
        'image',
        'views',
        'status',
        'news_upload_capability',
    ];

    protected $casts = [
        'time' => 'datetime',
    ];
    public $timestamps = false;



    public function admin()
    {
        return $this->belongsTo(CrreAdminUsers::class, 'admin_id', 'admin_id');
    }
}
