<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tourGallery extends Model
{
    protected $table = 'tour_gallery';
    protected $primaryKey = 'id';
    protected $fillable = ['path','id_tour'];
}
