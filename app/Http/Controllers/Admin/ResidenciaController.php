<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Regime_residencia;
use App\Models\Residencia;
use App\Models\Aluno;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResidenciaRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class ResidenciaController extends Controller
{
    public function index(){
        //$this->authorize('admin.residencias.index');
        /*
        if(!Gate::allows('access-index-geral')){
          return dd('Nao tenho permissao');
        } */
        $residencias= Residencia::paginate(10); 
        
        return view('admin.residencias.index', compact('residencias'));
    }

    public function create(){
        //$this->authorize('admin.residencias.create');
        $alunos=Aluno::all();
        $regime_residencias=Regime_residencia::all();
        return view('admin.residencias.create', compact('regime_residencias','alunos'));

    }

    public function store(ResidenciaRequest $request){
        //$this->authorize('admin.residencias.store');
        $residencia=request()->all();
        //$residencia['slug']=Str::slug($residencia['cpf']);
        Residencia::create($residencia);
        return redirect()->route('admin.residencias.index');
       
    }

    public function edit($residencia){

        
        $regime_residencias=Regime_residencia::all();
        $alunos=Aluno::all();
        $residencia=Residencia::findOrFail($residencia);
        //$this->authorize('update',$residencia);

        return view('admin.residencias.edit',compact('regime_residencias','residencia','alunos'));

    }

    public function update($residencia, ResidenciaRequest $request){
        $residencia = Residencia::findOrFail($residencia);
        $residencia->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.residencias.index');

    }

    public function destroy($residencia){
        $residencia = Residencia::findOrFail($residencia);
        $residencia->delete();
        return redirect()->route('admin.residencias.index');
    }

    public function show($residencia)
    {
        return "residencia " . $residencia;
    }
}

