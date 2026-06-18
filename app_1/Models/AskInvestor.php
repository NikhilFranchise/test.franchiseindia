<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskInvestor extends Model
{
    use HasFactory;
    protected $table = 'ask_investor';
    protected $fillable = ['name', 'pincode', 'email', 'mobile', 'details', 'is_newsletter', 'city', 'state', 'ip', 'reg_source'];
}
