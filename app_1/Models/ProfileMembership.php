<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMembership extends Model
{
    use HasFactory;
    protected $table      = 'profile_memberships';
    protected $primaryKey = 'membership_id';
}
