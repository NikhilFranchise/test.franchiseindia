<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HindiNewsRef;

class NewsList extends Model
{
    use HasFactory;
    protected $table = 'news_list';
    protected $primaryKey = 'news_id';

    public function hindi()
    {
        return $this->hasOne(HindiNewsRef::class, 'news_id', 'news_id');
    }
}
