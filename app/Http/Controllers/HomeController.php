<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Pqrs;
use App\Respuesta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            $user = Auth::user();
        if ($user->privilegio == 3) {
            $count_new = Pqrs::where('estado', '=', 0)->where('grupo_id', $user->grupo_id)->count();
            $count_open = Pqrs::where('estado', '=', 1)->where('grupo_id', $user->grupo_id)->count();
            $count_close = Pqrs::where('estado', '=', 2)->where('grupo_id', $user->grupo_id)->count();
            $count_all = Pqrs::where('grupo_id', $user->grupo_id)->count();

            $count_new_10 = Pqrs::where('estado', '=', 0)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '10')->count();
            $count_open_10 = Pqrs::where('estado', '=', 1)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '10')->count();
            $count_close_10 = Pqrs::where('estado', '=', 2)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '10')->count();
            $count_all_10 = Pqrs::where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '10')->count();

            $count_new_30 = Pqrs::where('estado', '=', 0)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '30')->count();
            $count_open_30 = Pqrs::where('estado', '=', 1)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '30')->count();
            $count_close_30 = Pqrs::where('estado', '=', 2)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '30')->count();
            $count_all_30 = Pqrs::where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '30')->count();

            $count_new_31 = Pqrs::where('estado', '=', 0)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '+30')->count();
            $count_open_31 = Pqrs::where('estado', '=', 1)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '+30')->count();
            $count_close_31 = Pqrs::where('estado', '=', 2)->where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '+30')->count();
            $count_all_31 = Pqrs::where('grupo_id', $user->grupo_id)->where('tiempoRespuesta', '+30')->count();


        }else{
            $count_new = Pqrs::where('estado', '=', 0)->count();
            $count_open = Pqrs::where('estado', '=', 1)->count();
            $count_close = Pqrs::where('estado', '=', 2)->count();
            $count_all = Pqrs::all()->count();


            $count_new_10 = Pqrs::where('estado', '=', 0)->where('tiempoRespuesta', '10')->count();
            $count_open_10 = Pqrs::where('estado', '=', 1)->where('tiempoRespuesta', '10')->count();
            $count_close_10 = Pqrs::where('estado', '=', 2)->where('tiempoRespuesta', '10')->count();
            $count_all_10 = Pqrs::where('tiempoRespuesta', '10')->count();

            $count_new_30 = Pqrs::where('estado', '=', 0)->where('tiempoRespuesta', '30')->count();
            $count_open_30 = Pqrs::where('estado', '=', 1)->where('tiempoRespuesta', '30')->count();
            $count_close_30 = Pqrs::where('estado', '=', 2)->where('tiempoRespuesta', '30')->count();
            $count_all_30 = Pqrs::where('tiempoRespuesta', '30')->count();

            $count_new_31 = Pqrs::where('estado', '=', 0)->where('tiempoRespuesta', '+30')->count();
            $count_open_31 = Pqrs::where('estado', '=', 1)->where('tiempoRespuesta', '+30')->count();
            $count_close_31 = Pqrs::where('estado', '=', 2)->where('tiempoRespuesta', '+30')->count();
            $count_all_31 = Pqrs::where('tiempoRespuesta', '+30')->count();
        }







        $users_id=$user->id;
        $usr=User::findOrFail($users_id);


        $grupo = Grupo::all();




        if ($user->privilegio == 3) {
            $pqrsXgrupo= Pqrs::where('grupo_id', '=', $user->grupo_id)->orderby('created_at','DESC')->get();
        }else{
            $pqrsXgrupo= Pqrs::orderby('created_at','DESC')->get();
        }



        $etiqueta= Pqrs::distinct()->select('etiqueta')->where('etiqueta', '!=', 'NULL')->orderby('etiqueta','DESC')->get();


        if ($user->grupo->estado == '0' or $usr->privilegio == '0') {
            Auth::logout();

            if ($usr->privilegio == '0') {
                session()->flash('grupo', 'Su usuario fue desactivado. Contactese con el administrador.');
            }
            if ($user->grupo->estado == '0'){
                session()->flash('grupo', 'Su usuario pertenece a un grupo que fue desactivado. Contactese con el administrador.');
            }

            return redirect ('/login');

        }else{
            return view('home', compact('count_close', 'count_new', 'count_open', 'usr', 'grupo', 'pqrsXgrupo', 'count_all', 'etiqueta','count_close_10', 'count_new_10', 'count_open_10', 'count_all_10','count_close_30', 'count_new_30', 'count_open_30', 'count_all_30','count_close_31', 'count_new_31', 'count_open_31', 'count_all_31'));
        }

    }


    public function cambiargrupo (Request $request)
    {

        $user = Auth::user();

        $user->grupo_id = $request['grupo_id'];

        $user->save();

        return redirect ('/home');

    }

}
