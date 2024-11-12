<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDV - Vendas</title>
    <link rel="stylesheet" href="../CSS/reset.css" />
    <link rel="stylesheet" href="../CSS/create.css" />
    <link rel="stylesheet" href="../CSS/dashboard-style.css" />
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
          <li>
            <a href="javascript:void(0);"
              ><i class="fa-regular fa-clipboard"></i
              ><span class="item">Produtos</span></a
            >
          </li>
          <li  class="active">
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
                <a href="create-fornecedor.php"><button id="add">
                <i class="fa-solid fa-square-plus"></i>
                    <p>Novo Fornecedor</p></button></a>
            </div>
            <div class="listar">
            <a href="listar.php">
                <button id="estoque">
                <i class="fa-solid fa-list"></i>
                    <p>Lista de Fornecedores</p>
                </button>
                </a>
            </div>
        </div>
        <div class="container">
            <h1>Cadastrar Fornecedor</h1>
              <form action="create.php" method="post">
                <div class="itens-form">
                    <label for="nome_fornecedor">Nome:</label>
                    <input class="nome" type="text" id="nome_fornecedor" name="nome_fornecedor" placeholder="Digite aqui" required />

                    <label for="email">Email:</label>
                    <input class="nome" type="email" id="email" name="email" placeholder="Digite aqui" required />

                    <label  for="tel1">Telefone 1:</label>
                    <input class="nome" type="tel" id="tel1" name="tel1" placeholder="Digite aqui" required />

                    <label for="tel2">Telefone 2:</label>
                    <input class="nome" type="tel" id="tel2" name="tel2" placeholder="Digite aqui" required />
                    <label for="pix">PIX:</label>
                    <input class="nome" type="text" id="pix" name="pix" placeholder="Digite aqui" required />
                    <div class="categorias">
                    <label for="setor">Setor: </label>
                    <select name="setor_id" id="setor" class="select" required>
                        <option selected>Selecione</option>
                        <?php
                                    include '../model/conexao.php';
                                    $sql = "SELECT * FROM `Setor`";
                                    $busca = mysqli_query($conexao, $sql);
                                    while($array = mysqli_fetch_array($busca)){
                                        $id = $array['setor_id'];
                                        $name = $array['nome'];
                                ?>
                        <option value='<?php echo $id ?>'><?php echo $name ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="button-wrapper">
                    <input type="submit" value="Salvar" />
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
