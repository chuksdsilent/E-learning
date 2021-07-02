<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $guarded = [];

    public function courses(){
        return $this->belongTo(Courses::class, 'course_id', 'course_id');
    }

    public function videoViewsLikes(){
        return $this->hasMany(videoViewsLikes::class, 'vid_id', 'vid_id');
    }
}
