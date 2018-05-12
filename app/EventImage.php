<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $table = 'event_image';
    protected $fillable = ['id', 'image_url', 'user_id'];
}
