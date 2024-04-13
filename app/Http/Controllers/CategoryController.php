<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $CategoryArr;
    public $SubCategoryArr;
    public $SubSubCategoryArr;

    /**
     * @param string $catID
     * @return array|mixed|string
     */
    public static function getCategory($catID= '')
    {
        $CategoryArr = Config('constants.CategoryArr');
        asort($CategoryArr);
        if(empty($catID) || !is_numeric($catID)) {
            return $CategoryArr;
        } else {
            return $CategoryArr[$catID];
        }
    }

    /**
     * @param string $catID
     * @return array|mixed|string
     */
    public function getSubCategory($catID= '')
    {
        $SubCategoryArr = Config('constants.subCategoryArr');

        if(empty($catID) || !is_numeric($catID))
            return $SubCategoryArr;
        else
            return $SubCategoryArr[$catID];
    }

    /**
     * @param string $getID
     * @return array|mixed|string
     */
    public function getSubSubCategory($getID = '')
    {
        $SubSubCategoryArr = Config('constants.subSubCategoryArr');

        if(empty($getID) || !is_numeric($getID))
            return $SubSubCategoryArr;
        else
            return $SubSubCategoryArr[$getID];
    }

    /**
     * @param string $getID
     * @return array|mixed|string
     */
    public static function getSEOCategory($getID = '')
    {
        $SeoCategoryArr = Config('category.SeoCategoryArr');
        if(empty($getID) || !is_numeric($getID))
            return $SeoCategoryArr;
        else
            return $SeoCategoryArr[$getID];
    }

    /**
     * @param string $getID
     * @return array|mixed|string
     */
    public static function getSEOSubCategory($getID = '')
    {
        $SeoSubCategoryArr = Config('category.SeoSubCategoryArr');

        if(empty($getID)  || !is_numeric($getID))
            return $SeoSubCategoryArr;
        else
            return $SeoSubCategoryArr[$getID];
    }

    /**
     * @param string $getID
     * @return array|mixed|string
     */
    public static function getSEOSubSubCategory($getID = '')
    {
        $SeoSubSubCategoryArr = Config('category.SeoSubSubCategoryArr');

        if(empty($getID) || !is_numeric($getID))
            return $SeoSubSubCategoryArr;
        else
            return $SeoSubSubCategoryArr[$getID];
    }

}


