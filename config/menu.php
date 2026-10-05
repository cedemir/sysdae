<?php

/*
|--------------------------------------------------------------------------
| Menu lateral do sistema
|--------------------------------------------------------------------------
|
| Cada grupo vira uma seção recolhível no menu. Em cada item:
|   - route:  nome da rota do link
|   - active: padrão de nome de rota que marca o item como ativo
|   - icon:   nome do ícone do Bootstrap Icons (https://icons.getbootstrap.com)
|
*/

return [
    [
        'title' => 'Cadastros',
        'icon' => 'bi-person-lines-fill',
        'items' => [
            ['label' => 'Alunos', 'route' => 'admin.alunos.index', 'active' => 'admin.alunos.*', 'icon' => 'bi-people'],
            ['label' => 'Alojamentos', 'route' => 'admin.alojamentos.index', 'active' => 'admin.alojamentos.*', 'icon' => 'bi-building'],
            ['label' => 'Apartamentos', 'route' => 'admin.apartamentos.index', 'active' => 'admin.apartamentos.*', 'icon' => 'bi-door-closed'],
            ['label' => 'Atendimentos', 'route' => 'admin.atendimentos.index', 'active' => 'admin.atendimentos.*', 'icon' => 'bi-chat-left-text'],
            ['label' => 'Matrículas', 'route' => 'admin.matriculas.index', 'active' => 'admin.matriculas.*', 'icon' => 'bi-card-checklist'],
            ['label' => 'Ocorrências', 'route' => 'admin.ocorrencias.index', 'active' => 'admin.ocorrencias.*', 'icon' => 'bi-exclamation-triangle'],
            ['label' => 'Atividades Orientadas', 'route' => 'admin.ocorrencias_atividades_orientadas.index', 'active' => 'admin.ocorrencias_atividades_orientadas.*', 'icon' => 'bi-clipboard-check'],
            ['label' => 'Residência Estudantil', 'route' => 'admin.residencias.index', 'active' => 'admin.residencias.*', 'icon' => 'bi-house-door'],
            ['label' => 'Faltas na Residência', 'route' => 'admin.residencia_faltas.index', 'active' => 'admin.residencia_faltas.*', 'icon' => 'bi-calendar-x'],
        ],
    ],
    [
        'title' => 'Relatórios',
        'icon' => 'bi-bar-chart-line',
        'items' => [
            ['label' => 'Usuários', 'route' => 'users.index', 'active' => 'users.*', 'icon' => 'bi-person-badge'],
            ['label' => 'Total de Residentes', 'route' => 'residentes.index', 'active' => 'residentes.*', 'icon' => 'bi-house'],
            ['label' => 'Total de Semirresidentes', 'route' => 'semirresidentes.index', 'active' => 'semirresidentes.*', 'icon' => 'bi-house-dash'],
            ['label' => 'Ocorrências', 'route' => 'ocorrencias.index', 'active' => 'ocorrencias.*', 'icon' => 'bi-file-earmark-text'],
        ],
    ],
    [
        'title' => 'Cadastros Gerais',
        'icon' => 'bi-gear',
        'items' => [
            ['label' => 'Cursos', 'route' => 'admin.cursos.index', 'active' => 'admin.cursos.*', 'icon' => 'bi-mortarboard'],
            ['label' => 'Formas de Atendimento', 'route' => 'admin.forma_atendimentos.index', 'active' => 'admin.forma_atendimentos.*', 'icon' => 'bi-ui-checks'],
            ['label' => 'Programa de Benefício', 'route' => 'admin.programa_beneficios.index', 'active' => 'admin.programa_beneficios.*', 'icon' => 'bi-gift'],
            ['label' => 'Regime de Residência', 'route' => 'admin.regime_residencias.index', 'active' => 'admin.regime_residencias.*', 'icon' => 'bi-diagram-3'],
            ['label' => 'Séries', 'route' => 'admin.series.index', 'active' => 'admin.series.*', 'icon' => 'bi-list-ol'],
            ['label' => 'Setores', 'route' => 'admin.setores.index', 'active' => 'admin.setores.*', 'icon' => 'bi-diagram-2'],
            ['label' => 'Situação dos Alunos', 'route' => 'admin.situacao_alunos.index', 'active' => 'admin.situacao_alunos.*', 'icon' => 'bi-person-check'],
            ['label' => 'Turmas', 'route' => 'admin.turmas.index', 'active' => 'admin.turmas.*', 'icon' => 'bi-collection'],
        ],
    ],
    [
        'title' => 'Minha Conta',
        'icon' => 'bi-person-circle',
        'items' => [
            ['label' => 'Alterar Senha', 'route' => 'admin.senha.edit', 'active' => 'admin.senha.*', 'icon' => 'bi-key'],
        ],
    ],
];
