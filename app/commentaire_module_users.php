<?php

namespace App;
use App\user;
use App\Module;

use Illuminate\Database\Eloquent\Model;

class commentaire_module_users extends Model
{
    //
    //protected $guarded=[];
    protected $fillable = ['id','user_id','module_id','commentaire'];

   public function user(){
    return $this->belongsTo(User::class);
   }
   public function module(){
    return $this->belongsTo(Module::class);
   }

}
