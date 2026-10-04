<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartamento;
use App\Models\Alojamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApartamentoRequest;


class ApartamentoController extends Controller
{
    public function index(){
        
        $apartamentos= Apartamento::paginate(10); 
        
        return view('admin.apartamentos.index', compact('apartamentos'));
    }

    public function create(){
        $apartamentos= Apartamento::all(); 
        $alojamentos= Alojamento::all(); 
        
        return view('admin.apartamentos.create', compact('apartamentos','alojamentos'));

    }

    public function store(ApartamentoRequest $request){
        $apartamento=request()->all();
        Apartamento::create($apartamento);
        return redirect()->route('admin.apartamentos.index');
        //return redirect()->to('/admin/apartamentos');
    }

    public function edit($apartamento){

        
        $alojamentos= Alojamento::all();
        $apartamento=Apartamento::findOrFail($apartamento);


        return view('admin.apartamentos.edit',compact('apartamento','alojamentos'));

    }

    public function update($apartamento,ApartamentoRequest $request){
        $apartamento = Apartamento::findOrFail($apartamento);
        $apartamento->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.apartamentos.index');

    }

    public function destroy($apartamento){
        $apartamento= Apartamento::findOrFail($apartamento);
        $apartamento->delete();
        return redirect()->route('admin.apartamentos.index');
    }
}
