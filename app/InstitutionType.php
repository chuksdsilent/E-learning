<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionType extends Model
{
    protected $table = "institution_type";
    protected $fillable = [
      'institution_type_id',
      'institution_type'
    ];
}
