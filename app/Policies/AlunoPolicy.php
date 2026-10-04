<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlunoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //


    }

    public function update($user, $aluno){
        //dd($user->id, $aluno->id);
        return $user->id ===$aluno->id;
    }
}
