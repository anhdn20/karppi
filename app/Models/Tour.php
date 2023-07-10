<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tour';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_vi', 'title_en', 'sub_title_vi', 'sub_title_en', 'title_tab1_vi','offer_vi','offer_en', 'title_tab1_en', 'des_tab1_vi', 'des_tab1_en', 'des_tab2_vi', 'des_tab2_en', 'des_tab3_vi', 'des_tab3_en', 'des_tab4_vi', 'des_tab4_en', 'slug', 'image','image1', 'image2', 'pdf', 'video1', 'video2', 'video360','imgvideo1', 'imgvideo2', 'imgvideo360', 'price', 'price_discount', 'tab', 'tag', 'id_category', 'is_deleted'
    ];

    public static function getByTabId($lang, $tab, $getAll = false){
        $data = self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'slug',
            'tag',
            'price',
            'price_discount',
            'id_category',
            'image'
        )->where('is_deleted', 0)
        ->where('tab', $tab);
        if($getAll == false){
            $data->offset(0)->limit(3);
        }

        return $data->get();
    }

    public static function getByExceptLastest($lang){
        $data = self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'slug',
            'id_category',
            'image'
        )->where('is_deleted', 0)
        ->where('tab','!=',0);

        return $data->get();
    }

    public static function getDetailBySlug($lang, $slug){
        $data = self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'title_tab1_'.$lang.' as title_tab1',
            'des_tab1_'.$lang.' as des_tab1',
            'des_tab2_'.$lang.' as des_tab2',
            'des_tab3_'.$lang.' as des_tab3',
            'des_tab4_'.$lang.' as des_tab4',
            'offer_'.$lang.' as offer',
            'slug',
            'image1',
            'image2',
            'pdf',
            'video1',
            'video2',
            'video360',
            'imgvideo1',
            'imgvideo2',
            'imgvideo360',
            'price',
            'price_discount',
            'tab',
            'tag',
            'id_category',
        )->where('is_deleted', 0)
        ->where('slug', $slug);

        return $data->first();
    }

    public static function getListByIdCategory($lang, $idCate, $limit = 8){
        $data = self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'title_tab1_'.$lang.' as title_tab1',
            'des_tab1_'.$lang.' as des_tab1',
            'des_tab2_'.$lang.' as des_tab2',
            'des_tab3_'.$lang.' as des_tab3',
            'des_tab4_'.$lang.' as des_tab4',
            'offer_'.$lang.' as offer',
            'slug',
            'image',
            'image1',
            'image2',
            'pdf',
            'video1',
            'video2',
            'video360',
            'imgvideo1',
            'imgvideo2',
            'imgvideo360',
            'price',
            'price_discount',
            'tab',
            'tag',
            'id_category',
        )->where('is_deleted', 0)
        ->where('id_category', $idCate)->limit($limit);

        return $data->get();
    }

}
