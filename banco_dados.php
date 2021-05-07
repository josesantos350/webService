<?php
    class BancoDados {
        private $Conexao;
        private $Servidor;
        private $Usuario;
        private $Senha;
        private $BaseDados;
        private $NumeroErro;
        private $RegistrosLidos;

        function __construct ($Servidor, $Usuario, $Senha, $BaseDados) {
            $this -> $Conexao = NULL;
            $this -> Servidor = $Servidor;
            $this -> Usuario = $Usuario;
            $this -> Senha = $Senha;
            $this -> BaseDados = $BaseDados;
            $this -> $NumeroErro = -1;

        }

        public function AbrirConexao() {
            $this-> Conexao = new mysqli($this-> Servidor, $this-> Usuario, $this-> Senha, $this-> BaseDados);
            if (mysqli_connect_errno() != 0) {
                $this-> Conexao = NULL;
                $this-> NumeroErro = mysqli_connect_errno();
            }
            return $this->Conexao;
        }

        public function FecharConexao() {
            if ($this->Conexao == NULL) {
                return FALSE;
            }
            else {
                $this->Conexao->close();
                return TRUE;
            }

        }
        
        public function CodigoErro() {
                echo teste 21
        }

        public function LerTabela() {

        }

        public function Adicionar() {

        }


    }
