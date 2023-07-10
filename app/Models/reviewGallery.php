<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reviewGallery extends Model
{
    protected $table = 'review_gallery';
    protected $primaryKey = 'id';
    protected $fillable = ['path','id_review'];
}
