<?php

    class ModelPessoa{
        private $_conn;

        public function __construct($conn){
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
            return $statement->fetchAll();
        }
    }




?>