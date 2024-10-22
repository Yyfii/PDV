<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDV - Vendas</title>
    <link rel="stylesheet" href="../../CSS/create.css" />
  </head>
  <body>
    <!--Cadastro de Fornecedores-->
    <div class="container">
      <h1>Cadastrar Fornecedor</h1>
        <form action="create.php" method="post">
          <div class="itens-form">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required />

            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              required
            />
            <label for="telefone">Telefone:</label>
            <input
              type="tel"
              id="telefone"
              name="telefone"
            />
            <div class="categorias">

              <label for="setor">Setor: </label>
              <select name="setor" id="setor">
                <?php
                            include 'model/conexao.php';
                            $sqlSetor = "SELECT * FROM `Setor`";
                            $buscaSetor = mysqli_query($conexao, $sqlSetor);
                            while($array = mysqli_fetch_array($buscaSetor)){
                                $idSetor = $array['setor_id'];
                                $nameSetor = $array['name'];
                        ?>
                <option value='<?php echo $idSetor ?>'><?php echo $nameSetor ?></option>
                <?php } ?>
              </select>
              
            </div>
            <div class="fornecedores">
              <label for="fornecedor">Fornecedor: </label>
              <select name="fornecedor" id="fornecedor">
                <option value=" " selected disabled>Selecione</option>
                <option value="fornecedorA">fornecedor A</option>
                <option value="fornecedorB">fornecedorB</option>
                <option value="fornecedorC">fornecedorC</option>
              </select>
            </div>
            <input type="submit" value="Cadastrar Produto" />
          </div>
        </form>
    </div>
  </body>
</html>
