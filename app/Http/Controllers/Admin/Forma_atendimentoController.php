<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forma_atendimento;
use App\Http\Requests\Forma_atendimentoRequest;
class Forma_atendimentoController extends Controller
{
    public function index(){
        $forma_atendimentos=forma_atendimento::paginate(10); 
        
        return view('admin.forma_atendimentos.index', compact('forma_atendimentos'));
    }

    public function create(){
       
        return view('admin.forma_atendimentos.create');

    }

    public function store(Forma_atendimentoRequest $request){
        $forma_atendimento=request()->all();
        //$forma_atendimento['slug']=Str::slug($forma_atendimento['cpf']);
        forma_atendimento::create($forma_atendimento);
        return redirect()->route('admin.forma_atendimentos.index');
       
    }

    public function edit($forma_atendimento){    

        $forma_atendimento=forma_atendimento::findOrFail($forma_atendimento);

        return view('admin.forma_atendimentos.edit',compact('forma_atendimento'));

    }

    public function update($forma_atendimento, Forma_atendimentoRequest $request){
        $forma_atendimento = forma_atendimento::findOrFail($forma_atendimento);
        $forma_atendimento->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.forma_atendimentos.index');

    }

    public function destroy($forma_atendimento){
        $forma_atendimento = forma_atendimento::findOrFail($forma_atendimento);
        $forma_atendimento->delete();
        return redirect()->route('admin.forma_atendimentos.index');
    }

    public function show($forma_atendimento)
    {
        return "Forma de Atendimento " . $forma_atendimento;
    }

}
