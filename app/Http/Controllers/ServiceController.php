<?php

namespace App\Http\Controllers;

use App\Pais;
use App\Provincia;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function GetPaises()
    {
        $paises = Pais::all();

        $data = [];
        $data[0] = [
            'id'   => 0,
            'text' =>'Seleccione',
        ];
        foreach ($paises as $key => $value) {
            $data[$key+1] =[
                'id'   => $value->id,
                'text' => $value->nombre,
            ];
            # code...
        }
        return response()->json($data);
    }
    public function GetProvincias($id)
    {
        $provincias = Provincia::where('pais_id',$id)->get();
        $data = [];
        $data[0] = [
            'id'   => 0,
            'text' =>'Seleccione',
        ];
        foreach ($provincias as $key => $value) {
            $data[$key+1] =[
                'id'   => $value->id,
                'text' => $value->nombre,
            ];
        }
        return response()->json($data);
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
        //
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
}
