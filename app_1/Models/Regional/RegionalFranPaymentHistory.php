<?php

namespace App\Models\Regional;

use App\Models\FranchisorBusinessDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalFranPaymentHistory extends Model
{
    use HasFactory;
    protected $table = "regional_fran_payment_history";
    protected $primaryKey = "id";

    public function franchisor()
    {
        return $this->belongsTo(FranchisorBusinessDetail::class, 'franchisor_id', 'franchisor_id');
    }
}
