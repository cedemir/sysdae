<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programa_beneficio;
use App\Http\Requests\Programa_beneficioRequest;
class ProgramaBeneficioController extends Controller
{
    public function show($programa_beneficio){
        return 'programa_beneficio: '  . $programa_beneficio;
    }

    public function index(){
        $programa_beneficios= programa_beneficio::paginate(10); 
        
        return view('admin.programa_beneficios.index', compact('programa_beneficios'));
    }

    public function create(){
        
        return view('admin.programa_beneficios.create');

    }

    public function store(Programa_beneficioRequest $request){
       
        $programa_beneficio=request()->all();
        
        programa_beneficio::create($programa_beneficio);
        return redirect()->route('admin.programa_beneficios.index');
        //return redirect()->to('/admin/programa_beneficios');
    }

    public function edit($programa_beneficio){

        $programa_beneficio=programa_beneficio::findOrFail($programa_beneficio);

        return view('admin.programa_beneficios.edit',compact('programa_beneficio'));

    }

    public function update($programa_beneficio){
        $programa_beneficio = programa_beneficio::findOrFail($programa_beneficio);
        $programa_beneficio->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.programa_beneficios.index');

    }

    public function destroy($programa_beneficio){
        $programa_beneficio= programa_beneficio::findOrFail($programa_beneficio);
        $programa_beneficio->delete();
        return redirect()->route('admin.programa_beneficios.index');
    }
}
