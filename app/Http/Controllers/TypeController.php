<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function listeT()
    {
        return Type::all();
    }
    public function findIdType($nom)
    { $m= Type::where('nom_type','like',$nom)->pluck('id');
        return $m[0];
    }
}
