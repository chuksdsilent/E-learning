<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    protected $table = "topics"; 
    
    protected $guarded = [];

    public function courses()
    {
        return $this->belongsTo('App\Courses', 'course_id', 'topic_id');
    }
}
