<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgInvestorPayment extends Model
{
    use HasFactory;
    protected $table       = 'pg_investor_payments';
    protected $primaryKey  = 'investor_pay_id';
    public    $timestamps  = false;
}
