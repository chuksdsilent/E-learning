<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universities extends Model
{
    protected $fillable = ['name', 'uni_id'];

    public function faculties(){
        return  $this->hasMany('\App\faculties', 'uni_id', 'uni_id');
    }
}
