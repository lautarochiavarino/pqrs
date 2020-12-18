<?php

namespace App\Http\Controllers;

use App\Feriado;
use App\Grupo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{


    public function gestionar($id)
    {

        $user = User::findOrFail($id);
        $grupo = Grupo::all();


        return view('admin.gestionar',compact('user','grupo'));
    }

    public function ver_usuarios()
    {

        $users = User::all();
        $grupo = Grupo::all();


        return view('admin.ver_usuarios',compact('users','grupo'));
    }

    public function save_profile(Request $request)
    {

        $user=User::findOrFail($request['id']);

        $user->grupo_id = $request['grupo_id'];

        $user->privilegio = $request['privilegio'];

        $user->save();

        return redirect ('/home');


    }

    public function save_grupo(Request $request)
    {



        Grupo::create($request->all());

        return redirect ('/admin/ver_grupos');


    }

    public function actualizar_grupo(Request $request)
    {


        $grupo=Grupo::findOrFail($request['id']);

        $grupo->nombre = $request['nombre'];
        $grupo->serie = $request['serie'];
        $grupo->subserie = $request['subserie'];

        $grupo->save();

        return redirect ('/admin/ver_grupos');


    }

    public function ver_grupos()
    {


        $grupos = Grupo::all();


        return view('admin.ver_grupos',compact('grupos'));
    }

    public function activar_grupo($id)
    {

        $grupo=Grupo::findOrFail($id);

        $grupo->estado = 1;

        $grupo->save();

        return redirect ('/admin/ver_grupos');
    }

    public function desactivar_grupo($id)
    {

        $grupo=Grupo::findOrFail($id);

        $grupo->estado = 0;

        $grupo->save();

        return redirect ('/admin/ver_grupos');
    }

    public function desactivar_usuario($id)
    {

        $user=User::findOrFail($id);

        $user->privilegio = 0;

        $user->save();

        return redirect ('/admin/gestionar/'.$id.'');
    }

    public function activar_usuario($id)
    {

        $user=User::findOrFail($id);

        $user->privilegio = 3;

        $user->save();

        return redirect ('/admin/gestionar/'.$id.'');
    }

    public function eliminar_usuario($id)
    {

        $user = User::find($id);
        $nombre=$user->name;
        $user->delete();

        session()->flash('eliminarusuario', 'El usuario '.$nombre.' fue eliminado con éxito.');
        return redirect ('/admin/ver_usuarios/');
    }


    public function reset_usuario($id)
    {

        $user = User::find($id);
        $nombre=$user->name;

        $clave = Hash::make('aes');

        $user->password = $clave;

        $user->save();

        session()->flash('reestrablecespassword', 'El password del usuario '.$nombre.' fue restablecido a "aes" y deberá cambiarlo en el próximo inicio de sesión.');
        return redirect ('/admin/gestionar/'.$id.'');
    }

    public function listar_usuarios_grupo($id)
    {

        $users = User::where('grupo_id', $id)->get();



        return view('admin.listar_usuarios_grupo',compact('users'));
    }

    public function modificar_grupo($id)
    {

        $grupo=Grupo::findOrFail($id);



        return view('admin.modificar_grupo',compact('grupo'));
    }

    public function nuevo_grupo()
    {




        return view('admin.nuevo_grupo');
    }

    public function cambiarpassword()
    {

        $user = Auth::user();




        return view('admin.cambiarpassword',compact('user'));
    }

    public function changepass(Request $request)
    {


        $user=User::findOrFail($request['id']);



        $clave = Hash::make($request['password']);

        $user->password = $clave;

        $user->save();





        session()->flash('cambiarpass', 'El password del usuario '.$user->name.' fue cambiado con éxito. Se lo pedirá en su nuevo inicio de sesión.');
        return redirect ('/admin/cambiarpassword');
    }

    public function festivos()
    {

        $feriados = Feriado::orderBy('fecha')->get();

        $enero = Feriado::orderBy('fecha')->whereMonth('fecha', 1)->get();
        $febrero = Feriado::orderBy('fecha')->whereMonth('fecha', 2)->get();
        $marzo = Feriado::orderBy('fecha')->whereMonth('fecha', 3)->get();
        $abril = Feriado::orderBy('fecha')->whereMonth('fecha', 4)->get();
        $mayo = Feriado::orderBy('fecha')->whereMonth('fecha', 5)->get();
        $junio = Feriado::orderBy('fecha')->whereMonth('fecha', 6)->get();
        $julio = Feriado::orderBy('fecha')->whereMonth('fecha', 7)->get();
        $agosto = Feriado::orderBy('fecha')->whereMonth('fecha', 8)->get();
        $septiembre = Feriado::orderBy('fecha')->whereMonth('fecha', 9)->get();
        $octubre = Feriado::orderBy('fecha')->whereMonth('fecha', 10)->get();
        $noviembre = Feriado::orderBy('fecha')->whereMonth('fecha', 11)->get();
        $diciembre = Feriado::orderBy('fecha')->whereMonth('fecha', 12)->get();



        return view('admin.festivos',compact('feriados','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'));
    }

    public function save_festivo(Request $request)
    {

        $hoy = Carbon::now()->format('Y-m-d');

        Feriado::create($request->all());

        return redirect ('/admin/festivos');


    }

    public function eliminar_festivo($id)
    {

        $feriado = Feriado::find($id);
        $fecha=$feriado->fecha;
        $feriado->delete();


        return redirect ('/admin/festivos/');
    }



}
