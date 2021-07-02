<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherInstitutionCourses extends Model
{
    protected  $fillable = [
        'institution_id',
        'course_id',
        'course_name',
        'course_code',
        'level'
        ];

    public function OtherInstitutions()
    {
        return $this->belongsTo(OtherInstitutions::class, "institution_id", "institution_id");
    }
}
