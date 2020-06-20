<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    //
    public function Ajout(Request $request)
    {
        $all = $request->all();
        $Formation = new Formation();

        $Formation->nom_formation = $all['nom_formation'];
        $Formation->description_formation = $all['description_formation'];
        $x= Formation::where('nom_formation','like',"$Formation->nom_formation")->get();
        if(count($x)==0)
        {
            $Formation->save();
            return 1;}
        else return 0;
    }
    public function listeF()
    {
        return Formation::all();
    }


    Public function chercherF( $nomF)
    {
        $f=new Formation() ;
        $f= Formation::where('nom_formation','like',"%$nomF%")->orWhere('description_formation','like',"%$nomF%")->get();



        return ($f);

    }
    public function suppF($code)
    {


        return Formation::where('id', $code)->delete();

    }
    public function afect()
    {
$for=Formation::find(3);
foreach ($for->sessions as $session)
   return $session;
    }
}
