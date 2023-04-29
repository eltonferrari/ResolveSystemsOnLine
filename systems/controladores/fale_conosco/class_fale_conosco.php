<?php 
    require_once "../../../conexao/DBController.php";
    class FaleConosco {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addMensagem($nome, $email, $telefone, $mensagem) {
            $query = "INSERT INTO form_intencao (nome, email, telefone, mensagem)
                        VALUES (?, ?, ?, ?)";
            $paramType = "ssss";
            $paramValue = array($nome, $email, $telefone, $mensagem);
            $insertIdMensagem= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdMensagem;
        }

        function alteraVisibilidade($id, $visibilidade, $updatedAt) {
            $query = "UPDATE form_intencao 
                        SET id = ?,
                            visibilidade = ?,
                            updated_at = ? 
                        WHERE id = $id";
            $paramType = "iis";
            $paramValue = array($id,
                                $visibilidade,
                                $updatedAt);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getIntencaoById($id) {
            $query = "SELECT * FROM form_intencao WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $intencao = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $intencao;
        }

        function getIntencaoByNome($nome) {
            $query = "SELECT * FROM form_intencao WHERE nome = %$nome%";
            $intencao = $this->db_handle->runBaseQuery($query);
            return $intencao;
        }
        
        function getIntencaoByEmail($email) {
            $query = "SELECT * FROM form_intencao WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $intencao = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $intencao;
        }

        function getIntencaoByTelefone($telefone) {
            $query = "SELECT * FROM form_intencao WHERE telefone = ?";
            $paramType = "s";
            $paramValue = array($telefone);
            $intencao = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $intencao;
        }
        
        function getIntencaoByVisibilidade($visibilidade) {
            $query = "SELECT * FROM form_intencao WHERE visibilidade = ?";
            $paramType = "i";
            $paramValue = array($visibilidade);
            $intencao = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $intencao;
        }

        function getAllIntencoes() {
            $query = "SELECT * FROM form_intencao ORDER BY created_at ASC";
            $lista = $this->db_handle->runBaseQuery($query);
            return $lista;
        }

    }
?>