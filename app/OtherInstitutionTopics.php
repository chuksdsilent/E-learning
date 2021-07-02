<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherInstitutionTopics extends Model
{
    protected $fillable = [
        'course_id',
        'topic_id',
        'level',
        'name'
        ];
}
