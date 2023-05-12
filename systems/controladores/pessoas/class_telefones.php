<?php
    require_once "../../../conexao/DBController.php";
    class Telefones {
        private $db_handle;
        function __construct() {
            $this->db_handle = new DBController();
        }
        
        function addTelefonePessoa($idPessoa, $telefone, $ramal, $tipo, $principal) {
            $query = "INSERT INTO telefones (id_pessoa, telefone, ramal, tipo, principal)
                        VALUES (?, ?, ?, ?, ?)";
            $paramType = "isssi";
            $paramValue = array($idPessoa, $telefone, $ramal, $tipo, $principal);
            $insertIdTelefone= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdTelefone;
        }
    }
?>