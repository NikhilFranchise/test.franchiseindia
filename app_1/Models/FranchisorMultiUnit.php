<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FranchisorBusinessDetail;

class FranchisorMultiUnit extends Model
{
    use HasFactory;
    protected $table      = 'franchisor_multiunits';
    protected $primaryKey = 'fran_multi_id';

    public function franchisor()
    {
        return $this->belongsTo(FranchisorBusinessDetail::class, 'franchisor_id', 'franchisor_id');
    }
}
