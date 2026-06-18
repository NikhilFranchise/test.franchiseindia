<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorLocState extends Model
{
    use HasFactory;
    protected $table      = 'franchisor_loc_states';
    protected $primaryKey = 'fran_state_id';
}
