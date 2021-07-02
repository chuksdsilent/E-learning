<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $guarded = [];


    public function departments(){
        return $this->belongsTo(Departments::class, 'dept_id', 'dept_id');
    }

    public function topics(){
        return $this->hasMany(topics::class, 'course_id', 'course_id');
    }

    public function scopeSearchedVideos($query, $column, $value){
        return $query->where($column, 'like', '%' . $request->get('search_item') . '%')->orWhere('name', 'like', '%' .  $request->get('search_item')  . '%');
    }
}
