<?php 
    require_once ("../../../conexao/DBController.php");
    class Sexos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function getAllSexos() {
            $query = "SELECT * FROM sexos";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }

        function getSexoById($id) {
            $sexo = null;
            $query = "SELECT sexo FROM sexos WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $s) {
                $sexo = $s['sexo'];
            }
            return $sexo;
        }
    }
?>