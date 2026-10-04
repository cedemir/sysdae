<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::latest()->paginate(5);
  
        if($request->has('download'))
        {
            $pdf = PDF::loadView('users.index',compact('user'));
            return $pdf->download('pdfview.pdf');
        }

        return view('users.index',compact('user'));
    }
}
