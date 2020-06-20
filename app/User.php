<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Questionnaire;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        ['id','nom','prenom','email','password','role', 'suppression','code_domaine','code_specialite','deleted_at','dateSuppression'];


    /**php
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
    protected $dates = ['deleted_at'];

    public function questionnaire()
    {
        return $this->hasMany(Questionnaire::class);

    }


}
