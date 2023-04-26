<?php 
    require_once ("../../../conexao/DBController.php");
    class Estados {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function getEstadoById($id) {
            $query = "SELECT * FROM estados WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getNomeById($id) {
            $estado = null;
            $query = "SELECT nome FROM estados WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $nome) {
                $estado = $nome['nome'];
            }
            return $estado;
        }
        
        function getAllEstados() {
            $query = "SELECT * FROM estados ORDER BY nome ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }
    }
?>