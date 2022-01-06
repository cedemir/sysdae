<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ocorrencias_atividades_orientadas;
use App\Models\Ocorrencia;
use App\Models\Setor;
use App\Http\Requests\OcorrenciasAtividadesOrientadasRequest;
use App\Models\Aluno;

class Ocorrencias_atividades_orientadasController extends Controller
{
   

    public function index(){
        $ocorrencias_atividades_orientadas= Ocorrencias_atividades_orientadas::paginate(10); 
        
        return view('admin.ocorrencias_atividades_orientadas.index', compact('ocorrencias_atividades_orientadas'));
    }

    public function create(){
        $ocorrencias=Ocorrencia::all();
        $setores=Setor::all();
        $alunos=Aluno::all();
        $users=Setor::all();


        return view('admin.ocorrencias_atividades_orientadas.create', compact('ocorrencias','setores','alunos','users'));

    }

    public function store(OcorrenciasAtividadesOrientadasRequest $request){
       
        $ocorrencias_atividades_orientadas=request()->all();
        
        Ocorrencias_atividades_orientadas::create($ocorrencias_atividades_orientadas);
        return redirect()->route('admin.ocorrencias_atividades_orientadas.index');
        //return redirect()->to('/admin/ocorrencias_atividades_orientadas');
    }

    public function edit($ocorrencias_atividades_orientadas){
        $ocorrencias=Ocorrencia::all();
        $setores=Setor::all();
        $alunos=Aluno::all();
        $users=Setor::all();


        $ocorrencias_atividades_orientadas=Ocorrencias_atividades_orientadas::findOrFail($ocorrencias_atividades_orientadas);

        return view('admin.ocorrencias_atividades_orientadas.edit',
        compact('ocorrencias_atividades_orientadas','ocorrencias','setores','alunos','users'));

    }

    public function update($ocorrencias_atividades_orientadas, OcorrenciasAtividadesOrientadasRequest $request){
        $ocorrencias_atividades_orientadas = Ocorrencias_atividades_orientadas::findOrFail($ocorrencias_atividades_orientadas);
        $ocorrencias_atividades_orientadas->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.ocorrencias_atividades_orientadas.index');

    }

    public function destroy($ocorrencias_atividades_orientadas){
        $ocorrencias_atividades_orientadas= ocorrencias_atividades_orientadas::findOrFail($ocorrencias_atividades_orientadas);
        $ocorrencias_atividades_orientadas->delete();
        return redirect()->route('admin.ocorrencias_atividades_orientadas.index');
    }

    public function show($ocorrencias_atividades_orientadas){
        return 'ocorrencia_atividades_orientadas: '  . $ocorrencias_atividades_orientadas;
    }
}
