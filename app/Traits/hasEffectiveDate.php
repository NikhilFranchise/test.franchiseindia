<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait hasEffectiveDate
{
    protected function effectiveDateCase()
    {
        return "
            CASE 
                WHEN published_date IS NULL THEN created_at
                WHEN published_date = created_at THEN created_at
                WHEN published_date > created_at THEN published_date
                ELSE created_at
            END
        ";
    }

    public function scopeWithEffectiveDate($query)
    {
        return $query->addSelect(
            DB::raw($this->effectiveDateCase() . ' AS effective_date')
        );
    }

    public function scopeOrderByEffectiveDate($query, $direction = 'desc')
    {
        return $query->orderByRaw(
            $this->effectiveDateCase() . " $direction"
        );
    }

    // ✅ NEW — usable in WHERE
    public function scopeWhereEffectiveDate($query, $operator, $date)
    {
        return $query->whereRaw(
            $this->effectiveDateCase() . " $operator ?",
            [$date]
        );
    }
}
