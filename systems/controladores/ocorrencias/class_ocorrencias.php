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
        
        /*
        function getAllContratosAbertos() {
            $query = "SELECT p.nome, c.id FROM contratos c JOIN pessoas p on p.id = c.id_cliente and aberto = 1";
            $lista = $this->db_handle->runBaseQuery($query);
            return $lista;
        }

        function getAllContratosTerminados() {
            $query = "SELECT p.nome, c.id FROM contratos c JOIN pessoas p on p.id = c.id_cliente and aberto = 0";
            $lista = $this->db_handle->runBaseQuery($query);
            return $lista;
        }

        function getAllContratosAbertosByCliente($idCliente) {
            $query = "SELECT id FROM contratos WHERE aberto = 1 AND id_cliente = ?";
            $paramType = "i";
            $paramValue = array($idCliente);
            $contratos = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $contratos;
        }

        function getAllContratosTerminadosByCliente($idCliente) {
            $query = "SELECT id FROM contratos WHERE aberto = 0 AND id_cliente = ?";
            $paramType = "i";
            $paramValue = array($idCliente);
            $contratos = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $contratos;
        }
        
        function getIntencaoByEmail($email) {
            $query = "SELECT * FROM form_intencao WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $intencao = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $intencao;
        }

        function getIntencaoByTelefone($telefone) {
            $query = "SELECT * FROM form_intencao WHERE telefone = ?";
            $paramType = "s";
            $paramValue = array($telefone);
            $intencao = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $intencao;
        }
        
        function getIntencaoByVisibilidade($visibilidade) {
            $query = "SELECT * FROM form_intencao WHERE visibilidade = ?";
            $paramType = "i";
            $paramValue = array($visibilidade);
            $intencao = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $intencao;
        }

        function getAllIntencoes() {
            $query = "SELECT * FROM form_intencao ORDER BY created_at ASC";
            $lista = $this->db_handle->runBaseQuery($query);
            return $lista;
        }
        */
    }
?>