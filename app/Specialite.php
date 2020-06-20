<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialite extends Model
{
    //
    use SoftDeletes;

    protected $fillable =
        ['id','id_domaine','nom_specialite'];
    protected $dates = ['deleted_at'];
}
