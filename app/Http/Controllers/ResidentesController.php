<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residentes;
use PDF;


class ResidentesController extends Controller
{
    public function index(Request $request)
    {
        $residentes = Residentes::all();
  
        if($request->has('download'))
        {
            $pdf = PDF::loadView('residentes.index',compact('residentes'));
            return $pdf->download('residentes.pdf');
        }

        return view('residentes.index',compact('residentes'));
    }
}
