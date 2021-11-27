<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Http\Requests\SerieRequest;
class SerieController extends Controller
{
    public function index(){
        $serie=Serie::paginate(10); 
        
        return view('admin.series.index', compact('serie'));
    }

    public function create(){
       
        return view('admin.series.create');

    }

    public function store(SerieRequest $request){
        $serie=request()->all();
        //$serie['slug']=Str::slug($serie['cpf']);
        Serie::create($serie);
        return redirect()->route('admin.series.index');
       
    }

    public function edit($serie){    

        $serie=Serie::findOrFail($serie);

        return view('admin.series.edit',compact('serie'));

    }

    public function update($serie, SerieRequest $request){
        $serie = serie::findOrFail($serie);
        $serie->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.series.index');

    }

    public function destroy($serie){
        $serie = Serie::findOrFail($serie);
        $serie->delete();
        return redirect()->route('admin.series.index');
    }

    public function show($serie)
    {
        return "Serie " . $serie;
    }

}
