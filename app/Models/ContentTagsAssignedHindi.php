<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentTagsAssignedHindi extends Model
{
    use HasFactory;
    public $table      = 'content_tags_assigned_hindi';
    public $primarykey = 'assigned_tag_id';

    public function contentTag()
    {
        return $this->belongsTo(SeoTagHindi::class, 'tag_id', 'tag_id');
    }
}
