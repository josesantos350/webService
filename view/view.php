
<!DOCTYPE html>
<html>
      <header>
            <meta charset="UTF-8">
            <meta nome="viewport" content="width=device-width, initial-scale=1">
            <title></title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
      </header>
      <body>  
      <h1>Exibição de WebService</h1>
     <?php       
      require_once "bd/banco_dados.php";
      require_once "bd/configuracao.php";

      $ConexaoBaseDados = new BancoDados($Servidor, $Usuario, $Senha, $BaseDados);

      if ($ConexaoBaseDados->AbrirConexao() == NULL) {
            echo "ERRO: Erro na conexao com a base de dados! <br> Nro. do erro [".$ConexaoBaseDados->CodigoErro()."]";
      } else {
            $Registros = $ConexaoBaseDados->LerTabela("*", "marca","", "Codigo_Marca"); 
            
            if ($Registros != NULL) {
            
                  if ($Registros->num_rows > 0) {
                      
                        while ($DadosRegistros = $Registros->fetch_assoc()) {
                              echo "<h3>" . $DadosRegistros["Codigo_Marca"]. "-" . $DadosRegistros["Descricao_Marca"] . "<h3>";
                        }
                  } else  {
                        echo "ERRO: Nemhum registro encontrado na tabela [Marca]";
                  }
            } else {
                  echo "ERRO: Problema na leitura da tabela [Marca]";
            }
      }
      
      $ConexaoBaseDados->FecharConexao();
      echo time();
      ?>
            <div class="container">
            </div>

            <script src="js/jquery-3.6.0.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
      </body>
</html>