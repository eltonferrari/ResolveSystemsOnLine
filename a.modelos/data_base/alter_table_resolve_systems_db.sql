--
-- Alteração de nome da coluna "data" para "updated_at"
-- da tabela `contratos`
--
ALTER TABLE contratos
CHANGE data updated_at datetime DEFAULT CURRENT_TIMESTAMP;

-- Alteração 