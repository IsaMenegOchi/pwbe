<?php

    class ControllerPessoa{

        //guardamos qual metodo esta vindo
        private $_method;
        //m
        private $_modelPessoa;

        private $_codPessoa;
        
        public function __construct($model)
        {
            $this->_modelPessoa = $model;

            //esse sabe qual o meotodo que esta vindo
            $this->_method = $_SERVER["REQUEST_METHOD"];


            $json = file_get_contents("php://input"); //todos os inputs guardamos nessa variavel
            $dadosPessoa = json_decode($json);
            //se tiver um cod pessoa, passa as coisas, se não, passa nulo
            $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;

        }
        
        function router(){
            switch ($this->_method) {
                case "GET":

                    if(isset($this->_codPessoa)){
                        return $this->_modelPessoa->findById();
                    }
                    return $this->_modelPessoa->findAll();
                break;
                
                case "POST":
                    return $this->_modelPessoa->create();
                break;

                case "PUT";
                
                break;
                
                case "DELETE":
                    
                
                break;
               
               
                default:
                    # code...
                    break;
            }
        }
    }
?>