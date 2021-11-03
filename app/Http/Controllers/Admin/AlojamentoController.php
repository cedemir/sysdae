<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alojamento;
use App\Http\Requests\AlojamentoRequest;

class AlojamentoController extends Controller
{
    public function show($alojamento){
        return 'Alojamento: '  . $alojamento;
    }

    public function index(){
        $alojamentos= Alojamento::paginate(10); 
        
        return view('admin.alojamentos.index', compact('alojamentos'));
    }

    public function create(){
        
        return view('admin.alojamentos.create');

    }

    public function store(AlojamentoRequest $request){
       
        $alojamento=request()->all();
        
        Alojamento::create($alojamento);
        return redirect()->route('admin.alojamentos.index');
        //return redirect()->to('/admin/alojamentos');
    }

    public function edit($alojamento){

        $alojamento=Alojamento::findOrFail($alojamento);

        return view('admin.alojamentos.edit',compact('alojamento'));

    }

    public function update($alojamento){
        $alojamento = Alojamento::findOrFail($alojamento);
        $alojamento->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.alojamentos.index');

    }

    public function destroy($alojamento){
        $alojamento= Alojamento::findOrFail($alojamento);
        $alojamento->delete();
        return redirect()->route('admin.alojamentos.index');
    }
}



