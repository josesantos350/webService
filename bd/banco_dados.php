<?php
    class BancoDados {
        private $Conexao;
        private $Servidor;
        private $Usuario;
        private $Senha;
        private $BaseDados;
        private $NumeroErro;
        private $RegistrosLidos;

        function __construct ($Servidor, $Usuario, $Senha, $BaseDados) 
        {
            $this -> $Conexao = NULL;
            $this -> Servidor = $Servidor;
            $this -> Usuario = $Usuario;
            $this -> Senha = $Senha;
            $this -> BaseDados = $BaseDados;
            $this -> $NumeroErro = -1;

        }

        public function AbrirConexao() 
        {
            $this-> Conexao = new mysqli($this-> Servidor, $this-> Usuario, $this-> Senha, $this-> BaseDados);
            if (mysqli_connect_errno() != 0) {
                $this-> Conexao = NULL;
                $this-> NumeroErro = mysqli_connect_errno();
            }
            return $this->Conexao;
        }

        public function FecharConexao() 
        {
            if ($this->Conexao == NULL) {
                return FALSE;
            }
            else {
                $this->Conexao->close();
                return TRUE;
            }

        }
        
        public function CodigoErro() 
        {
                return $this->NumeroErro;
        }

        public function LerTabela($ListaCampos = "*", $NomeTabela = "", $Condicao = "", $Ordenacao = "") 
        {
            if ($NomeTabela != "") {
                $ComandoSQL = "SELECT" . $ListaCampos . "FROM" . $NomeTabela;
               
                if ($Condicao != "") {
                    $ComandoSQL .= "WHERE" . $Condicao;
                }
                IF ($Ordenacao != "") {
                    $ComandoSQL .= "ORDER BY" . $Ordenacao;
                }
                $this->RegistrosLidos = $this->Conexao->query($ComandoSQL);
            }
            else {
                return NULL;
            }
        }

        public function Adicionar() 
        {

        }


    }
