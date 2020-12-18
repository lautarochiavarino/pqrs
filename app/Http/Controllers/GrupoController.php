<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\User;
use Illuminate\Support\Facades\Auth;

class GrupoController extends Controller
{
    public function index()
    {

        $user = Auth::user();


        $users_id=$user->id;
        $usr=User::findOrFail($users_id);

        $grupo = Grupo::all();
        return view('grupo.index',compact('grupo','usr'));
    }
}
