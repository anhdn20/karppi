<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $fillable = ['title','image', 'url', 'type', 'priority', 'is_deleted'];
}
