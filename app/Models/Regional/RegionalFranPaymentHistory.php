<?php

namespace App\Models\Regional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalFranPaymentHistory extends Model
{
    use HasFactory;
    protected $table = "regional_fran_payment_history";
    protected $primaryKey = "id";
}
