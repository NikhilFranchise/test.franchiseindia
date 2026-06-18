<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandPopupLead extends Model
{
    use HasFactory;
    public $table         = 'brand_popup_leads';
    protected $fillable   = ["email_id"];
}
