<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';
    protected $primaryKey = 'id';
    protected $fillable = [
        'key_config', 'value'
    ];

    public static function getByKey($key){
        $data = self::select(
            'id',
            'value',
        )
        ->where('key_config', $key);

        return $data->first();
    }


}
