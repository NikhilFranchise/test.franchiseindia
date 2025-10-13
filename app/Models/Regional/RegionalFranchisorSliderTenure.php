<?php

namespace App\Models\Regional;

use App\Models\FranchisorBusinessDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalFranchisorSliderTenure extends Model
{
    use HasFactory;
    protected $table = "regional_fran_slider_tenure";

    public function franchisor()
    {
        return $this->belongsTo(FranchisorBusinessDetail::class, 'franchisor_id', 'franchisor_id');
    }
}
