<?php
    require_once "../../../conexao/DBController.php";  

    class Arquivos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addArquivoPessoa($idPessoa, $descricao, $arquivo) {
            $query = "INSERT INTO arquivos (id_pessoa, descricao, arquivo)
                        VALUES (?, ?, ?)";
            $paramType = "iss";
            $paramValue = array($idPessoa, $descricao, $arquivo);
            $insertIdArquivo= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdArquivo;            
        }

        function addArquivoContrato($idContrato, $descricao, $arquivo) {
            $query = "INSERT INTO arquivos (id_contrato, descricao, arquivo)
                        VALUES (?, ?, ?)";
            $paramType = "isss";
            $paramValue = array($idContrato, $descricao, $arquivo);
            $insertIdArquivo= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdArquivo;
        }

        function editArquivo($descricao,
                             $arquivo,
                             $id) {
            $query = "UPDATE arquivos
                        SET descricao = ?,
                            arquivo = ?, 
                        WHERE id = ?";
            $paramType = "ssi";
            $paramValue = array($descricao,
                                $arquivo,
                                $id
                                );
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getArquivoById($id) {
            $query = "SELECT * FROM arquivos WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $arquivo = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $arquivo;
        }

        function getArquivosPessoaById($idPessoa) {
            $query = "SELECT * FROM arquivos WHERE id_pessoa = ?";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $arquivosPessoa = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $arquivosPessoa;
        }

        function getArquivosContratoById($idContrato) {
            $query = "SELECT * FROM arquivos WHERE id_contrato = ?";
            $paramType = "i";
            $paramValue = array($idContrato);
            $arquivosContrato = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $arquivosContrato;
        }
    }
?>