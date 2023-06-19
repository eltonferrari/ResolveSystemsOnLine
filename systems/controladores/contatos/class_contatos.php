<?php 
    require_once "../../../conexao/DBController.php";
    class Contatos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addContato($nome, $email, $telefone, $descricao) {
            $query = "INSERT INTO contatos (nome, email, telefone, descricao)
                        VALUES (?, ?, ?, ?)";
            $paramType = "ssss";
            $paramValue = array($nome, $email, $telefone, $descricao);
            $insertIdContato= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdContato;
        }

        function editContato($nome, $email, $telefone, $descricao, $updatedAt, $id) {
            $query = "UPDATE contatos SET nome = ?, email = ?, telefone = ?, descricao = ?, updated_at = ? WHERE id = ?";
            $paramType = "sssssi";
            $paramValue = array($nome, $email, $telefone, $descricao, $updatedAt, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getContatoById($id) {
            $query = "SELECT * FROM contatos WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $contato = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $contato;
        }        

        function getAllContatos() {
            $query = "SELECT * FROM contatos ORDER BY id ASC";
            $lista = $this->db_handle->runBaseQuery($query);
            return $lista;
        }
    }
?>