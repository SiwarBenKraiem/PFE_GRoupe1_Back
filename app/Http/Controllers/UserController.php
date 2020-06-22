<?php
namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use function GuzzleHttp\Psr7\copy_to_string;

class UserController  extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }
    /**
     * @return \Illuminate\Support\Collection
     */

    public function search($query)
{
    $users= User::where('nom','like',"%$query%")
        ->orWhere('prenom','like',"%$query%")
        ->orWhere('email','like',"%$query%")
        ->get();

    //return View
    return $users;
}
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        Excel::import(new UsersImport,$request->file('file'));

        return back();
    }

    public function supp($id)
    {
        $res=User::where('id',$id)->delete();


        return $res;

             }



    public function Ajout(Request $request)
    {
        $all = $request->all();
        $User = new User();


        $User->nom = $all['nom'];
        $User->prenom = $all['prenom'];
        $User->email = $all['email'];

        $User->password = \Hash::make($all['password']);
        $User->role = $all['Role'];


        $User->id_domaine= $all['code_domaine'];
        $User->id_specialite= $all['code_specialite'];
        $User->suppression=$all['suppression'];
        $User->dateSuppression=$all['dateSuppression'];
        $use=User::where('email','like',"$User->email")->get();
        $userr = User::where('email','like',"$User->email")->onlyTrashed()
            ->update(['deleted_at' => null,'nom'=>$all['nom'],'prenom' =>$all['prenom'],'password' => \Hash::make($all['password']),
                'Role' => $all['Role'],'id_domaine' => $all['code_domaine'],'id_specialite' =>$all['code_specialite'],
                'suppression'=>$all['suppression'],'dateSuppression'=>$all['dateSuppression']]);


        if(count($use)==0 && !$userr   ) {
          $User->save();
          return 1;
        }
        else if(count($use)!=0  )
        {
            return 0 ;
        }

        return 3;



       }
       public function suppression_auto()
      {$today=date('Y-m-d');

      return User::where('dateSuppression','<=',"$today")->delete(); ;



         }

    public function liste()
    {
        return User::all();
        //return User::withTrashed()->get();
    }

    public function changepassword(Request $request)
    {
       
    $data = $request->all();

        if(!\Hash::check($data['old_password'], auth()->user()->password)){

             return back()->with('error','You have entered wrong password');

        }else{

            $user = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return response()->json([
                   
                'message' => 'password change'
              ]);

        }
       



    }
    public function Consulter($id){
        return User::findOrFail($id);
    }






}
?>
