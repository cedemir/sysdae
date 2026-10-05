Sistema de Informações para o DAE - Campus Sertão

## Tecnologias

### Back-end

- **PHP** 7.3 ou 8.x
- **Laravel 8**: rotas, controllers, models (Eloquent), validação e migrações
- **MySQL 8.0**: banco de dados

### Front-end

- **Blade**: templates das telas (arquivos `.blade.php`)
- **Bootstrap 4**: layout e componentes visuais
- **Bootstrap Icons**: ícones do menu (carregados via CDN no layout)
- **jQuery**: usado pelo Bootstrap 4 nos dropdowns e menus recolhíveis
- **Laravel Mix** (com Sass): compila o CSS e o JavaScript em `public/css/app.css` e `public/js/app.js`
- **Inputmask**: máscaras de campos
- **Livewire 2**: componentes interativos

### Bibliotecas do Laravel

| Biblioteca | Uso |
|---|---|
| `laravel/ui` | Telas de login, cadastro e recuperação de senha |
| `barryvdh/laravel-dompdf` | Geração dos relatórios em PDF |
| `geekcom/validator-docs` | Validação de CPF |
| `laravelcollective/html` | Montagem de formulários |
| `laracasts/flash` | Mensagens de aviso após ações |
| `spatie/laravel-permission` | Instalada, mas não utilizada (o controle de acesso do sistema é próprio) |

### Recursos do Laravel utilizados

- **Comando Artisan** `php artisan usuario:senha {email}`: altera a senha de um usuário pelo terminal
- **Armazenamento de arquivos** (`storage/app/public/alunos`): fotos dos alunos. Em uma instalação nova, rode `php artisan storage:link` uma vez para que as fotos fiquem acessíveis pelo navegador
- **Regra de validação** `current_password`: confirma a senha atual na tela "Alterar senha"
