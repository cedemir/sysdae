<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Http\Requests\CursoRequest;
class CursoController extends Controller
{
    public function index(){
        $cursos=Curso::paginate(10); 
        
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create(){
       
        return view('admin.cursos.create');

    }

    public function store(CursoRequest $request){
        $curso=request()->all();
        //$curso['slug']=Str::slug($curso['cpf']);
        Curso::create($curso);
        return redirect()->route('admin.cursos.index');
       
    }

    public function edit($curso){    

        $curso=Curso::findOrFail($curso);

        return view('admin.cursos.edit',compact('curso'));

    }

    public function update($curso, CursoRequest $request){
        $curso = Curso::findOrFail($curso);
        $curso->update(request()->all());
        //return redirect()->back();
        return redirect()->route('admin.cursos.index');

    }

    public function destroy($curso){
        $curso = Curso::findOrFail($curso);
        $curso->delete();
        return redirect()->route('admin.cursos.index');
    }

    public function show($curso)
    {
        return "curso " . $curso;
    }

}
