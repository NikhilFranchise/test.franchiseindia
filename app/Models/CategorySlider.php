<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySlider extends Model
{
    use HasFactory;
    protected $table = 'category_slider';

    /**
     * Get the record associated with the user of FranchisorBusinessDetail.
     */
    public function franchisor()
    {
        return $this->hasOne('App\Models\FranchisorBusinessDetail', 'franchisor_id', 'franchisor_id');
    }
}
