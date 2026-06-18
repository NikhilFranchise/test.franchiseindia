<?php

namespace App\Models\Crre;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CrreAdminUsers extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "crre_admin_users";
    protected $primaryKey = "admin_id";

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_role',
        'admin_is_active',
        'admin_password',
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
        return $this->belongsTo(CrreAuthors::class, 'admin_id', 'admin_id');
    }
}
