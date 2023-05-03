<?php 
    require_once "../../../conexao/DBController.php";
    class Pessoas {
        private $db_handle;
        
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addPessoa($idTipo, $nome, $email, $senha, $createdBy) {
            $query = "INSERT INTO pessoas (id_tipo, nome, email, senha, created_by)
                        VALUES (?, ?, ?, ?, ?)";
            $paramType = "isssi";
            $paramValue = array($idTipo, $nome, $email, $senha, $createdBy);
            $insertIdPessoa= $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertIdPessoa;
        }

        function editPessoa($idTipo,
                            $nome,
                            $cpf,
                            $dataNasc,
                            $idSexo,
                            $email,
                            $telefone,
                            $cep,
                            $endereco,
                            $enderecoCompl,
                            $bairro,
                            $cidade,
                            $idEstado,
                            $ativo,
                            $createdBy,
                            $updatedAt,
                            $id) {
            $query = "UPDATE pessoas 
                        SET id_tipo = ?,
                            nome = ?,
                            cpf = ?,
                            data_nasc = ?,
                            id_sexo = ?,
                            email = ?,
                            telefone = ?,
                            cep = ?,
                            endereco = ?,
                            endereco_compl = ?,
                            bairro = ?,
                            cidade = ?,
                            id_estado = ?,
                            ativo = ?,
                            created_by = ?,
                            updated_at = ? 
                        WHERE id = ?";
            $paramType = "isssisssssssiiisi";
            $paramValue = array($idTipo,
                                $nome,
                                $cpf,
                                $dataNasc,
                                $idSexo,
                                $email,
                                $telefone,
                                $cep,
                                $endereco,
                                $enderecoCompl,
                                $bairro,
                                $cidade,
                                $idEstado,
                                $ativo,
                                $createdBy,
                                $updatedAt,
                                $id
                                );
            $this->db_handle->update($query, $paramType, $paramValue);
        }

        function getPessoaById($id) {
            $query = "SELECT * FROM pessoas WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getNomeById($id) {
            $pessoa = null;
            $query = "SELECT nome FROM pessoas WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $nome) {
                $pessoa = $nome['nome'];
            }
            return $pessoa;
        }
        
        function getPessoaByEmail($email) {
            $query = "SELECT * FROM pessoas WHERE email = ?";
            $paramType = "s";
            $paramValue = array($email);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }
        
        function getPessoaByName($nome) {
            $query = "SELECT * FROM pessoas WHERE nome LIKE ?";
            $paramType = "s";
            $paramValue = array($nome);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getAllPessoas() {
            $query = "SELECT * FROM pessoas ORDER BY nome ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }

        function getIdNomeAllPessoas() {
            $query = "SELECT id, nome FROM pessoas ORDER BY nome ASC";
            $result = $this->db_handle->runBaseQuery($query);
            return $result;
        }

        function getPessoasByTipo($idTipo) {
            $query = "SELECT * FROM pessoas WHERE id_tipo = ? ORDER BY nome ASC";
            $paramType = "i";
            $paramValue = array($idTipo);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;
        }

        function getFotoById($id) {
            $caminhoDaFoto = null;
            $query = "SELECT foto FROM pessoas WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $foto) {
                $caminhoDaFoto = $foto['foto'];
            }
            return $caminhoDaFoto;
        }
    }
?>