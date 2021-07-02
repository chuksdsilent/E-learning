<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoViewsLikes extends Model
{
    protected $table = "video_views_likes";
    protected $guarded = [];

    public function videos(){
        return $this->belongsTo(Videos::class, 'vid_id', 'vid_id');
    }
}
