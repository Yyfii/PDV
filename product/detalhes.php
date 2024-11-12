<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDV - Vendas</title>
    <link rel="stylesheet" href="../CSS/reset.css" />
    <link rel="stylesheet" href="../CSS/dashboard-style.css" />
    <link rel="stylesheet" href="../CSS/list.css">
  </head>
  <body>
    <div id="header">
      <button id="show-sidebar"><i class="fa-solid fa-bars"></i></button>
      <div class="right">
        <div id="btnSale">+ Nova Venda</div>
      </div>
    </div>
    <div id="sidebar">
      <button id="close-sidebar"><i class="fa-solid fa-xmark"></i></button>
      <div id="accordian">
        <ul class="show-dropdown main-navbar">
          <div class="selector-active">
            <div class="top"></div>
            <div class="bottom"></div>
          </div>
          <li id="user">
            <a href="javascript:void(0);">
              <div class="perfil">
                <img
                  src="https://yyfii.github.io/img_codepen/avatarFemale.png"
                  alt="Perfil"
                />
              </div>
              <div id="text">
                <span class="item">Gerente</span>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="fas fa-tachometer-alt"></i
              ><span class="item">Dashboard</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="far fa-address-book"></i
              ><span class="item">Funcionários</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="far fa-clone"></i><span class="item">Clientes</span></a
            >
          </li>
          <li class="active">
            <a href="javascript:void(0);"
              ><i class="fa-regular fa-clipboard"></i
              ><span class="item">Produtos</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="fa-solid fa-truck-field-un"></i
              ><span class="item">Fornecedores</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="fas fa-money-check-alt"></i
              ><span class="item">Financeiro</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="fa-solid fa-money-bill-trend-up"></i
              ><span class="item">Vendas</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="far fa-envelope"></i
              ><span class="item">Mensagens</span></a
            >
          </li>
          <li id="btnExit">
            <a href="javascript:void(0);"
              ><i id="exit" class="fa-regular fa-circle-xmark"></i
              ><span class="item">Sair</span></a
            >
          </li>
        </ul>
      </div>
    </div>

    <!--Conteúdo da página-->
    <div id="content">
         <!--Deveria ter as informações de quem está vendendo, hora, opção de cancelar venda-->
      <div class="options">
        <div class="top">
            <a href="create-product.php"><button id="add">
                <img src="https://yyfii.github.io/img_codepen/carrinho-de-compras.png"/>
                <p>Novo Produto</p></button></a>
        </div>
        <div class="listar">
          <a href="listar.php">
            <button id="estoque">
            <i class="fa-solid fa-list"></i>
                <p>Estoque</p>
              </button>
            </a>
        </div>
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
                                      <a onclick="openConfirmation()">
                                          <img src="https://yyfii.github.io/img_codepen/icons8-cancelar-50.png" alt="delete" class="icon"/>
                                          <span id="excluir" class="icon-hover">Excluir</span>
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
              <div id="confirmationPopup" class="popup">
                  <div class="popup-content">
                  <p>Tem certeza de que deseja deletar este produto?</p>
                  <button onclick="confirmDelete()"><a href="../model/product/delete.php?id=<?php echo $id ?>">Sim</a></button>
                  <button onclick="closeConfirmation()">Não</button>
                  </div>
              </div>

          </form>
      </div>
    
    </div>
    <script src="../JS/list.js"></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-3.6.0.min.js"
    ></script>
    <script src="../JS/sidebar.js"></script>
    <script
      src="https://kit.fontawesome.com/84d7270ddc.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
