<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['id','nom_session','date_debut','date_fin','duree'];
    protected $dates = ['deleted_at'];
}
