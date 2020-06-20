<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Affectation extends Model
{use SoftDeletes;
    //

    protected $fillable =
        ['id','idU','idG','id_grp_p','id_grp_p_p'];

}
