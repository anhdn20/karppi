<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_vi', 'title_en', 'sub_title_vi', 'sub_title_en', 'text_btn_vi', 'text_btn_en','image', 'url_direction', 'type','is_deleted'
    ];

    public static function getAllByType($lang,$type){
        return self::select(
            'id',
            'title_'.$lang.' as title',
            'sub_title_'.$lang.' as sub_title',
            'text_btn_'.$lang.' as text_btn',
            'image',
            'url_direction'
        )->where('type', $type)
        ->where('is_deleted', 0)->first();
    }
}
