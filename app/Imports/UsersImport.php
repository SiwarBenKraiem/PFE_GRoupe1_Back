<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new User([
            'nom'     => $row[2],
           'prenom'     => $row[1],
            'email'    => $row[0],
            'password' => \Hash::make($row[3]),
            'role'    => $row[4],
            'suppression'=> $row[5],
             'code_domaine'=> $row[6],
             'code_specialite'=> $row[7],

        ]);

    }
}
