<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setor;
use App\Http\Requests\SetorRequest;

class SetorController extends Controller
{
    public function index(){
        $setores=Setor::paginate(10); 
        
        return view('admin.setores.index', compact('setores'));
    }

    public function create(){
       
        return view('admin.setores.create');

    }

    public function store(SetorRequest $request){
        $setores=request()->all();
        //$setor['slug']=Str::slug($setor['cpf']);
        setor::create($setores);
        return redirect()->route('admin.setores.index');
       
    }

    public function edit($setor){    

        $setor=setor::findOrFail($setor);

        return view('admin.setores.edit',compact('setor'));

    }

    public function update($setor, SetorRequest $request){
        $setor = Setor::findOrFail($setor);
        $setor->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.setores.index');

    }

    public function destroy($setor){
        $setor = Setor::findOrFail($setor);
        $setor->delete();
        return redirect()->route('admin.setores.index');
    }

    public function show($setores)
    {
        return "setor " . $setores;
    }

}
