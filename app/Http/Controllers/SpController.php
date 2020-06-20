<?php

namespace App\Http\Controllers;

use App\specialite;
use Illuminate\Http\Request;
use mysql_xdevapi\DatabaseObject;

class SpController extends Controller
{
    public function Ajouter(Request $request)
    {
        $all = $request->all();
        $sp=new specialite();
        $sp->nom_specialite =$all['nom'];
        $sp->id_domaine=$all['code_domaine'];
        $sp->save();
    }
    public function liste()
    {
        return specialite::all();


    }
    Public function chercherS( $nomS)
    {
       $spe=new specialite();
        $spe= specialite::where('nom_specialite','like',$nomS)->pluck('id');



        return ($spe);

    }
    public function suppS($code)
    {

        Specialite::where('id_specialite', $code)->delete();
        return 240;

    }
}
