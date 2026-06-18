<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileVerification extends Model
{
    use HasFactory;
    public $table = 'mobile_verification';

    public $primaryKey = 'mob_verify_id';
    
    protected $fillable = [
        'user_id',
        'mobile_no',
        'otp_code',
        'smspg_response',
        'is_verified',
        'verified_at'
    ];
}
