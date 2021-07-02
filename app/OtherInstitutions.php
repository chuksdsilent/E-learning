<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherInstitutions extends Model
{
    protected $fillable  = ['institution_id', 'institution_type_id', 'institution_name'];


    public function otherInstitutionCourses()
    {
        return $this->hasMany(OtherInstitutionCourses::class, 'institution_id', 'institution_id');
    }
}
