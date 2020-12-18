<?php

namespace App\Http\Controllers;

use App\Archivo_pqrs;
use App\Ciudad;
use App\Contacto;
use App\Grupo;
use App\Mail\Confirmacion;
use App\Mail\GrupoResolutor;
use App\Pais;
use App\Pqrs;
use App\Provincia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view ('index.index');
    }

    public function nuevocontacto(Request $request)
    {


        $request->session()->forget('archivos');
        $paises= Pais::pluck('nombre','id');




        return view('index.nuevocontacto', compact('paises'));

    }

    public function getProvincias(Request $request, $id){

        if($request->ajax()){
            $provincias = Provincia::provincias($id);
            return response()->json($provincias);
        }

    }

    public function getCiudades(Request $request, $id){
        if($request->ajax()){
            $ciudades = Ciudad::ciudades($id);
            return response()->json($ciudades);
        }

    }


        public function savecontacto(Request $request)
    {
        $contacto=Contacto::create( $request->all());

        $last_id=$contacto->id;
        return redirect ('nuevopqrs/'.$last_id.'');
    }



    public function nuevopqrs($id)
    {

        $contacto=Contacto::find($id);


        return view ('index.nuevopqrs',compact('contacto'));
    }

    public function savepqrs(Request $request)
    {
        $inputContacto['tipoContacto'] = $request->input("tipoContacto");
        $inputContacto['entidad'] = $request->input("entidad");
        $inputContacto['contacto'] = $request->input("contacto");
        $inputContacto['cargo'] = $request->input("cargo");
        $inputContacto['pais_id'] = $request->input("pais_id");
        $inputContacto['provincia_id'] = $request->input("provincia_id");
        $inputContacto['ciudad'] = $request->input("ciudad_id");

        $inputContacto['direccionFisica'] = $request->input("direccionFisica");
        $inputContacto['cp'] = $request->input("cp");
        $inputContacto['email'] = $request->input("email");
        $inputContacto['telFijo1'] = $request->input("telFijo1");
        $inputContacto['telFijo2'] = $request->input("telFijo2");
        $inputContacto['telCelular'] = $request->input("telCelular");
        $inputContacto['fax'] = $request->input("fax");
        $inputContacto['proposito'] = $request->input("proposito");
        $inputContacto['datosAdicionales'] = $request->input("datosAdicionales");

        $inputContacto['razonSocial'] = $request->input("razonSocial");
        $inputContacto['tipoTramite'] = $request->input("tipoTramite");
        $inputContacto['causal'] = $request->input("causal");
        $inputContacto['detalleCausal'] = $request->input("detalleCausal");
        $inputContacto['codigoSic'] = $request->input("codigoSic");
        $inputContacto['nroFactura'] = $request->input("nroFactura");
        $inputContacto['fechaEvento'] = $request->input("fechaEvento");


        $contacto=Contacto::create($inputContacto);





        $inputPqrs['aSuNombre'] = $request->input("aSuNombre");
        if ($request->input("formatoRecepcion") == NULL){
            $inputPqrs['formatoRecepcion'] = 'Redes Sociales';
        }else {
            $inputPqrs['formatoRecepcion'] = $request->input("formatoRecepcion");
        }
        $inputPqrs['tipoSolicitud'] = $request->input("tipoSolicitud");
        $inputPqrs['tipoSolicitante_id'] = $request->input("tipoSolicitante_id");
        $inputPqrs['medioRespuesta'] = $request->input("medioRespuesta");
        $inputPqrs['breveDescripcion'] = $request->input("breveDescripcion");
        $inputPqrs['descripcion'] = $request->input("descripcion");
        $inputPqrs['contacto_id'] = $contacto->id;

        switch ($request->input("tipoSolicitante_id")) {
            case "Accionista":
                $inputPqrs['grupo_id'] = "1";
                break;
            case "Cliente":
                $inputPqrs['grupo_id'] = "4";
                break;
            case "Colaborador/Pensionado":
                $inputPqrs['grupo_id'] = "3";
                break;
            case "Comunidad":
                $inputPqrs['grupo_id'] = "5";
                break;
            case "Entidad Gubernamental":
                $inputPqrs['grupo_id'] = "1";
                break;
            case "Medios de Comunicación":
                $inputPqrs['grupo_id'] = "6";
                break;
            case "Proveedor":
                $inputPqrs['grupo_id'] = "2";
                break;
            case "Otros":
                $inputPqrs['grupo_id'] = "1";
                break;
        }



        $pqrs=Pqrs::create($inputPqrs);

        $last_id=$pqrs->id;


        if ($request->hasfile('archivospqrs')) {

            foreach ($request['archivospqrs'] as $adjunto) {
                $file = $adjunto;


                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/archivos_pqrs/', $name);

                $input['archivospqrs'] = $name;


                $arch = new Archivo_pqrs();
                $arch->pqrs_id = $last_id;
                $arch->nombre = $input['archivospqrs'];

                $arch->save();

            }

        }





        if ($request->input("medioRespuesta")== "Correo Electrónico"){

          // Mail::to($inputContacto['email'])->send(new Confirmacion($contacto, $pqrs));
        }





        $users = User::where('grupo_id', $pqrs['grupo_id'])->get();

      foreach ($users as $user){
         //   Mail::to($user['email'])->send(new GrupoResolutor($user, $pqrs));
        }

        $codigo=$pqrs->tipoSolicitud[0].$pqrs->id;
        return back()->with(['status' => $last_id, 'codigo'=>$codigo]);
    }

    public function seguimiento()
    {
        return view ('index.seguimiento');
    }

    public function detallepqrs(Request $request)
    {
        $pqrs=Pqrs::find($request['seguimiento']);

        if ($pqrs == null){
            $pqrs = "NULL";
            return view ('index.detallepqrs', compact('pqrs'));
        }elseif ($pqrs->tipoSolicitud[0].$pqrs->id == $request['codigo']) {
            return view('index.detallepqrs', compact('pqrs'));

        }
        $pqrs = "NULL";
        return view ('index.detallepqrs', compact('pqrs'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {

        Pqrs::create( $request->all());

        return back()->with('success', 'PQRS has been send');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function archivos_pqrs(Request $request){


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('archivos_pqrs'),$imageName);


        $imageUpload = new Archivo_pqrs();
        $imageUpload->nombre = $imageName;
        $imageUpload->save();


        $array = $request->session()->get('archivos');

        $array[] = $imageUpload->id;

        $request->session()->put('archivos', $array);

    }

    public function fileDestroy(Request $request)
    {
        $filename = $request->id;
        $uploaded_image = Archivo_pqrs::where('nombre', basename($filename))->first();
        var_dump($uploaded_image); die();
        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path . 'respuesta' . $uploaded_image->filename;
        $resized_file = $this->photos_path . 'respuesta' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (file_exists($resized_file)) {
            unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['message' => 'File successfully delete'], 200);
    }




}
