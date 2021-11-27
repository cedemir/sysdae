<?php

namespace App\Http\Controllers\Admin;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResidenciaAutorizacoes;
use App\Models\Aluno;
use App\Http\Requests\ResidenciaAutorizacoesRequest;

class ResidenciaAutorizacoesController extends Controller
{
    public function index(){
        //$this->authorize('admin.alunos.index');
        /*
        if(!Gate::allows('access-index-geral')){
          return dd('Nao tenho permissao');
        } */
        $residencia_autorizacoes= ResidenciaAutorizacoes::paginate(10); 
        
        return view('admin.residencia_autorizacoes.index', compact('residencia_autorizacoes'));
    }

    public function create(){
        //$this->authorize('admin.alunos.create');
        $alunos= Aluno::all(); 
        
        return view('admin.residencia_autorizacoes.create', compact('alunos'));

    }

    public function store(ResidenciaAutorizacoesRequest $request){
        //$this->authorize('admin.alunos.store');
        $residencia_autorizacoes=request()->all();
        //$aluno['slug']=Str::slug($aluno['cpf']);
        ResidenciaAutorizacoes::create($residencia_autorizacoes);
        return redirect()->route('admin.residencia_autorizacoes.index');
       
    }

    public function edit($residencia_autorizacoes){

        $alunos= Aluno::all(); 
       
          
        $residencia_autorizacoes=ResidenciaAutorizacoes::findOrFail($residencia_autorizacoes);
        //$this->authorize('update',$residencia_autorizacoes);

        return view('admin.residencia_autorizacoes.edit',compact('residencia_autorizacoes','alunos'));

    }

    public function update($residencia_autorizacoes, ResidenciaAutorizacoesRequest $request){
        $residencia_autorizacoes = ResidenciaAutorizacoes::findOrFail($residencia_autorizacoes);
        $residencia_autorizacoes->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.residencia_autorizacoes.index');

    }

    public function destroy($residencia_autorizacoes){
        $residencia_autorizacoes = ResidenciaAutorizacoes::findOrFail($residencia_autorizacoes);
        $residencia_autorizacoes->delete();
        return redirect()->route('admin.residencia_autorizacoes.index');
    }

    public function show($residencia_autorizacoes)
    {
        return "Autorização da Residencia" . $residencia_autorizacoes;
    }
}
