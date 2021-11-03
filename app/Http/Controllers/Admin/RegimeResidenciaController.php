<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regime_residencia;
use App\Http\Requests\Regime_residenciaRequest;
class RegimeResidenciaController extends Controller
{
    public function show($regime_residencia){
        return 'regime_residencia: '  . $regime_residencia;
    }

    public function index(){
        $regime_residencias= Regime_residencia::paginate(10); 
        
        return view('admin.regime_residencias.index', compact('regime_residencias'));
    }

    public function create(){
        
        return view('admin.regime_residencias.create');

    }

    public function store(Regime_residenciaRequest $request){
       
        $regime_residencia=request()->all();
        
        regime_residencia::create($regime_residencia);
        return redirect()->route('admin.regime_residencias.index');
        //return redirect()->to('/admin/regime_residencias');
    }

    public function edit($regime_residencia){

        $regime_residencia=regime_residencia::findOrFail($regime_residencia);

        return view('admin.regime_residencias.edit',compact('regime_residencia'));

    }

    public function update($regime_residencia){
        $regime_residencia = regime_residencia::findOrFail($regime_residencia);
        $regime_residencia->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.regime_residencias.index');

    }

    public function destroy($regime_residencia){
        $regime_residencia= regime_residencia::findOrFail($regime_residencia);
        $regime_residencia->delete();
        return redirect()->route('admin.regime_residencias.index');
    }
}
