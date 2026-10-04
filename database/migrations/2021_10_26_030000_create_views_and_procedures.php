<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewsAndProcedures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW `residentes` AS
            SELECT COUNT(`aluno`.`id`) AS `TotalResidentes`
            FROM `aluno`
            JOIN `residencia` ON `residencia`.`aluno_id` = `aluno`.`id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
                AND `regimes_residencia`.`descricao_regime` = 'Residente'");

        DB::statement("CREATE OR REPLACE VIEW `semirresidentes` AS
            SELECT COUNT(`aluno`.`id`) AS `TotalSemiResidentes`
            FROM `aluno`
            JOIN `residencia` ON `residencia`.`aluno_id` = `aluno`.`id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
                AND `regimes_residencia`.`descricao_regime` = 'Semirresidente'");

        DB::statement("CREATE OR REPLACE VIEW `semirresidentes5` AS
            SELECT `sexo`.`sexo` AS `sexo`, `aluno`.`email` AS `email`, `aluno`.`nome` AS `nome`
            FROM `aluno`
            JOIN `residencia` ON `residencia`.`aluno_id` = `aluno`.`id`
            JOIN `sexo` ON `aluno`.`sexo_id` = `sexo`.`id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
                AND `regimes_residencia`.`descricao_regime` = 'Semirresidente'");

        DB::statement("CREATE OR REPLACE VIEW `semirresidentes8` AS
            SELECT DISTINCT `aluno`.`id` AS `id`, `aluno`.`sexo_id` AS `sexo_id`, `aluno`.`email` AS `email`, `aluno`.`nome` AS `nome`
            FROM `aluno`
            JOIN `residencia` ON `residencia`.`aluno_id` = `aluno`.`id`
            JOIN `sexo` ON `aluno`.`sexo_id` = `sexo`.`id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
                AND `regimes_residencia`.`descricao_regime` = 'Semirresidente'");

        DB::statement("CREATE OR REPLACE VIEW `semirresidentes9` AS
            SELECT `aluno`.`sexo_id` AS `sexo_id`, `aluno`.`email` AS `email`, `aluno`.`nome` AS `nome`
            FROM `aluno`
            JOIN `residencia` ON `residencia`.`aluno_id` = `aluno`.`id`
            JOIN `sexo` ON `aluno`.`sexo_id` = `sexo`.`id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
                AND `regimes_residencia`.`descricao_regime` = 'Semirresidente'");

        DB::statement("CREATE OR REPLACE VIEW `semirresidentes_sexo` AS
            SELECT `sexo`.`sexo` AS `sexo`, `aluno`.`email` AS `email`, `aluno`.`nome` AS `nome`
            FROM `aluno`
            JOIN `residencia` ON `residencia`.`aluno_id` = `aluno`.`id`
            JOIN `sexo` ON `aluno`.`sexo_id` = `sexo`.`id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
                AND `regimes_residencia`.`descricao_regime` = 'Semirresidente'");

        DB::statement("CREATE OR REPLACE VIEW `totalApto` AS
            SELECT `residencia`.`apto` AS `apto`, COUNT(`residencia`.`apto`) AS `totalApto`
            FROM `residencia`
            JOIN `aluno` ON `residencia`.`aluno_id` = `aluno`.`id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
            GROUP BY `residencia`.`apto`");

        DB::statement("CREATE OR REPLACE VIEW `totalCurso2021` AS
            SELECT `curso`.`descricao_curso` AS `descricao_curso`, COUNT(`matricula`.`curso_id`) AS `totalCurso`, `matricula`.`ano` AS `ano`
            FROM `matricula`
            JOIN `aluno` ON `matricula`.`aluno_id` = `aluno`.`id`
            JOIN `curso` ON `matricula`.`curso_id` = `curso`.`id`
            WHERE `matricula`.`ano` = 2021
            GROUP BY `curso`.`descricao_curso`");

        DB::statement("CREATE OR REPLACE VIEW `totalMatriculados2021` AS
            SELECT COUNT(`matricula`.`matricula`) AS `TotalAlunos`
            FROM `matricula`
            JOIN `residencia` ON `residencia`.`aluno_id` = `matricula`.`aluno_id`
            JOIN `regimes_residencia` ON `residencia`.`regime_residencia_id` = `regimes_residencia`.`id`
            WHERE `matricula`.`ano` = 2021");

        DB::unprepared("DROP PROCEDURE IF EXISTS `TotalAlunosPorAno`");
        DB::unprepared("CREATE PROCEDURE `TotalAlunosPorAno` (IN `varAno` INT)
            BEGIN
                SELECT COUNT(matricula.matricula) AS TotalAlunos
                FROM matricula
                INNER JOIN residencia ON residencia.aluno_id = matricula.aluno_id
                INNER JOIN regimes_residencia ON residencia.regime_residencia_id = regimes_residencia.id
                WHERE matricula.ano = varAno;
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS `TotalAlunosPorAno`");

        foreach ([
            'totalMatriculados2021',
            'totalCurso2021',
            'totalApto',
            'semirresidentes_sexo',
            'semirresidentes9',
            'semirresidentes8',
            'semirresidentes5',
            'semirresidentes',
            'residentes',
        ] as $view) {
            DB::statement("DROP VIEW IF EXISTS `{$view}`");
        }
    }
}
