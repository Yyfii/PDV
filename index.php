<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDV - Vendas</title>
    <link rel="stylesheet" href="CSS/create.css" />
  </head>
  <body>
    <!--Cadastro de Produtos-->
    <div class="container">
      <h1>Cadastrar Produto</h1>
        <form action="product/create.php" method="post">
          <div class="itens-form">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" id="nome_produto" name="nome_produto" required />

            <label for="preco_produto">Preço do Produto:</label>
            <input
              type="number"
              id="preco_produto"
              name="preco_produto"
              step="0.01"
              required
            />
            <label for="qtd_produto">Quantidade do Produto:</label>
            <input
              type="number"
              id="qtd_produto"
              name="qtd_produto"
              min="0"
              required
            />
            <div class="categorias">

              <label for="categoria">Categoria: </label>
              <select name="categoria_id" id="categoria" required>
              <option selected>Selecione</option>
                <?php

                            include 'model/conexao.php';
                            $sql = "SELECT * FROM `Categoria`";
                            $busca = mysqli_query($conexao, $sql);
                            while($array = mysqli_fetch_array($busca)){
                                $id = $array['categoria_id'];
                                $name = $array['categoria_name'];
                        ?>
                <option value='<?php echo $id ?>'><?php echo $name ?></option>
                <?php }?>
              </select>
            </div>
            <div class="fornecedores">

              <label for="fornecedor">Fornecedor: </label>
              <select name="fornecedor_id" id="fornecedor">
                <option selected>Selecione</option>
                <?php
                      include 'model/conexao.php';
                      $sqlF = "SELECT * FROM `Fornecedor`";
                      $buscaF = mysqli_query($conexao, $sqlF);
                      while($array = mysqli_fetch_array($buscaF)){
                          $idF = $array['fornecedor_id'];
                          $nameF = $array['nome'];
                  ?>
                  <option value='<?php echo $idF ?>'><?php echo $nameF ?></option>
                  <?php } ?>
              </select>

            </div>

            <input type="submit" value="Cadastrar Produto" />
          </div>
        </form>
    </div>
  </body>
</html>
