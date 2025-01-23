<?php

if (!function_exists('formatViews')) {
    function formatViews($number)
    {
        if ($number >= 100000) {
            return round($number / 100000, 1) . 'Lac'; // For lacs
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'Thousand'; // For thousands
        }
        return $number; // For numbers less than 1000
    }
}