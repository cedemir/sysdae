<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Ocorrencia;
use App\Http\Requests\OcorrenciaRequest;

class OcorrenciaController extends Controller
{
    public function show($ocorrencia){
        return 'Ocorrencia: '  . $ocorrencia;
    }

    public function index(){
        $ocorrencias= Ocorrencia::paginate(10); 
        
        return view('admin.ocorrencias.index', compact('ocorrencias'));
    }

    public function create(){
        
        return view('admin.ocorrencias.create');

    }

    public function store(ocorrenciaRequest $request){
       
        $ocorrencia=request()->all();
        
        ocorrencia::create($ocorrencia);
        return redirect()->route('admin.ocorrencias.index');
        //return redirect()->to('/admin/ocorrencias');
    }

    public function edit($ocorrencia){

        $ocorrencia=Ocorrencia::findOrFail($ocorrencia);

        return view('admin.ocorrencias.edit',compact('ocorrencia'));

    }

    public function update($ocorrencia){
        $ocorrencia = Ocorrencia::findOrFail($ocorrencia);
        $ocorrencia->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.ocorrencias.index');

    }

    public function destroy($ocorrencia){
        $ocorrencia= Ocorrencia::findOrFail($ocorrencia);
        $ocorrencia->delete();
        return redirect()->route('admin.ocorrencias.index');
    }
}
