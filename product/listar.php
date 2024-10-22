<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Venda</title>
    <link rel="stylesheet" href="../CSS/list.css">
</head>
<body>
    <!--Deveria ter as informações de quem está vendendo, hora, opção de cancelar venda-->
    <div class="top">
        <a href="../index.php"><button id="add">
            <img src="https://yyfii.github.io/img_codepen/carrinho-de-compras.png"/>
            <p>Novo Produto</p></button></a>
    </div>
    <div class="container">
        <h1>Estoque</h1>
    <!--o estoque.php é um arquivo que vai ser o intermediario entre o banco e o sistema, ele vai receber os dados e enviar para o banco de dados-->
    <!--Pesquisar produtos, editar produtos, deletar produtos-->
        <form action="#" method="POST">
            <table>
    <!--Deve trazer a lista de produtos que vai ser vendida-->
                <thead>
                    <tr class="head-table">
                        <th class="count-h">#</th>
                        <th>Produto</th>
                        <th>Preço $</th>
                        <th>Quantidade</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php
                            include '../model/conexao.php';
                            $sql = "SELECT * FROM `Produto`";
                            $busca = mysqli_query($conexao, $sql);
                            while($array = mysqli_fetch_array($busca)){
                                $id = $array['produto_id'];
                                $name = $array['nome'];
                                $preco = $array['preco'];
                                $qtd = $array['qtd'];
                            
                        ?>
                        <tr class="row">
                            <td class="count"><?php echo $id ?></td>
                            <td><?php  echo $name ?></td>
                            <td>R$ <?php echo $preco ?></td>
                            <td><?php echo $qtd ?></td>
                            <td class="icons-table">
                                <div class="td-group">
                                    <a href="#">
                                        <img src="https://yyfii.github.io/img_codepen/icons8-cancelar-50.png" alt="delete" class="icon"/>
                                        <span id="excluir" class="icon-hover">Excluir</a>
                                    </a>
                                    
                                </div>
                                <div class="td-group">
                                    <a href="edit.php?id=<?php echo $id ?>">
                                        <img src="https://yyfii.github.io/img_codepen/edit.png" alt="edit" class="icon" />
                                        <span id="edit"  class="icon-hover">Editar</a>
                                    </a>
                                    
                                </div>
                                <div class="td-group">
                                    <a href="#">
                                        <img src="https://yyfii.github.io/img_codepen/icons8-conexão-desligada-50.png" alt="more" class="icon" />
                                        <span id="more"  class="icon-hover">Detalhes</a>
                                    </a>
                                    
                                </div>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <script src="../JS/list.js"></script>
</body>
</html>
