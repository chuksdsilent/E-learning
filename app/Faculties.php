<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    
    protected $fillable = ['name', 'uni_id' , 'fac_id'];

    public function universities(){
      return  $this->belongsTo('\App\Universities', 'uni_id', 'uni_id');
    }

    public function departments(){
      return $this->hasMany(Departments::class, 'fac_id', 'fac_id');
    }
}
