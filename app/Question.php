<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
   protected $guarded=[];
   
    //protected $fillable=['id','txt_question','descriptif_reponse'];


    public function  Questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }


    public function  answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function  Options()
    {
        return $this->hasMany(Option::class);
    }
}
