<?php
    require_once "../../../conexao/DBController.php";
    include 'class_emails.php';
    include 'class_telefones.php';    

    class Pessoas {
        private $db_handle;
        function __construct() {
            $this->db_handle = new DBController();
        }

        function addPessoa($idTipo, $nome, $email, $senha, $createdBy) {
            $query = "INSERT INTO pessoas (id_tipo, nome, senha, created_by)
                        VALUES (?, ?, ?, ?)";
            $paramType = "issi";
            $paramValue = array($idTipo, $nome, $senha, $createdBy);
            $insertIdPessoa= $this->db_handle->insert($query, $paramType, $paramValue);
            $insertIdEmail = new Emails();
            $insertIdEmail = $insertIdEmail->addEmailPessoa($insertIdPessoa,$email,1);
            return $insertIdPessoa;            
        }

        function editPessoa($idTipo,
                            $nome,
                            $cpf_cnpj,
                            $dataNasc,
                            $idSexo,
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
                            cpf_cnpj = ?,
                            data_nasc = ?,
                            id_sexo = ?,
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
            $paramType = "isssisssssiiisi";
            $paramValue = array($idTipo,
                                $nome,
                                $cpf_cnpj,
                                $dataNasc,
                                $idSexo,
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
            //SELECT e.email, p.senha, p.id, p.id_tipo FROM pessoas p JOIN emails e ON p.id = e.id_pessoa AND e.email = 'eltonferrari@gmail.com';
            $query = "SELECT e.email, p.senha, p.id, p.id_tipo FROM pessoas p JOIN emails e ON p.id = e.id_pessoa AND e.email = ?";
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

        function getNomeEmailAllPessoas() {
            $query = "SELECT e.email, p.nome FROM pessoas p JOIN emails e ON p.id = e.id_pessoa ORDER BY nome ASC";
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

        function getTipoById($id) {
            $tipo = null;
            $query = "SELECT id_tipo FROM pessoas WHERE id = ?";
            $paramType = "i";
            $paramValue = array($id);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            foreach($result as $t) {
                $tipo = $t['id_tipo'];
            }
            return $tipo;
        }
        
        function getEmailsById($idPessoa){
            $query = "SELECT * FROM emails WHERE id_pessoa = ?";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;            
        }

        function getTelefonesById($idPessoa){
            $query = "SELECT * FROM telefones WHERE id_pessoa = ?";
            $paramType = "i";
            $paramValue = array($idPessoa);
            $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
            return $result;            
        }
    }
?>