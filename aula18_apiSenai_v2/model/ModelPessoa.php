<?php

    class ModelPessoa{
        private $_conn;
        private $_codPessoa;

        private $_nome;
        private $_sobrenome;
        private $_email;
        private $_celular;
        private $_fotografia;

        public function __construct($conn){

             // premite reveber dados json atraves da requisição
             $json = file_get_contents("php://input"); //todos os inputs guardamos nessa variavel
             $dadosPessoa = json_decode($json);
 
             //
             $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;

             //*dados por meio de jason
             $this->_nome = $dadosPessoa->nome ?? null;
             $this->_sobrenome = $dadosPessoa->sobrenome ?? null;
             $this->_email = $dadosPessoa->email ?? null;
             $this->_celular = $dadosPessoa->celular ?? null;
             $this->_fotografia = $dadosPessoa->fotografia ?? null;

            //*dados por meio de post
            //  $this->_nome = $_POST["nome"] ?? null;
            //  $this->_sobrenome = $_POST["sobrenome"] ?? null;
            //  $this->_email = $_POST["email"] ?? null;
            //  $this->_celular = $_POST["celular"] ?? null;
            //  $this->_fotografia = $_FILES["fotografia"]["name"] ?? null;

            //a conexão é a conexão vinda de fora
            $this->_conn = $conn;
           
        }

        public function findAll(){
            //instruçã SQL
            $sql = "SELECT * FROM tbl_pessoa";

            //prepara um processo de execução de instrução SQL
            //representa uma statment
            $statement = $this->_conn->prepare($sql);
            //faz com que execute o que pedirmos
            $statement->execute();
            //devolve os valores da select para serem utilizados
                //FETCH ASSOC - faz com que o array seja apeas associativo e não numerico na hora e exibir os dados
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function findById(){
            //colocamos uma interrogação pois não devemos colocar a variavel direto, e sim trata-la posteriormente
            $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = ?";
            
            $stm = $this->_conn->prepare($sql);

            //seta UM valor, que é o cod pessoa
          
            $stm->bindValue(1, $this->_codPessoa);

            $stm->execute();

            return $stm->fetchAll(\PDO::FETCH_ASSOC); 

        }

        public function create() {
            $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia) VALUES (?, ?, ?, ?, ?)";

            $extension = pathinfo($this->_fotografia, PATHINFO_EXTENSION);
            $novoNomeArquivo = md5(microtime()) . ".$extension";

            move_uploaded_file($_FILES["fotografia"]["tmp_name"], "../upload/$novoNomeArquivo");

            $stm = $this->_conn->prepare($sql);
          
            $stm->bindValue(1, $this->_nome);
            $stm->bindValue(2, $this->_sobrenome); 
            $stm->bindValue(3, $this->_email);
            $stm->bindValue(4, $this->_celular);
            $stm->bindValue(5, $novoNomeArquivo);

            if ($stm->execute()) {
                return "|Success|"; 
            }
            else{
                return "|You FALEID|"; 
            }
            

        }

        public function update(){

            $sql = "UPDATE tbl_pessoa SET 
            nome = ?,
            sobrenome = ?,
            email = ?,
            celular = ?,
            fotografia = ?
            WHERE cod_pessoa = ?";

            $stmt = $this->_conn->prepare($sql);

            $stmt->bindValue(1, $this->_nome);
            $stmt->bindValue(2, $this->_sobrenome);
            $stmt->bindValue(3, $this->_email);
            $stmt->bindValue(4, $this->_celular);
            $stmt->bindValue(5, $this->_fotografia);
            $stmt->bindValue(6, $this->_codPessoa);

            if ($stmt->execute()) {
                return "Dados alterados com sucesso!";
            }

        }

        public function delete(){

            $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = ?";

            $stmt = $this->_conn->prepare($sql);

            $stmt->bindValue(1, $this->_codPessoa);

            if ($stmt->execute()) {
                return "Dados excluídos com sucesso!";
            }

        }

        // public function update() {
        //     $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia) VALUES (?, ?, ?, ?, ?)";

        //     $stm = $this->_conn->prepare($sql);
          
        //     $stm->bindValue(1, $this->_nome);
        //     $stm->bindValue(2, $this->_sobrenome); 
        //     $stm->bindValue(3, $this->_email);
        //     $stm->bindValue(4, $this->_celular);
        //     $stm->bindValue(5, $this->_fotografia);

        //     $stm->execute();

        //     return $stm->fetchAll(\PDO::FETCH_ASSOC); 
        // }

        // public function delete() {
        //     $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia) VALUES (?, ?, ?, ?, ?)";

        //     $stm = $this->_conn->prepare($sql);
          
        //     $stm->bindValue(1, $this->_nome);
        //     $stm->bindValue(2, $this->_sobrenome); 
        //     $stm->bindValue(3, $this->_email);
        //     $stm->bindValue(4, $this->_celular);
        //     $stm->bindValue(5, $this->_fotografia);

        //     $stm->execute();

        //     return $stm->fetchAll(\PDO::FETCH_ASSOC); 

        // }
    }
