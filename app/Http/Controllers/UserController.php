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
use Validator;

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
      /* $this->validate($request,[
           'oldpassword' => 'required',
           'password' => 'required|confirmed'
       ]);
       $hashedpassword=Auth::user()->password;
        
        
       if($user){
        if(Hash::check($request['oldpassword'],$hashedpassword))
        {
            $user=User::find(Auth::id());
            $user->password= Hash::make($request->password);
            $user->save();
            return response()->json([
               
                'message' => 'password change'
              ]);
        }
        else {
            return response()->json([
                
                'message' => 'Erreur'
              ]);
        }
        }
       */
      $user = Auth::getUser();
        $this->validator($request->all())->validate();
        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->password = $request->get('new_password');
            $user->save();
            return redirect($this->redirectTo)->with('success', 'Password change successfully!');
        } else {
            return redirect()->back()->withErrors('Current password is incorrect');
        }



    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
    }
    public function Consulter($id){
        return User::findOrFail($id);
    }






}
?>
