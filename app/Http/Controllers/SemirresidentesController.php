<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semirresidentes;
use PDF;

class SemirresidentesController extends Controller
{
    public function index(Request $request)
    {
        $semirresidentes = Semirresidentes::all();
  
        if($request->has('download'))
        {
            $pdf = PDF::loadView('semirresidentes.index',compact('semirresidentes'));
            return $pdf->download('semirresidentes.pdf');
        }

        return view('semirresidentes.index',compact('semirresidentes'));
    }
}
