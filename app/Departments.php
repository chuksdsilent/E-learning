<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $guarded = [];

    public function faculties(){
        return $this->belongsTo(Faculties::class, 'fac_id', 'fac_id');
    }

    public function courses(){
        return $this->hasMany(Courses::class, 'dept_id', 'dept_id');
    }
}
