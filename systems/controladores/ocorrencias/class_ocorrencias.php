<?php 
    require_once "../../../conexao/DBController.php";
    class Ocorrencias {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addOcorrencia($idContrato, $texto, $createdBy) {
            $query = "INSERT INTO ocorrencias (id_contrato, texto, created_by)
                        VALUES (?, ?, ?)";
            $paramType = "iss";
            $paramValue = array($idContrato, $texto, $createdBy);
            $insertIdOcorrencia= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdOcorrencia;
        }

        function editOcorrencia($texto, $createdBy, $updatedAt, $id) {
            $query = "UPDATE ocorrencias SET texto = ?, created_by = ?, updated_at = ? WHERE id = ?";
            $paramType = "sisi";
            $paramValue = array($texto, $createdBy, $updatedAt, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getOcorrenciaById($id) {
            $query = "SELECT * FROM ocorrencias WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $ocorrencia = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $ocorrencia;
        }

        function getAllOcorrenciasByContrato($idContrato) {
            $query = "SELECT * FROM ocorrencias WHERE id_contrato = ?";
            $paramType = "i";
            $paramValue = array($idContrato);
            $ocorrencias = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $ocorrencias;
        }
    }
?>