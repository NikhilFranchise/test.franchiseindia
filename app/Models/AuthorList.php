<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorList extends Model
{
    use HasFactory;
    public $table = 'author_list';
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
        return $this->belongsTo(AdminUser::class, 'admin_id', 'admin_id');
    }
}
