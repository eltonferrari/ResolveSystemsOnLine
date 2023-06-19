-- ALTERAÇÕES
--
-- Estrutura da tabela `contatos`
--
CREATE TABLE IF NOT EXISTS `contatos` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` varchar(100),
  	`email` varchar(100),
	`telefone` varchar(14),
	`descricao` varchar(50),
	`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
	`updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `ocorrencias_contato` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_contato` int(10) NOT NULL,
	`descricao` varchar(255),
	`created_at` datetime DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	FOREIGN KEY(id_contato) REFERENCES contatos(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;