<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Programa_beneficio;
use App\Models\Aluno;
use App\Models\Sexo;
use App\Models\Situacao_aluno;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class AlunoController extends Controller
{
    public function index(){
        //$this->authorize('admin.alunos.index');
        /*
        if(!Gate::allows('access-index-geral')){
          return dd('Nao tenho permissao');
        } */
        $alunos= Aluno::paginate(10); 
        
        return view('admin.alunos.index', compact('alunos'));
    }

    public function create(){
        //$this->authorize('admin.alunos.create');
        $sexos=Sexo::all();
        $situacao_alunos= Situacao_aluno::all(); 
        $programa_beneficios=Programa_beneficio::all();
        return view('admin.alunos.create', compact('situacao_alunos','programa_beneficios','sexos'));

    }

    public function store(AlunoRequest $request){
        //$this->authorize('admin.alunos.store');
        $aluno=request()->all();
        $aluno['slug']=Str::slug($aluno['cpf']);
        Aluno::create($aluno);
        return redirect()->route('admin.alunos.index');
       
    }

    public function edit($aluno){
        $sexos=Sexo::all();
        $situacao_alunos= Situacao_aluno::all(); 
        $programa_beneficios=Programa_beneficio::all();
          
        $aluno=Aluno::findOrFail($aluno);
        //$this->authorize('update',$aluno);

        return view('admin.alunos.edit',compact('aluno','situacao_alunos','programa_beneficios','sexos'));

    }

    public function update($aluno, AlunoRequest $request){
        $aluno = Aluno::findOrFail($aluno);
        $aluno->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.alunos.index');

    }

    public function destroy($aluno){
        $aluno = Aluno::findOrFail($aluno);
        $aluno->delete();
        return redirect()->route('admin.alunos.index');
    }

    public function show($aluno)
    {
        return "Aluno " . $aluno;
    }
}

