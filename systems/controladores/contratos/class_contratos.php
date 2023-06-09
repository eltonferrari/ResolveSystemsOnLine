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

        function editContrato($descricao, $idStatus, $updatedAt, $id) {
            $query = "UPDATE contratos SET descricao = ?, id_status = ?, updated_at = ? WHERE id = ?";
            $paramType = "sisi";
            $paramValue = array($descricao, $idStatus, $updatedAt, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getContratoById($id) {
            $query = "SELECT * FROM contratos WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $contrato = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $contrato;
        }

        function getNomeClienteByIdContrato($idContrato) {
            $query = "SELECT p.nome FROM pessoas p JOIN contratos c ON p.id = c.id_cliente and c.id = ?";
            $paramType = "i";
            $paramValue = array($idContrato);
            $nomeCliente = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach ($nomeCliente as $nC) {
                $nome = $nC['nome'];
            }
            return $nome;
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
    }
?>