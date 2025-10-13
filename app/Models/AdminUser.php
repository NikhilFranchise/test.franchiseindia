<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AdminUser extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $table = "admin_users";
    protected $primaryKey = "admin_id";

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
        'admin_dept',
        'can_create_author',
        'last_login_at'
    ];
    protected $hidden = [
        'admin_password'
    ];

    public function getAuthPassword()
    {
        return $this->admin_password;
    }

    public function author()
    {
        return $this->hasOne(AuthorList::class, 'admin_id', 'admin_id');
    }
}
