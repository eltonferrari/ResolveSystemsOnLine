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
        
        function editTelefone($principal, $id) {
            $query = "UPDATE telefones SET principal = ? WHERE id = ?";
            $paramType = "ii";
            $paramValue = array($principal, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }
        
        function getTelefonePrincipal($idPessoa){
            $query = "SELECT * FROM telefones WHERE id_pessoa = ? AND principal = 1";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            $telefonePrincipal = null;
            if (!is_null($result)) {
                foreach ($result as $telefoneP) {
                    $telefonePrincipal = $telefoneP['telefone'];
                }
            }
            return $telefonePrincipal;            
        }

        function getTelefoneOutros($idPessoa){
            $query = "SELECT * FROM telefones WHERE id_pessoa = ? AND principal = 0";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $telefoneOutros = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $telefoneOutros;            
        }
        
        function getIdByTelefone($telefone) {
            $query = "SELECT id FROM telefones WHERE telefone = ?";
            $paramType = "s";
            $paramValue = array($telefone);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getAllTelefones($idPessoa){
            $query = "SELECT * FROM telefones WHERE id_pessoa = ?";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;            
        }
    }
?>