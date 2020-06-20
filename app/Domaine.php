<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domaine extends Model
{
    use SoftDeletes;

    //*
    protected $fillable =
        ['id,nom_domaine'];
    protected $dates = ['deleted_at'];
}
