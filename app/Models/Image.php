<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'image', 'url_direction', 'type', 'is_deleted'
    ];

    public static function getAllByType($type){
        return self::select(
            'id',
            'title',
            'image',
            'url_direction'
        )->where('type', $type)
        ->where('is_deleted', 0)->first();
    }
}
