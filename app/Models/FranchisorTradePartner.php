<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorTradePartner extends Model
{
    use HasFactory;
    protected $table      = 'franchisor_tradepartners';
    protected $primaryKey = 'fran_trade_id';

}
