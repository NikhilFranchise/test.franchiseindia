<?php

namespace App\Models\Crre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrreSeotagshindi extends Model
{
    use HasFactory;
    public $table         = 'crre_seo_tags_hi';
    protected $primaryKey = 'tag_id';

    /**
     * Get the record associated with the user of multiunit.
     */
    public function contentTagsAssigned()
    {
        return $this->hasMany(CrreContentAssignedTagsHindi::class, 'tag_id', 'tag_id');
    }
}
