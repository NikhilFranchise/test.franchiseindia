<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopFranchiseLeader extends Model
{
    use HasFactory;
    public $table = 'top_franchise_leaders';
    public $primaryKey = 'id';
}
