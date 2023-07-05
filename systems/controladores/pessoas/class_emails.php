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

        function editEmail($principal, $id) {
            $query = "UPDATE emails SET principal = ? WHERE id = ?";
            $paramType = "ii";
            $paramValue = array($principal, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getEmailPrincipal($idPessoa){
            $query = "SELECT * FROM emails WHERE id_pessoa = ? AND principal = 1";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            $emailPrincipal = $result;
            if (!is_null($result)) {
                foreach ($result as $emailP) {
                    $emailPrincipal = $emailP['email'];
                }
            }
            return $emailPrincipal;            
        }

        function getArrayEmailPrincipal($idPessoa){
            $query = "SELECT * FROM emails WHERE id_pessoa = ? AND principal = 1";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;            
        }

        function getEmailOutros($idPessoa){
            $query = "SELECT * FROM emails WHERE id_pessoa = ? AND principal = 0";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $emailOutros = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $emailOutros;            
        }

        function getIdByEmail($email) {
            $query = "SELECT id FROM emails WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getEmailValidar($email) {
            $query = "SELECT email FROM emails WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            $emailCadastrado = null;
            if (!empty($result)) {
                foreach ($result as $e) {
                    $emailCadastrado = $e['email'];
                }
            }
            return $emailCadastrado;
        }
    }
?>