<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralPayment extends Model
{
    use HasFactory;
    protected $table      = 'general_payments';
    protected $primaryKey = 'pay_id';
}
