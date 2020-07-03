<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['id','nom_session','date_debut','date_fin','duree'];
    protected $dates = ['deleted_at'];
}
