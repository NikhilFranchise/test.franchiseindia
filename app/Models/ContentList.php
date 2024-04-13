<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentList extends Model
{
    use HasFactory;
    protected $table = 'content_list';
    protected $primaryKey = 'content_id';
    /**
     * Define the relationship with HindiContentRef model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hindi(): HasOne
    {
        return $this->hasOne(HindiContentRef::class, 'content_id', 'content_id');
    }
    
}
