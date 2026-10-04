Route::middleware('access.control.list')->prefix('/admin')->name('admin.')->group(function(){
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
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
   
   
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
