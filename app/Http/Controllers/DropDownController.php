<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Aluno;
use App\Http\Requests\MatriculaRequest;

class DropDownController extends Controller
{
     public function dropDownShow(MatriculaRequest $request)
    {
    
       $alunos = Aluno::pluck('nome', 'id');
       $selectedID = 2;
       return view('admin.matriculas.edit', compact('id', 'alunos','selectedID'));
    
    }
}
