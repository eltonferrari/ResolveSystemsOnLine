<?php
    require_once "../../../conexao/DBController.php";  

    class Arquivos {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addArquivoPessoa($idPessoa, $descricao, $caminho, $arquivo) {
            $query = "INSERT INTO arquivos (id_pessoa, descricao, caminho, arquivo)
                        VALUES (?, ?, ?, ?)";
            $paramType = "isss";
            $paramValue = array($idPessoa, $descricao, $caminho, $arquivo);
            $insertIdArquivo= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdArquivo;            
        }

        function addArquivoContrato($idContrato, $descricao, $caminho, $arquivo) {
            $query = "INSERT INTO arquivos (id_contrato, descricao, caminho, arquivo)
                        VALUES (?, ?, ?, ?)";
            $paramType = "isss";
            $paramValue = array($idContrato, $descricao, $caminho, $arquivo);
            $insertIdArquivo= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdArquivo;
        }

        function editArquivo($descricao,
                             $caminho,
                             $arquivo,
                             $id) {
            $query = "UPDATE arquivos
                        SET descricao = ?,
                            caminho = ?,
                            arquivo = ?, 
                        WHERE id = ?";
            $paramType = "sssi";
            $paramValue = array($descricao,
                                $caminho,
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

        function getNumeroArquivoPessoa($idPessoa) {
            $query = "SELECT COUNT(*) FROM arquivos WHERE id_pessoa = ?";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach ($result as $num) {
                $numeroArquivos = $num['COUNT(*)'];
            }
            return $numeroArquivos;
        }

        function getNumeroArquivoContrato($idContrato) {
            $query = "SELECT COUNT(*) FROM arquivos WHERE id_contrato = ?";
            $paramType = "i";
            $paramValue = array($idContrato);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach ($result as $num) {
                $numeroArquivos = $num['COUNT(*)'];
            }
            return $numeroArquivos;
        }
    }
?>