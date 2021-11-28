<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\Manager\ResourceController;
use App\Http\Controllers\Manager\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rotas para a Home e Single do site de Alunos

Route::get('/', [\App\Http\Controllers\HomeController::class,'index']);

Route::get('/alunos/{slug}', [\App\Http\Controllers\HomeController::class,'show'])->name('aluno.single');

Route::get('/view-test', fn()=>view('test.index'));



Route::get('/queries/{alunos}', function ($alunos) {
    //$alunos= \App\Models\Aluno::all(); //select * from alunos;
    //$alunos= \App\Models\Aluno::where ('id',1)->first(); //select * from alunos where id=1;
    $alunos= \App\Models\Aluno::find($alunos); //select * from alunos where alunos = $alunos;
    return $alunos;


});

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function(){
    /*
    Route::prefix('/alunos')->name('alunos.')->group(function(){
        Route::get('/', [\App\Http\Controllers\Admin\AlunoController::class,'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\AlunoController::class,'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Admin\AlunoController::class,'store'])->name('store');
        Route::get('/{aluno}/edit', [\App\Http\Controllers\Admin\AlunoController::class,'edit'])->name('edit');
        Route::get('/update/{aluno}', [\App\Http\Controllers\Admin\AlunoController::class,'update'])->name('update');
        Route::get('/destroy/{aluno}', [\App\Http\Controllers\Admin\AlunoController::class,'destroy'])->name('destroy');
      
        
    }); */

    Route::resource('alunos', \App\Http\Controllers\Admin\AlunoController::class);
    Route::resource('alojamentos', \App\Http\Controllers\Admin\AlojamentoController::class);
    Route::resource('apartamentos', \App\Http\Controllers\Admin\ApartamentoController::class);
    Route::resource('apartamentos', \App\Http\Controllers\Admin\ApartamentoController::class);
    Route::resource('atendimentos', \App\Http\Controllers\Admin\AtendimentoController::class);
    Route::resource('cursos', \App\Http\Controllers\Admin\CursoController::class);
    Route::resource('forma_atendimentos', \App\Http\Controllers\Admin\Forma_atendimentoController::class);
    Route::resource('alunos.fotos', \App\Http\Controllers\Admin\AlunoFotoController::class);
    Route::resource('matriculas', \App\Http\Controllers\Admin\MatriculaController::class);
    Route::resource('medidas_disciplinares', \App\Http\Controllers\Admin\Medidas_disciplinaresController::class);
    Route::resource('ocorrencias', \App\Http\Controllers\Admin\OcorrenciaController::class);
    Route::resource('ocorrencias_atividades_orientadas', \App\Http\Controllers\Admin\Ocorrencias_atividades_orientadasController::class);
    Route::resource('programa_beneficios', \App\Http\Controllers\Admin\ProgramaBeneficioController::class);
    Route::resource('regime_residencias', \App\Http\Controllers\Admin\RegimeResidenciaController::class);
    Route::resource('residencias', \App\Http\Controllers\Admin\ResidenciaController::class);
    Route::resource('residencia_autorizacoes', \App\Http\Controllers\Admin\ResidenciaAutorizacoesController::class);
    Route::resource('residencia_faltas', \App\Http\Controllers\Admin\ResidenciaFaltasController::class);
    Route::resource('series', \App\Http\Controllers\Admin\SerieController::class);
    Route::resource('setores', \App\Http\Controllers\Admin\SetorController::class);
    Route::resource('situacao_alunos', \App\Http\Controllers\Admin\SituacaoAlunoController::class);
    Route::resource('turmas', \App\Http\Controllers\Admin\TurmaController::class);
    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth', 'prefix' => 'manager'], function(){
	Route::get('/', function(){
		return redirect()->route('users.index');
	});

	Route::resource('roles', RoleController::class);
	Route::get('roles/{role}/resources', [RoleController::class,'syncResources'])->name('roles.resources');
	Route::put('roles/{role}/resources', [RoleController::class,'updateSyncResources'])->name('roles.resources.update');

	Route::resource('users',UserController::class);
	Route::resource('resources',ResourceController::class);
});