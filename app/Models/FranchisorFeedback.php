<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisorFeedback extends Model
{
    use HasFactory;
    protected $table      = "franchisor_feedback";
    protected $primaryKey = 'feedback_id';
}
