<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{use SoftDeletes;
    //
    protected $fillable =
        ['id','nom_formation','description_formation'];

}
