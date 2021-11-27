/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `alojamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alojamento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_alojamento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_aptos` int(11) NOT NULL,
  `responsavel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_pai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_pai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_mae` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_mae` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato_emergencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficio_id` bigint(20) unsigned NOT NULL,
  `situacao_id` bigint(20) unsigned NOT NULL,
  `observacoes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_programa_beneficio_id_foreign` (`beneficio_id`),
  KEY `aluno_situacao_id_foreign` (`situacao_id`),
  CONSTRAINT `aluno_programa_beneficio_id_foreign` FOREIGN KEY (`beneficio_id`) REFERENCES `programa_beneficio` (`id`) ON DELETE CASCADE,
  CONSTRAINT `aluno_situacao_id_foreign` FOREIGN KEY (`situacao_id`) REFERENCES `situacao_aluno` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `apartamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_apartamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alojamento_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apartamento_id_alojamento_foreign` (`alojamento_id`),
  CONSTRAINT `apartamento_id_alojamento_foreign` FOREIGN KEY (`alojamento_id`) REFERENCES `alojamento` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ata` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nro_ata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_ata` date NOT NULL,
  `descricao_ata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendimento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `servidores_responsaveis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atendimento_id` bigint(20) unsigned NOT NULL,
  `relato_atendimento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outras_observacoes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `historia_de_vida` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encaminhamentos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atendimento_id_forma_atendimento_foreign` (`atendimento_id`),
  CONSTRAINT `atendimento_id_forma_atendimento_foreign` FOREIGN KEY (`atendimento_id`) REFERENCES `forma_atendimento` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_curso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `forma_atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forma_atendimento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `forma_atendimento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foto_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `foto_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matricula` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `matricula` bigint(20) unsigned NOT NULL,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `serie_id` bigint(20) unsigned NOT NULL,
  `turma_id` bigint(20) unsigned NOT NULL,
  `ano` int(11) NOT NULL,
  `curso_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `matricula_id_aluno_foreign` (`aluno_id`),
  KEY `matricula_id_serie_foreign` (`serie_id`),
  KEY `matricula_id_turma_foreign` (`turma_id`),
  KEY `matricula_id_curso_foreign` (`curso_id`) USING BTREE,
  CONSTRAINT `matricula_id_aluno_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  CONSTRAINT `matricula_id_curso_foreign` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE,
  CONSTRAINT `matricula_id_serie_foreign` FOREIGN KEY (`serie_id`) REFERENCES `serie` (`id`) ON DELETE CASCADE,
  CONSTRAINT `matricula_id_turma_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `medidas_disciplinares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medidas_disciplinares` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `medida_disciplinar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ocorrencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocorrencia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alunos_envolvidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_ocorrencia` date NOT NULL,
  `descricao_ocorrencia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_reuniao_conselho_disciplinar` date NOT NULL,
  `medidas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_horas_recebidas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `ocorrencias_atividades_orientadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocorrencias_atividades_orientadas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ocorrencia_id` bigint(20) unsigned NOT NULL,
  `setor_id` bigint(20) unsigned NOT NULL,
  `servidor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `nro_horas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ocorrencias_atividades_orientadas_id_ocorrencia_foreign` (`ocorrencia_id`),
  KEY `ocorrencias_atividades_orientadas_id_setor_foreign` (`setor_id`) USING BTREE,
  CONSTRAINT `ocorrencias_atividades_orientadas_id_ocorrencia_foreign` FOREIGN KEY (`ocorrencia_id`) REFERENCES `ocorrencia` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ocorrencias_atividades_orientadas_id_setor_foreign` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `sobre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redes_sociais` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil_user_id_foreign` (`user_id`),
  CONSTRAINT `perfil_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `programa_beneficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programa_beneficio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_beneficio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `regimes_residencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regimes_residencia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_regime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `residencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residencia` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date DEFAULT NULL,
  `regime_residencia_id` bigint(20) unsigned NOT NULL,
  `apto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apto_antigo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apto_novo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_troca` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `residencia_residencia_id_foreign` (`regime_residencia_id`),
  KEY `residencia_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `residencia_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  CONSTRAINT `residencia_residencia_id_foreign` FOREIGN KEY (`regime_residencia_id`) REFERENCES `regimes_residencia` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `residencia_autorizacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residencia_autorizacoes` (
  `aluno_id` bigint(11) unsigned NOT NULL,
  `autoricacao_parcial` tinyint(1) NOT NULL,
  `data` date NOT NULL,
  `justificativa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forma_autorizacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quem_autorizou` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `residencia_autorizacoes_aluno_id` (`aluno_id`),
  CONSTRAINT `residencia_autorizacoes_aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `residencia_faltas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residencia_faltas` (
  `aluno_id` bigint(20) unsigned NOT NULL,
  `data_falta` date NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `residencia_faltas_aluno_id` (`aluno_id`),
  CONSTRAINT `residencia_faltas_aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `resource_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_role` (
  `role_id` bigint(20) unsigned NOT NULL,
  `resource_id` bigint(20) unsigned NOT NULL,
  KEY `resource_role_role_id_foreign` (`role_id`),
  KEY `resource_role_resource_id_foreign` (`resource_id`),
  CONSTRAINT `resource_role_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`),
  CONSTRAINT `resource_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resources` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `setor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `situacao_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `situacao_aluno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_situacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao_turma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO `migrations` VALUES (4,'2021_08_20_030106_create_alojamento_table',1);
INSERT INTO `migrations` VALUES (5,'2021_08_20_030132_create_ata_table',1);
INSERT INTO `migrations` VALUES (6,'2021_08_20_030147_create_curso_table',1);
INSERT INTO `migrations` VALUES (7,'2021_08_20_030216_create_forma_atendimento_table',1);
INSERT INTO `migrations` VALUES (8,'2021_08_20_030250_create_medidas_disciplinares_table',1);
INSERT INTO `migrations` VALUES (9,'2021_08_20_030331_create_programa_beneficio_table',1);
INSERT INTO `migrations` VALUES (10,'2021_08_20_030353_create_regimes_residencia_table',1);
INSERT INTO `migrations` VALUES (11,'2021_08_20_030427_create_serie_table',1);
INSERT INTO `migrations` VALUES (12,'2021_08_20_030444_create_situacao_aluno_table',1);
INSERT INTO `migrations` VALUES (13,'2021_08_20_030502_create_turma_table',1);
INSERT INTO `migrations` VALUES (14,'2021_08_21_015443_create_residencia_autorizacoes_table',1);
INSERT INTO `migrations` VALUES (15,'2021_08_21_015518_create_perfil_table',1);
INSERT INTO `migrations` VALUES (16,'2021_08_21_015537_create_aluno_table',1);
INSERT INTO `migrations` VALUES (17,'2021_08_21_015538_create_foto_table',1);
INSERT INTO `migrations` VALUES (18,'2021_08_21_015609_create_apartamento_table',1);
INSERT INTO `migrations` VALUES (19,'2021_08_21_015628_create_matricula_table',1);
INSERT INTO `migrations` VALUES (20,'2021_08_21_015720_create_residencia_table',1);
INSERT INTO `migrations` VALUES (21,'2021_08_21_015733_create_atendimento_table',1);
INSERT INTO `migrations` VALUES (22,'2021_08_21_015745_create_setor_table',1);
INSERT INTO `migrations` VALUES (23,'2021_08_21_015746_create_ocorrencia_table',1);
INSERT INTO `migrations` VALUES (24,'2021_08_21_015747_create_ocorrencias_atividades_orientadas_table',1);
INSERT INTO `migrations` VALUES (25,'2021_08_21_015829_create_residencia_faltas_table',1);
INSERT INTO `migrations` VALUES (26,'2021_10_03_114146_alter_aluno_table_add_foto_column',2);
INSERT INTO `migrations` VALUES (27,'2021_10_21_182543_create_permission_tables',3);
INSERT INTO `migrations` VALUES (28,'2021_10_21_182819_create_products_table',4);
INSERT INTO `migrations` VALUES (29,'2021_10_26_020752_create_roles_table',5);
INSERT INTO `migrations` VALUES (30,'2021_10_26_021146_create_resources_table',5);
INSERT INTO `migrations` VALUES (31,'2021_10_26_022007_alter_users_table',5);
INSERT INTO `migrations` VALUES (32,'2021_10_26_024555_create_resource_role_table',5);
