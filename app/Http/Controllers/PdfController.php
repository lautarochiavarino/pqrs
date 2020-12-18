<?php
namespace App\Http\Controllers;
use App\Pqrs;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PdfController extends Controller
{
    public function getIndex()
    {
        return view('pdf.index');
    }
    public function getGenerar(Request $request)
    {
        $id = $request->get('id');

        return $this->pdf($id);
    }
    public function pdf($id)
    {
        $pqrs=Pqrs::find($id);


        $data['contacto']=$pqrs->contacto->contacto;

        if ($pqrs->estado === 0){
            $data['estado']="Recibido";
        }
        if ($pqrs->estado === 1){
            $data['estado']="En proceso";
        }
        if ($pqrs->estado === 2){
            $data['estado']="Cerrado";
        }

        $data['tipoSolicitud']=$pqrs->tipoSolicitud;
        $data['created_at']=$pqrs->created_at;
        $data['id']=$pqrs->id;

        $data['respuestaFinal']=$pqrs->respuestaFinal;



        $html = view('pdf.generar',$data)->render();

        $namefile = 'detallePQRS_'.time().'.pdf';

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
           'default_font' => 'arial',
            "format" => "A4",

        ]);
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        // dd($mpdf);


            $mpdf->Output($namefile,"D");

    }
}