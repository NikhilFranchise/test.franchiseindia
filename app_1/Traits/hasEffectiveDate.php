<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait hasEffectiveDate
{
    public function scopeWithEffectiveDate($query)
    {
        return $query->addSelect(DB::raw("
        CASE 
            WHEN published_date IS NULL THEN created_at
            WHEN published_date = created_at THEN created_at
            WHEN published_date > created_at THEN published_date
            ELSE created_at 
        END AS effective_date"));
    }
    public function scopeOrderByEffectiveDate($query, $direction = 'desc')
    {
        return $query->orderByRaw("
            CASE 
                WHEN published_date IS NULL THEN created_at
                WHEN published_date = created_at THEN created_at
                WHEN published_date > created_at THEN published_date
                ELSE created_at
            END $direction
        ");
    }
}
