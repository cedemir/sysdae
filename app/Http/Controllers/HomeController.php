<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Foto;


class HomeController extends Controller
{
    private $aluno;
    private $foto;
    public function __construct(Aluno $aluno, Foto $foto)
    {
        $this->aluno=$aluno;
        $this->foto=$foto;
    }
    public function index(){

    
    $alunos=$this->aluno
    ->orderBy('nome','ASC');
  
    //$alunos =$this->aluno->paginate(12);

    if ($query = request()->query('s'))
    {
        //SELECT * FROM `aluno` WHERE `nome` LIKE '%cedemir%' 
        $alunos->where('nome', 'LIKE', '%' . $query . '%');
        //dd($alunos);
    }
    
    $alunos =$alunos->paginate(12);


    return view('home',compact ('alunos'));

}

    public function show($slug){
    //$fotos=Foto::all();
    $fotos=$this->foto
    ->orderBy('id');
    $fotos =$fotos->paginate();
    $data=$this->aluno->whereSlug($slug)->first();
    //$data= Aluno::whereSlug($slug)->first(); // select aluno.nome where slug
    return view('aluno', compact('data','fotos'));
    }
}
