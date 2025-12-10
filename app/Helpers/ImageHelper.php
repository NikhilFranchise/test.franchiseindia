<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

if (!function_exists('imageUrl')) {
    /**
     * Generate full image URL (auto-detect Hindi/English paths)
     */
    function imageUrl($image, $locale = null)
    {
        // dd($image);
        $default = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';

        if (empty($image)) {
            return $default;
        }

        // If absolute URL (http or https)
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return rtrim($image, '/');
        }

        $locale = $locale ?: App::getLocale();
        $base = Config::get('constants.franAwsS3Url');
        $image = ltrim($image, '/');

        // If image already contains folder path
        if (str_contains($image, '/')) {
            return $base . $image;
        }

        // Locale-based upload path
        $path = $locale !== 'en'
            ? Config::get('constants.ARTICLE_HINDI_UPLOAD_PATH')
            : Config::get('constants.ARTICLE_UPLOAD_PATH');

        return $base . trim($path, '/') . '/' . $image;
    }
}

if (!function_exists('imageUrlLang')) {
    /**
     * Same as imageUrl but locale is explicitly passed.
     */
    function imageUrlLang($image, $lang)
    {
        return imageUrl($image, $lang);
    }
}

if (!function_exists('authorImageUrl')) {
    /**
     * Full URL for author images with fallback.
     */
    function authorImageUrl($image)
    {
        $default = url('images/defaultuser.png');
        $base = Config::get('constants.franAwsS3Url');

        if (empty($image)) {
            return $default;
        }

        // If direct S3 folder path or URL
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // If contains folders → treat as full S3 path
        if (str_contains($image, '/')) {
            return $base . ltrim($image, '/');
        }

        // Construct author image path
        $path = 'opp/authors/images/' . trim($image);
        $fullUrl = $base . $path;

        // Validate if image exists on S3
        return @getimagesize($fullUrl) ? $fullUrl : $default;
    }
}
