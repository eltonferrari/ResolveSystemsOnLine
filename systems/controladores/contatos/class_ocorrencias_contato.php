<?php 
    require_once "../../../conexao/DBController.php";
    class OcorrenciasContato {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addOcorenciaContato($idContato, $descricao) {
            $query = "INSERT INTO ocorrencias_contato (id_contato, descricao)
                        VALUES (?, ?)";
            $paramType = "is";
            $paramValue = array($idContato, $descricao);
            $insertIdOcorrenciaContato = $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdOcorrenciaContato;
        }

        function getgetAllOcorrenciasContato($idContato) {
            $query = "SELECT * FROM ocorrencias_contato WHERE id_contato = ? ORDER BY id ASC";
            $paramType = "i";
            $paramValue = array($idContato);
            $lista = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $lista;
        }
    }
?>