<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    //
    use SoftDeletes;
    protected $fillable =
        ['id','nom_module'];
    public function formations()
    {
        return $this->belongsToMany('App\Formation');
    }
}
