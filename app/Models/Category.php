<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_vi', 'title_en', 'description_vi', 'description_en', 'parent', 'slug', 'type', 'is_deleted'
    ];

    public static function getAll($lang, $parent = 0){
        return self::select(
            'id',
            'title_'.$lang.' as title',
            'description_'.$lang.' as description',
            'parent',
            'slug'
        )->where('is_deleted', 0)
        ->where('parent', $parent)->get();
    }

    public static function getDetailById($lang, $categoryId = 0){
        return self::select(
            'id',
            'title_'.$lang.' as title',
            'description_'.$lang.' as description',
            'parent',
            'slug'
        )->where('is_deleted', 0)
        ->where('id', $categoryId)->first();
    }

    public static function getListById($lang, $categoryId = 0){
        return self::select(
            'id',
            'title_'.$lang.' as title',
            'description_'.$lang.' as description',
            'parent',
            'slug'
        )->where('is_deleted', 0)
        ->where('id', $categoryId)->get();
    }

    public static function getAllNotParent($lang,$type = 1){
        return self::select(
            'id',
            'title_'.$lang.' as title',
            'description_'.$lang.' as description',
            'parent',
            'slug'
        )->where('is_deleted', 0)
        ->where('type', $type) // type = 1 là danh mục bài viết
        ->get();
    }

    public static function getAllTour($lang, $parent = 0){
        return self::select(
            'id',
            'title_'.$lang.' as title',
            'description_'.$lang.' as description',
            'parent',
            'slug'
        )->where('is_deleted', 0)
        ->where('parent', $parent)
        ->where('type', 0)->get();
    }

}
