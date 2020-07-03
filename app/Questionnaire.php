<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
    protected $guarded=[];
    //protected $fillable=['sujet','title'];

    public function  user()
    {
        return $this->belongsTo(User::class);
    }
    public function  question()
    {
        return $this->hasMany(Question::class);
    }
}
