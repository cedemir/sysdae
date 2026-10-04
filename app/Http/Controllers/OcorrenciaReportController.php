<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencia;
use PDF;



class OcorrenciaReportController extends Controller
{
    public function index(Request $request)
{
    $ocorrencias = Ocorrencia::latest()->paginate(5);

    if($request->has('download'))
    {
        $pdf = PDF::loadView('ocorrencias.index',compact('ocorrencias'));
        return $pdf->download('pdfview.pdf');
    }

    return view('ocorrencias.index',compact('ocorrencias'));
}

}
