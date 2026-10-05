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
use Illuminate\Support\Facades\Storage;

class AlunoController extends Controller
{
    public function index(){
        //$this->authorize('admin.alunos.index');
        /*
        if(!Gate::allows('access-index-geral')){
          return dd('Nao tenho permissao');
        } */
        $alunos= Aluno::with('foto')->paginate(10); 
        
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
        $aluno=$request->all();
        $this->validate($request, [
            'cpf' => 'required|cpf',
            
        ]);
        $aluno['slug']=Str::slug($aluno['cpf']);
        $aluno=Aluno::create($aluno);
        $this->salvarFoto($aluno, $request);
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
        $aluno->update($request->all());
        $this->salvarFoto($aluno, $request);
        //return redirect()->back();
        return redirect()->route('admin.alunos.index');

    }

    public function destroy($aluno){
        $aluno = Aluno::findOrFail($aluno);
        Storage::disk('public')->delete($aluno->fotos->pluck('foto')->all());
        $aluno->delete();
        return redirect()->route('admin.alunos.index');
    }

    // Grava a foto enviada no formulário, substituindo a anterior do aluno
    private function salvarFoto(Aluno $aluno, Request $request)
    {
        if (!$request->hasFile('foto')) {
            return;
        }

        $antigas = $aluno->fotos;
        $aluno->fotos()->create(['foto' => $request->file('foto')->store('alunos', 'public')]);

        Storage::disk('public')->delete($antigas->pluck('foto')->all());
        $aluno->fotos()->whereIn('id', $antigas->pluck('id'))->delete();
    }

    public function show($aluno)
    {
        return "Aluno " . $aluno;
    }
}

