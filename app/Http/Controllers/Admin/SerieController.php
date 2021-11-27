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
        $series=Serie::paginate(10); 
        
        return view('admin.series.index', compact('series'));
    }

    public function create(){
       
        return view('admin.series.create');

    }

    public function store(SerieRequest $request){
        $series=request()->all();
        //$serie['slug']=Str::slug($serie['cpf']);
        Serie::create($series);
        return redirect()->route('admin.series.index');
       
    }

    public function edit($series){    

        $serie=Serie::findOrFail($series);

        return view('admin.series.edit',compact('series'));

    }

    public function update($series, SerieRequest $request){
        $series = Serie::findOrFail($series);
        $series->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.series.index');

    }

    public function destroy($series){
        $series = Serie::findOrFail($series);
        $series->delete();
        return redirect()->route('admin.series.index');
    }

    public function show($series)
    {
        return "Serie " . $series;
    }

}
