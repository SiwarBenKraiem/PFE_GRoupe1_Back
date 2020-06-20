<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    protected $fillable=['id','question_id','txt','is_true'];
    //protected $guarded=[];
    public function questions()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
