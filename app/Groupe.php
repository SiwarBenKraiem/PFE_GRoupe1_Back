<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groupe extends Model
{
    //
    use SoftDeletes;

    protected $fillable =
        ['id','nom','description','id_grp_p','id_grp_p_p'];
    protected $dates = ['deleted_at'];
}
