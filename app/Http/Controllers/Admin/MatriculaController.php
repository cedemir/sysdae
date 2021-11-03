<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Serie;
use App\Models\Turma;
use App\Models\Curso;
use App\Http\Controllers\Controller;
use App\Http\Requests\MatriculaRequest;
use Illuminate\Support\Str;

class MatriculaController extends Controller
{
    public function index(){
        //$alunos= Aluno::paginate(10);
        $matriculas= Matricula::paginate(10);
        
        return view('admin.matriculas.index', compact('matriculas'));
    }

   

    public function create(){
        $alunos= Aluno::all(); 
        $series=Serie::all();
        $turmas=Turma::all();
        $cursos=Curso::all();

        return view('admin.matriculas.create', compact('alunos','series','turmas','cursos'));

    }

    public function store(MatriculaRequest $request){
        $matricula=request()->all();
        Matricula::create($matricula);
        return redirect()->route('admin.matriculas.index');
       
    }

    public function edit($matricula){

        $alunos= Aluno::all(); 
        $series=Serie::all();
        $turmas=Turma::all();
        $cursos=Curso::all();
        $matricula=Matricula::findOrFail($matricula);


        return view('admin.matriculas.edit',compact('matricula','alunos','series','turmas','cursos'));

    }

    public function update($matricula, MatriculaRequest $request){
        $matricula = Matricula::findOrFail($matricula);
        $matricula->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.matriculas.index');

    }

    public function destroy($matricula){
        $matricula = Matricula::findOrFail($matricula);
        $matricula->delete();
        return redirect()->route('admin.matriculas.index');
    }

    public function show($matricula)
    {
        return "matricula " . $matricula;
    }
}

