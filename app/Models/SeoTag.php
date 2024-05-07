<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContentTagsAssigned;
class SeoTag extends Model
{
    use HasFactory;
    public $table         = 'seo_tags';
    protected $primaryKey = 'tag_id';

    /**
     * Get the record associated with the user of multiunit.
     */
    public function contentTagsAssigned()
    {
        return $this->hasMany(ContentTagsAssigned::class, 'tag_id', 'tag_id');
    }
}
