<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($file_name)
    {
        $file_path = public_path('archivos_pqrs/'.$file_name);
        return response()->download($file_path); }

    public function downloadRespuesta($file_name)
    {
        $file_path = public_path('respuesta/'.$file_name);
        return response()->download($file_path); }
}
