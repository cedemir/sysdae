<?php
namespace App\Http\Controllers\Admin;
//namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Residentes;
use PDF;

class ResidentesController extends Controller
{
    public function showResidentes(){
        $residentes = Residentes::all();
        return view('admin.consultas.residentes.index', compact('residentes'));
    }

    public function createPDF() {
        $data = Residentes::all();

      
      //view()->share('residentes',$data);
      $pdf = PDF::loadView('admin.consultas.residentes.index', $data);

      
      return $pdf->download('residentes.pdf');

    }
      
      

    }
      
