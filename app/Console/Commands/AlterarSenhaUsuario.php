<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AlterarSenhaUsuario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:senha {email : E-mail do usuário}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Altera a senha de um usuário existente';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (!$user) {
            $this->error('Usuário não encontrado: '.$this->argument('email'));
            return 1;
        }

        $senha = $this->secret('Nova senha');
        $confirmacao = $this->secret('Confirme a nova senha');

        // Mesma regra de senha usada no RegisterController
        $validator = Validator::make(
            ['password' => $senha, 'password_confirmation' => $confirmacao],
            ['password' => ['required', 'string', 'min:8', 'confirmed']]
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $erro) {
                $this->error($erro);
            }
            return 1;
        }

        $user->password = Hash::make($senha);
        $user->setRememberToken(null);
        $user->save();

        $this->info("Senha alterada para {$user->name} <{$user->email}>.");
        return 0;
    }
}
