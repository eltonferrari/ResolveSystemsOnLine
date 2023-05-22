<?php
    require_once "../../../conexao/DBController.php";
    class Emails {
        private $db_handle;
        function __construct() {
            $this->db_handle = new DBController();
        }
        
        function addEmailPessoa($idPessoa, $email, $principal) {
            $query = "INSERT INTO emails (id_pessoa, email, principal)
                        VALUES (?, ?, ?)";
            $paramType = "isi";
            $paramValue = array($idPessoa, $email, $principal);
            $insertIdEmail= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdEmail;
        }

        function getEmailById($idPessoa){
            $query = "SELECT * FROM emails WHERE id_pessoa = ? AND principal = 1";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;            
        }
    }
?>