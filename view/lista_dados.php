<?php
require_once "bd/banco_dados.php";
require_once "bd/configuracao.php";

$Tabela = "";
$Retorno = "";
$Ordenacao = "";

$ConexaoBaseDados = new BancoDados($Servidor, $Usuario, $Senha, $BaseDados);

if ($ConexaoBaseDados->AbrirConexao() == NULL) {
    $Retorno .= '{"Erro"}:' . '"Erro na conexao com a base de dados! <br> Nro. do erro ["'.$ConexaoBaseDados->CodigoErro(). '"]"';
}
else {
    if ($Tabela == "veiculo") {
        $Campos = "Descricao_Marca, Descricao_Modelo, Descricao_Tipo";
        
    }
    if ($Tabela == "marca") {
        $Ordenacao = "Descricao_marca";
    }

}