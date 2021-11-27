<?php

namespace App\Http\Controllers\Admin;
use App\Models\Aluno;
use App\Models\ResidenciaFaltas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResidenciaFaltasRequest;


class ResidenciaFaltasController extends Controller
{
    public function index(){
        //$this->authorize('admin.residencia_faltas.index');
        /*
        if(!Gate::allows('access-index-geral')){
          return dd('Nao tenho permissao');
        } */
        $residencia_faltas= ResidenciaFaltas::paginate(10); 
        
        return view('admin.residencia_faltas.index', compact('residencia_faltas'));
    }

    public function create(){
        //$this->authorize('admin.residencia_faltas.create');
        $alunos=Aluno::all();
        
        return view('admin.residencia_faltas.create', compact('alunos'));

    }

    public function store(ResidenciaFaltasRequest $request){
        //$this->authorize('admin.residencia_faltas.store');
        $residencia_faltas=request()->all();
        //$residencia['slug']=Str::slug($residencia['cpf']);
        ResidenciaFaltas::create($residencia_faltas);
        return redirect()->route('admin.residencia_faltas.index');
       
    }

    public function edit($residencia_faltas){
        $alunos=Aluno::all();
        $residencia_faltas=ResidenciaFaltas::findOrFail($residencia_faltas);
        //$this->authorize('update',$residencia);

        return view('admin.residencia_faltas.edit',compact('residencia_faltas','alunos'));

    }

    public function update($residencia_faltas, ResidenciaFaltasRequest $request){
        $residencia_faltas = ResidenciaFaltas::findOrFail($residencia_faltas);
        $residencia_faltas->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.residencia_faltas.index');

    }

    public function destroy($residencia_faltas){
        $residencia_faltas = ResidenciaFaltas::findOrFail($residencia_faltas);
        $residencia_faltas->delete();
        return redirect()->route('admin.residencia_faltas.index');
    }

    public function show($residencia_faltas)
    {
        return "Faltas na Residencia " . $residencia_faltas;
    }
}