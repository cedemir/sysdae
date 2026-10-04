<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Http\Requests\TurmaRequest;

class TurmaController extends Controller
{
    public function index(){
        $turmas=Turma::paginate(10); 
        return view('admin.turmas.index', compact('turmas'));
    }

    public function create(){
       
        return view('admin.turmas.create');

    }

    public function store(TurmaRequest $request){
        $turmas=request()->all();
        Turma::create($turmas);
        return redirect()->route('admin.turmas.index');
       
    }

    public function edit($turma){    

        $turma=Turma::findOrFail($turma);
        return view('admin.turmas.edit',compact('turma'));

    }

    public function update($turma, TurmaRequest $request){

        $turma = Turma::findOrFail($turma);
        $turma->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.turmas.index');

    }

    public function destroy($turma){
        $turma = Turma::findOrFail($turma);
        $turma->delete();
        return redirect()->route('admin.turmas.index');
    }

    public function show($turma)
    {
        return "turma " . $turma;
    }

}
