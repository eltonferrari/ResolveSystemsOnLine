<?php
    require_once "../../../conexao/DBController.php";
    class Telefones {
        private $db_handle;
        function __construct() {
            $this->db_handle = new DBController();
        }
        
        function addTelefonePessoa($idPessoa, $telefone, $principal) {
            $query = "INSERT INTO telefones (id_pessoa, telefone, principal)
                        VALUES (?, ?, ?)";
            $paramType = "isi";
            $paramValue = array($idPessoa, $telefone, $principal);
            $insertIdTelefone= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdTelefone;
        }
        
        function getTelefoneById($idPessoa){
            $query = "SELECT * FROM telefones WHERE id_pessoa = ? AND principal = 1";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;            
        }    
    }
?>