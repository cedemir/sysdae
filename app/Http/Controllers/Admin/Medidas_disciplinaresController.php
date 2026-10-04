<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medidas_disciplinares;
use App\Http\Requests\Medidas_disciplinaresRequest;

class Medidas_disciplinaresController extends Controller
{
    public function index(){
        $medidas_disciplinares=medidas_disciplinares::paginate(10); 
        
        return view('admin.medidas_disciplinares.index', compact('medidas_disciplinares'));
    }

    public function create(){
       
        return view('admin.medidas_disciplinares.create');

    }

    public function store(Medidas_disciplinaresRequest $request){
        $medidas_disciplinares=request()->all();
        medidas_disciplinares::create($medidas_disciplinares);
        return redirect()->route('admin.medidas_disciplinares.index');
       
    }

    public function edit($medidas_disciplinares){    

        $medidas_disciplinares=medidas_disciplinares::findOrFail($medidas_disciplinares);

        return view('admin.medidas_disciplinares.edit',compact('medidas_disciplinares'));

    }

    public function update($medidas_disciplinares, medidas_disciplinaresRequest $request){
        $medidas_disciplinares = medidas_disciplinares::findOrFail($medidas_disciplinares);
        $medidas_disciplinares->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.medidas_disciplinares.index');

    }

    public function destroy($medidas_disciplinares){
        $medidas_disciplinares = medidas_disciplinares::findOrFail($medidas_disciplinares);
        $medidas_disciplinares->delete();
        return redirect()->route('admin.medidas_disciplinares.index');
    }

    public function show($medidas_disciplinares)
    {
        return "Medidas_disciplinares " . $medidas_disciplinares;
    }

}
