<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_vi',
        'title_en',
        'sub_title_vi',
        'sub_title_en',
        'description_vi',
        'description_en',
        'slug',
        'image',
        'icon',
        'id_category',
        'is_deleted'
    ];

    public static function getByCategoryId($lang, $categoryId, $getAll = false){
        $data = self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'description_'.$lang.' as description',
            'slug',
            'id_category',
            'image',
            'icon'
        )->where('is_deleted', 0)
        ->where('id_category', $categoryId);
        if($getAll == false){
            $data->offset(0)->limit(6);
        }

        return $data->get();
    }

    public static function getRandom($lang){
        $data = self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'description_'.$lang.' as description',
            'slug',
            'id_category',
            'image'
        )->inRandomOrder()->limit(6);

        return $data->get();
    }

    public static function getDetailBySlug($lang, $slug){
        $data = self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'description_'.$lang.' as description',
            'slug',
            'id_category',
            'image'
        )->where('is_deleted', 0)
        ->where('slug', $slug);

        return $data->first();
    }
}
