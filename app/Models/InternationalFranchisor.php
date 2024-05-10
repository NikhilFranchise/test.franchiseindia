<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalFranchisor extends Model
{
    use HasFactory;
    protected $table      = "franchisor_intl";
    protected $primaryKey = 'fran_id';
}
