<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressInstaApply extends Model
{
    use HasFactory;
    protected $table      = 'express_fran_insta_apply';
    protected $primaryKey = 'id';
    public $timestamps    = false;
    public $fillable      = ['name', 'lname', 'address', 'email', 'phone', 'city', 'state', 'pincode', 'country', 'franchisor_id', 'category', 'source', 'source_ref', 'mobile_status', 'investment', 'visibility_date'];
}
