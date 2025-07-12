<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopFranchisorLeaders extends Model
{
    use HasFactory;

    protected $table      = 'top_franchisor_brands';
    protected $primaryKey = 'id';

    public function franchisorLeaders()
    {
        return $this->hasOne(FranchisorBusinessDetail::class, 'franchisor_id', 'franchisor_id');
    }
}
