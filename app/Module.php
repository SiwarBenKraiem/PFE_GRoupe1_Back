<?php

namespace App;
use App\commentaire_module_users;

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

    public function commentaire(){
        return $this->hasMany(commentaire_module_users::class);

    }
}
