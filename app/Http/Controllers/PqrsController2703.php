<?php

namespace App\Http\Controllers;

use App\Archivo_pqrs;
use App\Contacto;
use App\Grupo;
use App\Mail\RespuestaPreliminar;
use App\Pqrs;
use App\Respuesta;
use App\Respuesta_pqrs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Null_;
use Carbon\Carbon;
use App\Mail\GrupoResolutor;
use App\Mail\RespuestaFinal;





class PqrsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function resultado(Request $request)
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde'], $request['fecha_hasta']])->where('grupo_id', $user->grupo_id)->get();
        }else{
            $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde'], $request['fecha_hasta']])->get();
        }


        return view ('pqrs.resultado',compact('pqrs','request'));
    }

    public function resultadoavanzado(Request $request)
    {

        $texto=$request['texto'];
            $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde_a'], $request['fecha_hasta_a']])
                ->where('breveDescripcion', 'LIKE', "%$texto%")
                ->orWhere('descripcion', 'LIKE', "%$texto%")->get();



        return view ('pqrs.resultadoavanzado',compact('pqrs','request'));
    }

    public function resultadoetiqueta(Request $request)
    {

        $etiqueta=$request['etiqueta'];
        $pqrs = Pqrs::whereBetween('created_at', [$request['fecha_desde_e'], $request['fecha_hasta_e']])
            ->where('etiqueta', 'LIKE', "%$etiqueta%")->get();



        return view ('pqrs.resultadoetiqueta',compact('pqrs','request'));
    }

    public function nuevas()
    {

        $user = Auth::user();
        if ($user->privilegio == 3){
            $pqrs_new = Pqrs::where('estado', '=', 0)->where('grupo_id', $user->grupo_id)->orderby('created_at','DESC')->get();
        }else{
            $pqrs_new = Pqrs::where('estado', '=', 0)->orderby('created_at','DESC')->get();
        }



        return view ('pqrs.nuevas',compact('pqrs_new'));
    }

    public function abiertas()
    {
        $user = Auth::user();
        if ($user->privilegio == 3){
            $pqrs_open = Pqrs::where('estado', '=', 1)->where('grupo_id', $user->grupo_id)->orderby('created_at','DESC')->get();
        }else{
            $pqrs_open = Pqrs::where('estado', '=', 1)->orderby('created_at','DESC')->get();
        }


        return view ('pqrs.abiertas',compact('pqrs_open'));
    }

    public function cerradas()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_closed = Pqrs::where('estado', '=', 2)->where('grupo_id', $user->grupo_id)->orderby('created_at', 'DESC')->get();
        }else{
            $pqrs_closed = Pqrs::where('estado', '=', 2)->orderby('created_at', 'DESC')->get();
        }


        return view ('pqrs.cerradas',compact('pqrs_closed'));
    }

    public function todas()
    {
        $user = Auth::user();
        if ($user->privilegio == 3) {
            $pqrs_todas = Pqrs::orderby('created_at', 'DESC')->where('grupo_id', $user->grupo_id)->get();
        }else{
            $pqrs_todas = Pqrs::orderby('created_at', 'DESC')->get();
        }


        return view ('pqrs.todas',compact('pqrs_todas'));
    }

    public function diez()
    {
        $user = Auth::user();
        if ($user->privilegio == 3){
            $pqrs_diez = Pqrs::where('tiempoRespuesta', '=', '10')->where('grupo_id', $user->grupo_id)->orderby('created_at','DESC')->get();
        }else{
            $pqrs_diez = Pqrs::where('tiempoRespuesta', '=', '10')->orderby('created_at','DESC')->get();
        }


        return view ('pqrs.diez',compact('pqrs_diez'));
    }

    public function treinta()
    {
        $user = Auth::user();
        if ($user->privilegio == 3){
            $pqrs_treinta = Pqrs::where('tiempoRespuesta', '=', '30')->where('grupo_id', $user->grupo_id)->orderby('created_at','DESC')->get();
        }else{
            $pqrs_treinta = Pqrs::where('tiempoRespuesta', '=', '30')->orderby('created_at','DESC')->get();
        }


        return view ('pqrs.treinta',compact('pqrs_treinta'));
    }

    public function treintayuno()
    {
        $user = Auth::user();
        if ($user->privilegio == 3){
            $pqrs_treintayuno = Pqrs::where('tiempoRespuesta', '=', '+30')->where('grupo_id', $user->grupo_id)->orderby('created_at','DESC')->get();
        }else{
            $pqrs_treintayuno = Pqrs::where('tiempoRespuesta', '=', '+30')->orderby('created_at','DESC')->get();
        }


        return view ('pqrs.treintayuno',compact('pqrs_treintayuno'));
    }

    public function gestionar($id)
    {


       
        $user = Auth::user();


        $user_id=$user->id;

        $pqrs = Pqrs::findOrFail($id);

        $respuestas = Respuesta::where('pqrs_id', '=', $id)->orderby('created_at','DESC')->get();

        $grupo = Grupo::where('estado', '=', 1)->get();


        $responsables = User::where('grupo_id', '=', $pqrs->grupo_id)->get();



        $respuesta = Respuesta::where('pqrs_id', '=', $id)->orderby('created_at','DESC')->take(1)->get();

        $archivos = Archivo_pqrs::where('pqrs_id',$id)->get();



        $vencimiento = $pqrs->created_at->addDay($pqrs->tiempoRespuesta);


        $archivosRespuestas = Respuesta_pqrs::where('pqrs_id', $id)->get();


            return view ('pqrs.gestionar',compact('pqrs','grupo','user_id','id','respuestas','respuesta', 'user','responsables','vencimiento','archivos','archivosRespuestas'));


      /*  return view ('pqrs.gestionar',compact('pqrs','grupo', 'user_id','id','respuestas'));*/
    }



    public function cambiargrupopqrs (Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->grupo_id = $request['grupo_id'];

        $pqrs->estado = 1;

        $pqrs->save();

        return redirect ('/pqrs/gestionar/'.$request['id'].'');

    }

    public function cambiarTiempoRespuesta (Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->tiempoRespuesta = $request['tiempoRespuesta'];



        $pqrs->save();

        $contacto=Contacto::findOrFail($pqrs->contacto_id);


        $respuesta = Respuesta::where('pqrs_id', '=', $request['id'])->orderby('created_at','DESC')->first();





        if ($respuesta != null) {
            //enviar mails a contacto y al general  pqrs.aescolombia@aes.com
            if ($pqrs->medioRespuesta == 'Correo Electrónico') {
                Mail::to($contacto['email'])->send(new RespuestaPreliminar($respuesta, $pqrs, $contacto));

            }


            Mail::to('pqrs.aescolombia@aes.com')->send(new RespuestaPreliminar($respuesta, $pqrs, $contacto));

        }


        return redirect ('/pqrs/gestionar/'.$request['id'].'');

    }

    public function asignarresponsable (Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->responsable_id = $request['responsable_id'];

        $pqrs->save();

        $usr=User::findOrFail($request['responsable_id']);

        Mail::to($usr['email'])->send(new GrupoResolutor($usr, $pqrs));



        return redirect ('/pqrs/gestionar/'.$request['id'].'');

    }

    public function agregaretiqueta (Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $pqrs->etiqueta = $request['etiqueta'];



        $pqrs->save();

        return redirect ('/pqrs/gestionar/'.$request['id'].'');

    }

    public function respuesta (Request $request)
    {

        $respuesta = Respuesta::findOrFail($request['id']);


        return view ('pqrs.respuesta',compact('respuesta'));

    }

    public function respuestaFinal (Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);


        return view ('pqrs.respuestaFinal',compact('pqrs'));

    }

    public function respuestaPreliminar (Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);


        return view ('pqrs.respuestaPreliminar',compact('pqrs'));

    }

    public function verpqrs (Request $request)
    {

        $pqrs = Pqrs::findOrFail($request['id']);

        $respuestas = Respuesta::where('pqrs_id', '=', $request['id'])->orderby('created_at','DESC')->get();


        return view ('pqrs.verpqrs',compact('pqrs','respuestas'));

    }

    public function asignarrespuesta(Request $request)
    {

        $input = $request->all();





        if (isset( $input['guardarYCerrar'])){
            $pqrs = Pqrs::findOrFail($request['pqrs_id']);

            $pqrs->cerrado = date('Y-m-d H:i:s');

            $pqrs->estado = 2;

            $pqrs->save();

            $contacto=Contacto::findOrFail($pqrs->contacto_id);

            $respuesta['respuestaFinal']="Respuesta Vacía";



            if ($pqrs->medioRespuesta == 'Correo Electrónico'){
                Mail::to($contacto['email'])->send(new RespuestaFinal($respuesta,$pqrs,$contacto));

            }


            Mail::to('pqrs.aescolombia@aes.com')->send(new RespuestaFinal($respuesta,$pqrs,$contacto));





        }

        if (isset( $input['actualizarYCerrar'])){
           /* $pqrs = Pqrs::findOrFail($request['pqrs_id']);

            $pqrs->cerrado = date('Y-m-d H:i:s');

            $pqrs->estado = 2;

            $pqrs->save();

            $respuesta = Respuesta::findOrFail($request['respuesta_id']);




            $input = $request->all();
            $respuesta->update($input);*/

            $pqrs = Pqrs::findOrFail($request['pqrs_id']);

            $pqrs->cerrado = date('Y-m-d H:i:s');

            $pqrs->estado = 2;

            $pqrs->save();

            Respuesta::create($input);

            $contacto=Contacto::findOrFail($pqrs->contacto_id);


            $respuesta = Respuesta::where('pqrs_id', '=', $request['pqrs_id'])->orderby('created_at','DESC')->first();



            if ($pqrs->medioRespuesta == 'Correo Electrónico'){
                Mail::to($contacto['email'])->send(new RespuestaFinal($respuesta,$pqrs,$contacto));

            }


            Mail::to('pqrs.aescolombia@aes.com')->send(new RespuestaFinal($respuesta,$pqrs,$contacto));

            return redirect ('/home');


        }

        if (isset( $input['actualizar'])){


           /* $respuesta = Respuesta::findOrFail($request['respuesta_id']);




            $input = $request->all();
            $respuesta->update($input);*/

            $respuesta=Respuesta::create($input);

            return redirect ('/pqrs/gestionar/'.$respuesta->pqrs_id.'');


        }

        $pqrs = Pqrs::findOrFail($request['pqrs_id']);



        $pqrs->estado = 1;

        if($request->hasfile('adjuntarSoporteGestion'))
        {
            $file = $request->file('adjuntarSoporteGestion');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/respuesta/', $name);

            $input['adjuntarSoporteGestion']=$name;

            $archivosGestion =  $input['adjuntarSoporteGestion'];


        if ($archivosGestion  != 'default') {
            foreach ($archivosGestion as $a) {
                $arch = Respuesta_pqrs::find($a);
                $arch->pqrs_id = $pqrs->id;
                $arch->save();
            }
        }
        }



        $pqrs->save();

        Respuesta::create($input);

        return redirect ('/pqrs/gestionar/'.$request['pqrs_id'].'');
    }



    public function cerrarpqrs(Request $request)
    {

        $input = $request->all();





        if($request->hasfile('adjuntarSoportePreliminar'))
        {
            $file = $request->file('adjuntarSoportePreliminar');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/respuesta/', $name);

            $input['adjuntarSoportePreliminar']=$name;
        }

        if($request->hasfile('adjuntarSoporteFinal'))
        {
            $file = $request->file('adjuntarSoporteFinal');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/respuesta/', $name);

            $input['adjuntarSoporteFinal']=$name;
        }


            $pqrs = Pqrs::findOrFail($request['pqrs_id']);

            $pqrs->cerrado = date('Y-m-d H:i:s');

            $pqrs->respuestaPreliminar = $request['respuestaPreliminar'];

            $pqrs->respuestaFinal = $request['respuestaFinal'];

             $pqrs->consecutivoCorrespondencia = $request['consecutivoCorrespondencia'];

        $pqrs->adjuntarSoporteFinal = $request['adjuntarSoporteFinal'];

        $pqrs->adjuntarSoportePreliminar = $request['adjuntarSoportePreliminar'];

            if ($request['respuestaFinal']) {
                $pqrs->estado = 2;
            }
            $pqrs->save();


        $archivosRespuesta = $request->session()->pull('archivosRespuesta', 'default');


        if ($archivosRespuesta != 'default') {
            foreach ($archivosRespuesta as $a) {
                $arch = Respuesta_pqrs::find($a);
                $arch->pqrs_id = $pqrs->id;
                $arch->save();
            }
        }

        $archivosRespuestaPreliminar = $request->session()->pull('archivosRespuestaPreliminar', 'default');


        if ($archivosRespuestaPreliminar != 'default') {
            foreach ($archivosRespuestaPreliminar as $a) {
                $arch = Respuesta_pqrs::find($a);
                $arch->pqrs_id = $pqrs->id;
                $arch->save();
            }
        }

            $contacto=Contacto::findOrFail($pqrs->contacto_id);

            $respuesta['respuestaFinal']=$request['respuestaFinal'];



            if ($pqrs->medioRespuesta == 'Correo Electrónico'){
                Mail::to($contacto['email'])->send(new RespuestaFinal($respuesta,$pqrs,$contacto));

            }


            Mail::to('pqrs.aescolombia@aes.com')->send(new RespuestaFinal($respuesta,$pqrs,$contacto));







        return redirect ('/pqrs/gestionar/'.$request['pqrs_id'].'');
    }

    public function adjuntarRespuesta(Request $request){


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('respuesta'),$imageName);


        $imageUpload = new Respuesta_pqrs();
        $imageUpload->nombre = $imageName;
        $imageUpload->tipo = "Respuesta Final";
        $imageUpload->save();


        $array = $request->session()->get('archivosRespuesta');

        $array[] = $imageUpload->id;

        $request->session()->put('archivosRespuesta', $array);

    }

    public function adjuntarRespuestaPreliminar(Request $request){


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('respuesta'),$imageName);


        $imageUpload = new Respuesta_pqrs();
        $imageUpload->nombre = $imageName;

        $imageUpload->tipo = "Respuesta Preliminar";
        $imageUpload->save();


        $array = $request->session()->get('archivosRespuestaPreliminar');

        $array[] = $imageUpload->id;

        $request->session()->put('archivosRespuestaPreliminar', $array);

    }

    public function adjuntarRespuestaGestion(Request $request){


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('respuesta'),$imageName);


        $imageUpload = new Respuesta_pqrs();
        $imageUpload->nombre = $imageName;

        $imageUpload->tipo = "Soporte Gestión";
        $imageUpload->save();


        $array = $request->session()->get('archivosGestion');

        $array[] = $imageUpload->id;

        $request->session()->put('archivosGestion', $array);

    }

}
