<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Situacao_aluno;
use App\Http\Requests\Situacao_alunoRequest;


class SituacaoAlunoController extends Controller
{
    public function index(){
        $situacao_alunos=Situacao_aluno::paginate(10); 
        
        return view('admin.situacao_alunos.index', compact('situacao_alunos'));
    }

    public function create(){
       
        return view('admin.situacao_alunos.create');

    }

    public function store(Situacao_alunoRequest $request){
        $situacao_alunos=request()->all();
        Situacao_aluno::create($situacao_alunos);
        return redirect()->route('admin.situacao_alunos.index');
       
    }

    public function edit($situacao_aluno){    

        $situacao_aluno=situacao_aluno::findOrFail($situacao_aluno);

        return view('admin.situacao_alunos.edit',compact('situacao_aluno'));

    }

    public function update($situacao_aluno, Situacao_alunoRequest $request){
        $situacao_aluno = situacao_aluno::findOrFail($situacao_aluno);
        $situacao_aluno->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.situacao_alunos.index');

    }

    public function destroy($situacao_aluno){
        $situacao_aluno = Situacao_aluno::findOrFail($situacao_aluno);
        $situacao_aluno->delete();
        return redirect()->route('admin.situacao_alunos.index');
    }

    public function show($situacao_aluno)
    {
        return "situacao_aluno " . $situacao_aluno;
    }

}
