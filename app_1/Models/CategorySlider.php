<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FranchisorBusinessDetail;

class CategorySlider extends Model
{
    use HasFactory;
    protected $table = 'category_slider';

    /**
     * Get the record associated with the user of FranchisorBusinessDetail.
     */
    public function franchisor()
    {

        return $this->hasOne(FranchisorBusinessDetail::class, 'franchisor_id', 'franchisor_id');
    }
}
