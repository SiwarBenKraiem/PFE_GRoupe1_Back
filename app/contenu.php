<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Contenu extends Model
{
    //
    use SoftDeletes;

    //*
    protected $fillable =
        ['id,nom_contenu,contenu,id_type,id_module'];
    protected $dates = ['deleted_at'];
}
