<?php


namespace App\Http\Controllers;

use App\User;
use App\Affectation_user_groupe_session;
use App\Affectation;
use App\Groupe;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function affectation(Request $request)
    {
        $all = $request->all();
        $a= new Affectation();

        $idU = $all['idU'];
        $idG = $all['idG'];
        $grp=Groupe::find($idG);
        $a->idU=$idU;
        $a->idG=$idG;
       
        $a->save();
    }
    public function number($id)
    {
       $list= Affectation::where('idG','=',"$id")->get();
       return sizeof($list);
    }
    public function numberSS($id)
    {
        $list= Affectation::where('idG','=',"$id")->
        orwhere('id_grp_p','=',"$id")->get();
        return sizeof($list);
    }
    public function numberS($id)
    {
        $list= Affectation::where('idG','=',"$id")->
      get();
        return sizeof($list);
    }

    public function listegrpnonvide()
    { $list;
      $liste = collect([]);
      $lp= collect([]);
      $list = User::all();
   foreach($list as $LGNV)
   {

   $liste->push( $LGNV->Groupes() );

   foreach( $LGNV->Groupes() as $l)
   {
       $liste->push($l->pivot->idU);
      
   }
    
       
    }
    return $liste;
    
   
  
    }

   


public function listeUserGrp( $idG)
{$listeU= collect([]);
   
    $groupe=Groupe::find($idG);
    $listeU->push( $groupe->Users() );

return $listeU;
}

public function affectationFormationGroupe(Request $request)
{
    $listeU= collect([]);
    $all = $request->all();
    $groupe=Groupe::find($all['1']);
 

   $listeU->push( $groupe->Users() );
 
    foreach ($listeU as $u ) {
    $a= new Affectation_user_groupe_session();
    foreach($u as $u1)
    {
    $a->idu=$u1->id;
    
    
    $a->idG=$all['1'];
    $a->idS= $all['0'];
    }

    $a->save();
    }

      
}

}
