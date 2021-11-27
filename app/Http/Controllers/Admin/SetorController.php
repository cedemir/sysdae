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

    public function edit($setores){    

        $setor=setor::findOrFail($setores);

        return view('admin.setores.edit',compact('setores'));

    }

    public function update($setores, SetorRequest $request){
        $setores = Setor::findOrFail($setores);
        $setores->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.setores.index');

    }

    public function destroy($setores){
        $setores = Setor::findOrFail($setores);
        $setores->delete();
        return redirect()->route('admin.setores.index');
    }

    public function show($setores)
    {
        return "setor " . $setores;
    }

}
