<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructors extends Model
{
    protected $fillable = [
        'username',
        'email',
        'phone',
        'first_name',
        'last_name',
        'department',
        'country',
        'user_id',
        'dept_id',
        'faculty_id',
        'title'
    ];
}
