<?php
    require_once "../../../conexao/DBController.php";
    class Telefones {
        private $db_handle;
        function __construct() {
            $this->db_handle = new DBController();
        }
        
        function addStatus($nome, $descricao, $anterior, $proximo) {
            $query = "INSERT INTO status (nome, descricao, anterior, proximo)
                        VALUES (?, ?, ?, ?)";
            $paramType = "ssii";
            $paramValue = array($nome, $descricao, $anterior, $proximo);
            $insertIdStatus= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdStatus;
        }
        
        function editStatus($nome, $descricao, $anterior, $proximo, $id) {
            $query = "UPDATE status SET nome = ?, descricao = ?, anterior = ?, proximo = ? WHERE id = ?";
            $paramType = "ssiii";
            $paramValue = array($nome, $descricao, $anterior, $proximo, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }
    }        
?>