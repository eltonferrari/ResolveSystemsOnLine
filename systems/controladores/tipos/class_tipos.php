<?php 
    require_once ("../../../conexao/DBController.php");
    class Tipos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addTipo($nome,
                         $descricao
                        ) {
            $query = "INSERT INTO tipos_pessoa (nome, descricao)
                        VALUES (?, ?)";
            $paramType = "ss";
            $paramValue = array($nome, $descricao);
            $insertIdTipo= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdTipo;
        }

        function editTipo($nome, $descricao, $id) {
            $query = "UPDATE tipos_pessoa SET nome = ?, descricao = ? WHERE id = ?";
            $paramType = "ssi";
            $paramValue = array($nome, $descricao, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getTipoById($id) {
            $query = "SELECT * FROM tipos_pessoa WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getNomeById($id) {
            $tipo = null;
            $query = "SELECT nome FROM tipos_pessoa WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $nome) {
                $tipo = $nome['nome'];
            }
            return $tipo;
        }

        function getIdByNome($nome) {
            $id = null;
            $query = "SELECT id FROM tipos_pessoa WHERE nome = ?";
            $paramType = "s";
            $paramValue = array($nome);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $tipo) {
                $id = $tipo['id'];
            }
            return $id;
        }
        
        function getAllTipos() {
            $query = "SELECT * FROM tipos_pessoa ORDER BY nome ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }
    }
?>