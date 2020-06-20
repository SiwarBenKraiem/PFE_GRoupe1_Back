<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation_module extends Model
{
    //
    use SoftDeletes;

    protected $fillable =
        ['id_module','id_formation','duree'];
}
