<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToImage extends Model
{
    protected $table = 'user_to_image';
    protected $fillable = ['id', 'user_id', 'image_id', 'is_vote'];
}
