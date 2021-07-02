<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherInstitutionViewsLikes extends Model
{
    protected $guarded = [];


    public function otherInstitutionVideos(){
        return $this->belongsTo(OtherInstitutionVideos::class, 'vid_id', 'vid_id');
    }
}

