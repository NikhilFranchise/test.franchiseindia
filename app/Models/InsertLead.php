<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsertLead extends Model
{
    use HasFactory;
    public $table         = 'insert_leads';
    protected $primaryKey = 'lead_id';
}
