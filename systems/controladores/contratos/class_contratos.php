<?php 
    require_once "../../../conexao/DBController.php";
    class Contratos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addContrato($idCliente, $descricao, $idStatus) {
            $query = "INSERT INTO contratos (id_cliente, descricao, id_status)
                        VALUES (?, ?, ?)";
            $paramType = "isi";
            $paramValue = array($idCliente, $descricao, $idStatus);
            $insertIdContrato= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdContrato;
        }

        function alteraContrato($descricao, $idStatus, $updatedAt, $id) {
            $query = "UPDATE contratos 
                        SET descricao = ?,
                            id_status = ?,
                            updated_at = ? 
                        WHERE id = ?";
            $paramType = "sisi";
            $paramValue = array($descricao,
                                $idStatus,
                                $updatedAt,
                                $id
                                );
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getContratoById($id) {
            $query = "SELECT * FROM contratos WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $contrato = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $contrato;
        }

        function getContratosByCliente($idCliente) {
            $query = "SELECT * FROM contratos WHERE id_cliente = ?";
            $paramType = "i";
            $paramValue = array($idCliente);
            $contratos = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $contratos;
        }
        
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
        
        /*
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