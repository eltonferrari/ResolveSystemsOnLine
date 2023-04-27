SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-03:00";

--
-- Estrutura da tabela `estados`
--
DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
	`id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` varchar(25) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
	`sigla` varchar(2) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
  	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `estados` (`id`, `nome`, `sigla`) 
	VALUES 	(1, 'Acre', 'AC'),
            (2, 'Alagoas', 'AL'),
            (3, 'Amapá', 'AP'),
            (4, 'Amazonas', 'AM'),
            (5, 'Bahia', 'BA'),
            (6, 'Ceará', 'CE'),
            (7, 'Distrito Federal', 'DF'),
            (8, 'Espírito Santo', 'ES'),			
            (9, 'Goiás', 'GO'),
            (10, 'Maranhão', 'MA'),
            (11, 'Mato Grosso', 'MT'),
            (12, 'Mato Grosso do Sul', 'MS'),
            (13, 'Minas Gerais', 'MG'),
            (14, 'Pará', 'PA'),
            (15, 'Paraíba', 'PB'),
            (16, 'Paraná', 'PR'),
            (17, 'Pernambuco', 'PE'),
            (18, 'Piauí', 'PI'),
            (19, 'Rio de Janeiro', 'RJ'),
            (20, 'Rio Grande do Norte', 'RN'),
            (21, 'Rio Grande do Sul', 'RS'),
            (22, 'Rondônia', 'RO'),
            (23, 'Roraima', 'RR'),
            (24, 'Santa Catarina', 'SC'),
            (25, 'São Paulo', 'SP'),
            (26, 'Sergipe', 'SE'),
            (27, 'Tocantins', 'TO'),
			(28, 'Não Informado', 'NI');

--
-- Estrutura da tabela `tipos_pessoa`
--
DROP TABLE IF EXISTS `tipos_pessoa`;
CREATE TABLE IF NOT EXISTS `tipos_pessoa` (
	`id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` varchar(50) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
	`descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tipos_pessoa` (`id`, `nome`, `descricao`) 
	VALUES 	(0, 'Não Definido', 'Sem permissões para uso do sistema'),
			(1, 'Administrador', 'Permissão total sobre o sistema');

--
-- Estrutura da tabela `sexos`
--
DROP TABLE IF EXISTS `sexos`;
CREATE TABLE IF NOT EXISTS `sexos` (
	`id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT,
	`sexo` varchar(16) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
  	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sexos` (`id`, `sexo`) 
	VALUES 	(1, 'Feminino'),
            (2, 'Masculino'),
            (3, 'Outros'),
			(4, 'Não informado');

--
-- Estrutura da tabela `pessoas`
--
DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_tipo` int(2) NOT NULL DEFAULT 100,
	`nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT "publicacao/img/icones/ni.png",
    `cpf` varchar(11) COLLATE utf8_unicode_ci UNIQUE,
	`data_nasc` datetime COLLATE utf8_unicode_ci,
	`id_sexo` int(1) NOT NULL DEFAULT 4,
	`email` varchar(255) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
	`senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`telefone` varchar(16) COLLATE utf8_unicode_ci,
	`cep` varchar(8) COLLATE utf8_unicode_ci,
	`endereco` varchar(255) COLLATE utf8_unicode_ci,
	`endereco_compl` varchar(50) COLLATE utf8_unicode_ci,
	`bairro` varchar(100) COLLATE utf8_unicode_ci,
	`cidade` varchar(100) COLLATE utf8_unicode_ci,
	`id_estado` int(2) NOT NULL DEFAULT 28,
	`ativo` int(1) NOT NULL DEFAULT 1,
	`created_by` int(10) NOT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
	FOREIGN KEY(id_estado) REFERENCES estados(id),
	FOREIGN KEY(id_tipo) REFERENCES tipos_pessoa(id),
	FOREIGN KEY(id_sexo) REFERENCES sexos(id)	
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `pessoas` (`id`, 
					   `id_tipo`,
					   `nome`, 
					   `cpf`,
					   `data_nasc`,
					   `id_sexo`,
					   `email`,
					   `senha`,
					   `telefone`, 
					   `cep`, 
					   `endereco`, 
					   `endereco_compl`, 
					   `bairro`, 
					   `cidade`, 
					   `id_estado`, 
					   `ativo`,
					   `created_by`, 
					   `created_at`, 
					   `updated_at`) 
	VALUES (1, 
			1,
			'Elton Mario Rodriguez Ferrari', 
			'12345678910',
			'1974-02-12 00:00:00',
			1,
			'eltonferrari@gmail.com',
			'e10adc3949ba59abbe56e057f20f883e',
			'+555199885511',
			'91450400',
			'Reverendo Daniel Betts, 267',
			'Esquina',
			'Alto Petrópolis',
			'Porto Alegre',
			21,
			1,
			1,
			'2023-03-13 10:03:18',
			'2023-03-14 14:38:26');

--
-- Estrutura da tabela `log_pessoas`
--
DROP TABLE IF EXISTS `log_pessoas`;
CREATE TABLE IF NOT EXISTS `log_pessoas` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_pessoa` int(10) NOT NULL,
  	`descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`active` int(1) NOT NULL DEFAULT 1,
	`created_by` int(10) NOT NULL DEFAULT 0,
  	`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  	PRIMARY KEY (`id`),
	FOREIGN KEY(id_pessoa) REFERENCES pessoas(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `form_intencao`
--
DROP TABLE IF EXISTS `form_intencao`;
CREATE TABLE IF NOT EXISTS `form_intencao` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` varchar(100) NOT NULL,
  	`email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	`telefone` varchar(16) NOT NULL,
	`mensagem` varchar(255),
	`visibilidade` int(1) NOT NULL DEFAULT 1,
  	`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

COMMIT;