<?php
    require_once "../../../conexao/DBController.php";
    class Status {
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
        
        function editStatus($nome, $descricao, $id) {
            $query = "UPDATE status SET nome = ?, descricao = ? WHERE id = ?";
            $paramType = "ssi";
            $paramValue = array($nome, $descricao, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function editPosicaoStatus($anterior, $proximo, $id) {
            $query = "UPDATE status SET anterior = ?, proximo = ? WHERE id = ?";
            $paramType = "iii";
            $paramValue = array($anterior, $proximo, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getStatusById($id) {
            $query = "SELECT * FROM status WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function setStatusAnterior($proximo, $id) {
            $query = "UPDATE status SET proximo = ? WHERE id = ?";
            $paramType = "ii";
            $paramValue = array($proximo, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }
        
        function setStatusProximo($anterior, $id) {
            $query = "UPDATE status SET anterior = ? WHERE id = ?";
            $paramType = "ii";
            $paramValue = array($anterior, $id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getNomeStatusById($id) {
            $query = "SELECT nome FROM status WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach ($result as $n) {
                $nome = $n['nome'];
            }
            return $nome;
        }

        function getAllStatus() {
            $query = "SELECT * FROM status";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }

        function ordenaLista($lista) {
            $listaDesordenada = $lista;
            $listaOrdenada = [];
            $proximo = $listaDesordenada[0]['proximo'];
            $listaOrdenada[0] = $listaDesordenada[0];
            $i = 1;
            while ($proximo != null) {
                foreach ($listaDesordenada as $l) {
                    if ($l['id'] == $proximo) {
                        $listaOrdenada[$i] = $l;
                        $proximo = $l['proximo'];
                        $i++;
                    }
                }                
            }
            return $listaOrdenada; 
        }

        function apagaStatus($id) {
            $query = "DELETE FROM status WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $this->db_handle->update($query, $paramType, $paramValue);
        }
    }        
?>