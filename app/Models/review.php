<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'id';
    protected $fillable = ['title_vi', 'title_en', 'description_vi', 'description_en', 'is_deleted'];

    public static function getAll($lang){
        return self::select(
            'id',
            'title_'.$lang.' as title',
            'description_'.$lang.' as description',
        )->where('is_deleted', 0)->get();
    }
}
