<?php

namespace App\Http\Controllers;
use App\Affectation_user_groupe_session;
use App\formation_session;
use App\Formation;
use Illuminate\Support\Facades\Auth;

use App\Session;
use App\Prolonger;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function Ajouter(Request $request)
    {
        $all = $request->all();
        $s = new Session();
        $s->nom_session = $all['nom_session'];

        $s->date_debut = ($all['date_debut']);
        $s->date_fin = ($all['date_fin']);

        $db = Carbon::createFromDate($s->date_debut);
        $df = Carbon::createFromDate($s->date_fin);
        $s->duree = $db->diffInDays($df);


        /* $x= Session::where('nom_session','like',"$s->nom_session")->get();
         if(count($x)==0)
         {*/
        $s->save();

        /* }
         else return 0;*/
    }

    public function listeS()
    {
        return Session::all();
    }
    public function listeusersession(){
        //$access_token = $user_id->header('Authorization');
        $user_id=Auth::id();
        $affectaions= Affectation_user_groupe_session::where ('idU' ,$user_id)->select('idS')->get();
        $session= session::whereIn('id',$affectaions)->get();
        $s=$session->get('date_fin');
       //if($s<)

    // return $session;
    $dateActuelle =Carbon::now();
     $u=Prolonger::get('idU');
     $prolongationsession=Prolonger::get('idS');
    if ($s>$dateActuelle)
    {
        return $session;
    }
    else if ( ($s < $dateActuelle) && ($u=$user_id) && ($prolongationsession= $session) ){
        return $session;

    }
    else return "aucune session existe";
   
    
                
       //dd($mytime);   
    }

    public function listerformationsession($session_id){
       

        $affectaions=formation_session::where ('session_id', $session_id)->select('formation_id')->get();
        $formations=Formation::whereIn('id',$affectaions)->get();
        
        return $formations;

    }

    public function prolonger(Request $request)
    {
        $all = $request->all();

        $s = $all['id'];
        $d = $all['date_fin'];
        $affected = Session::where('id', 'like', "$s")->get();
        $df = Carbon::createFromDate($affected[0]->date_fin);
        $dd = Carbon::createFromDate($affected[0]->date_debut);
        $duree = $dd->diffInDays($d);
        $update = Session::where('id', 'like', "$s")
        ->update(['date_fin' =>$d  ,'duree' =>$duree ] );

        return $update;
    }



}
