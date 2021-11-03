-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema sysdae
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sysdae
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sysdae` DEFAULT CHARACTER SET utf8mb4 ;
USE `sysdae` ;

-- -----------------------------------------------------
-- Table `sysdae`.`alojamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`alojamento` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_alojamento` VARCHAR(100) NOT NULL,
  `nro_aptos` INT(11) NOT NULL,
  `responsavel` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`programa_beneficio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`programa_beneficio` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_beneficio` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`situacao_aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`situacao_aluno` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_situacao` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`aluno` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `sexo` VARCHAR(1) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(255) NOT NULL,
  `nome_pai` VARCHAR(50) NOT NULL,
  `telefone_pai` VARCHAR(255) NOT NULL,
  `nome_mae` VARCHAR(50) NOT NULL,
  `telefone_mae` VARCHAR(255) NOT NULL,
  `contato_emergencia` VARCHAR(255) NOT NULL,
  `municipio` VARCHAR(50) NOT NULL,
  `beneficio_id` BIGINT(20) UNSIGNED NOT NULL,
  `situacao_id` BIGINT(20) UNSIGNED NOT NULL,
  `observacoes` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `aluno_programa_beneficio_id_foreign` (`beneficio_id` ASC) VISIBLE,
  INDEX `aluno_situacao_id_foreign` (`situacao_id` ASC) VISIBLE,
  CONSTRAINT `aluno_programa_beneficio_id_foreign`
    FOREIGN KEY (`beneficio_id`)
    REFERENCES `sysdae`.`programa_beneficio` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `aluno_situacao_id_foreign`
    FOREIGN KEY (`situacao_id`)
    REFERENCES `sysdae`.`situacao_aluno` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 59
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`apartamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`apartamento` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_apartamento` VARCHAR(255) NOT NULL,
  `alojamento_id` BIGINT(20) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `apartamento_id_alojamento_foreign` (`alojamento_id` ASC) VISIBLE,
  CONSTRAINT `apartamento_id_alojamento_foreign`
    FOREIGN KEY (`alojamento_id`)
    REFERENCES `sysdae`.`alojamento` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`ata`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`ata` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nro_ata` VARCHAR(255) NOT NULL,
  `data_ata` DATE NOT NULL,
  `descricao_ata` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`forma_atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`forma_atendimento` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `forma_atendimento` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`atendimento` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `servidores_responsaveis` VARCHAR(255) NOT NULL,
  `atendimento_id` BIGINT(20) UNSIGNED NOT NULL,
  `relato_atendimento` TEXT NOT NULL,
  `outras_observacoes` TEXT NOT NULL,
  `historia_de_vida` TEXT NOT NULL,
  `encaminhamentos` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `atendimento_id_forma_atendimento_foreign` (`atendimento_id` ASC) VISIBLE,
  CONSTRAINT `atendimento_id_forma_atendimento_foreign`
    FOREIGN KEY (`atendimento_id`)
    REFERENCES `sysdae`.`forma_atendimento` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`curso` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_curso` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`failed_jobs` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`foto` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aluno_id` BIGINT(20) UNSIGNED NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `foto_aluno_id_foreign` (`aluno_id` ASC) VISIBLE,
  CONSTRAINT `foto_aluno_id_foreign`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `sysdae`.`aluno` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`serie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`serie` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_serie` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`turma` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_turma` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`matricula` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula` BIGINT(11) NOT NULL,
  `aluno_id` BIGINT(20) UNSIGNED NOT NULL,
  `serie_id` BIGINT(20) UNSIGNED NOT NULL,
  `turma_id` BIGINT(20) UNSIGNED NOT NULL,
  `ano` INT(11) NOT NULL,
  `curso_id` BIGINT(20) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `matricula_id_aluno_foreign` (`aluno_id` ASC) VISIBLE,
  INDEX `matricula_id_serie_foreign` (`serie_id` ASC) VISIBLE,
  INDEX `matricula_id_turma_foreign` (`turma_id` ASC) VISIBLE,
  INDEX `matricula_id_curso_foreign` USING BTREE (`curso_id`) VISIBLE,
  CONSTRAINT `matricula_id_aluno_foreign`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `sysdae`.`aluno` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `matricula_id_curso_foreign`
    FOREIGN KEY (`curso_id`)
    REFERENCES `sysdae`.`curso` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `matricula_id_serie_foreign`
    FOREIGN KEY (`serie_id`)
    REFERENCES `sysdae`.`serie` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `matricula_id_turma_foreign`
    FOREIGN KEY (`turma_id`)
    REFERENCES `sysdae`.`turma` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`medidas_disciplinares`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`medidas_disciplinares` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `medida_disciplinar` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`ocorrencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`ocorrencia` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alunos_envolvidos` VARCHAR(255) NOT NULL,
  `data_ocorrencia` DATE NOT NULL,
  `descricao_ocorrencia` TEXT NOT NULL,
  `data_reuniao_conselho_disciplinar` DATE NOT NULL,
  `medidas` VARCHAR(255) NOT NULL,
  `total_horas_recebidas` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`setor` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `setor` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`ocorrencias_atividades_orientadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`ocorrencias_atividades_orientadas` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ocorrencia_id` BIGINT(20) UNSIGNED NOT NULL,
  `setor_id` BIGINT(20) UNSIGNED NOT NULL,
  `servidor` VARCHAR(255) NOT NULL,
  `data` DATE NOT NULL,
  `nro_horas` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `ocorrencias_atividades_orientadas_id_ocorrencia_foreign` (`ocorrencia_id` ASC) VISIBLE,
  INDEX `ocorrencias_atividades_orientadas_id_setor_foreign` USING BTREE (`setor_id`) VISIBLE,
  CONSTRAINT `ocorrencias_atividades_orientadas_id_ocorrencia_foreign`
    FOREIGN KEY (`ocorrencia_id`)
    REFERENCES `sysdae`.`ocorrencia` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `ocorrencias_atividades_orientadas_id_setor_foreign`
    FOREIGN KEY (`setor_id`)
    REFERENCES `sysdae`.`setor` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`users` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`perfil` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT(20) UNSIGNED NOT NULL,
  `sobre` TEXT NULL DEFAULT NULL,
  `fone` VARCHAR(15) NULL DEFAULT NULL,
  `redes_sociais` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `perfil_user_id_foreign` (`user_id` ASC) VISIBLE,
  CONSTRAINT `perfil_user_id_foreign`
    FOREIGN KEY (`user_id`)
    REFERENCES `sysdae`.`users` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`regimes_residencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`regimes_residencia` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao_regime` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`residencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`residencia` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula` INT(11) NOT NULL,
  `data_entrada` DATE NOT NULL,
  `data_saida` DATE NOT NULL,
  `regime_residencia_id` BIGINT(20) UNSIGNED NOT NULL,
  `apto_antigo` VARCHAR(255) NOT NULL,
  `apto_novo` VARCHAR(255) NOT NULL,
  `data_troca` DATE NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `residencia_residencia_id_foreign` (`regime_residencia_id` ASC) VISIBLE,
  CONSTRAINT `residencia_residencia_id_foreign`
    FOREIGN KEY (`regime_residencia_id`)
    REFERENCES `sysdae`.`regimes_residencia` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`residencia_autorizacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`residencia_autorizacoes` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula` INT(11) NOT NULL,
  `autoricacao_parcial` TINYINT(1) NOT NULL,
  `data` DATE NOT NULL,
  `justificativa` VARCHAR(255) NOT NULL,
  `forma_autorizacao` VARCHAR(255) NOT NULL,
  `quem_autorizou` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sysdae`.`residencia_faltas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sysdae`.`residencia_faltas` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula` INT(11) NOT NULL,
  `data_falta` DATE NOT NULL,
  `motivo` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
