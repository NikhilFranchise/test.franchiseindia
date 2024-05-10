<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FihlVideoCategory;

class FihlVideo extends Model
{
    use HasFactory;
    public $table = 'fihl_video';

    /**
     * Get the record associated with the user of InvestorDetails.
     */
    public function categoryName()
    {
        return $this->hasOne(FihlVideoCategory::class, 'catid', 'category');
    }
}
