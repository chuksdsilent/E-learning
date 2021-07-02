<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherInstitutionVideos extends Model
{
    protected $guarded = [];

    public function other_institution_views_likes(){
        return $this->hasMany(OtherInstitutionViewsLikes::class, 'vid_id', 'vid_id');
    }
}
