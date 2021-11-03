<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Atendimento;
use App\Models\Forma_atendimento;
use App\Http\Requests\AtendimentoRequest;
class AtendimentoController extends Controller
{
    public function index(){
        $atendimentos= Atendimento::paginate(10); 
        
        return view('admin.atendimentos.index', compact('atendimentos'));
    }

    public function create(){
        $forma_atendimentos= Forma_atendimento::all(); 
        
        return view('admin.atendimentos.create', compact('forma_atendimentos'));

    }

    public function store(AtendimentoRequest $request){
        $atendimento=request()->all();
        //dd($atendimento);
        //$atendimento['slug']=Str::slug($atendimento['cpf']);
        Atendimento::create($atendimento);
        return redirect()->route('admin.atendimentos.index');
       
    }

    public function edit($atendimento){

        $forma_atendimentos= Forma_atendimento::all(); 
        

        $atendimento=Atendimento::findOrFail($atendimento);


        return view('admin.atendimentos.edit',compact('atendimento','forma_atendimentos'));

    }

    public function update($atendimento,AtendimentoRequest $request){
        $atendimento = Atendimento::findOrFail($atendimento);
        
        $atendimento->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.atendimentos.index');

    }

    public function destroy($atendimento){
        $atendimento = Atendimento::findOrFail($atendimento);
        $atendimento->delete();
        return redirect()->route('admin.atendimentos.index');
    }
}
