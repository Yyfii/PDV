<?php
include '../model/conexao.php';
echo $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDV - Vendas</title>
    <link rel="stylesheet" href="../CSS/reset.css" />
    <link rel="stylesheet" href="../CSS/create.css" />
    <link rel="stylesheet" href="../CSS/hover-icon.css">
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
            <div class="top-header">
                <h1 id="top-tittle">Editar Produto</h1>
                <div class="icons-table">
                <div class="td-group">
                    <a>
                        <img src="https://yyfii.github.io/img_codepen/edit.png" alt="edit" class="icon" id="enable" />
                        <span id="edit" class="icon-hover">Habilitar Edição</span>
                    </a>
                </div>
                </div>
            </div>

            <form action="../model/product/update.php" method="post">
                <?php
                $sql = "SELECT * FROM `Produto` WHERE produto_id = $id";
                $buscar = mysqli_query($conexao, $sql);
                while($array = mysqli_fetch_array($buscar)){
                    $id_produto = $array['produto_id'];
                    $name = $array['nome'];
                    $preco = $array['preco'];
                    $qtd = $array['qtd'];
                    $categoria_id = $array['categoria_id'];
                    $fornecedor_id = $array['fornecedor_id'];
                ?>
                <div class="itens-form">
                    <div class="data-form">

                    <label for="id">COD:</label>
                    <input type="text" id="id" name="id" value="<?php echo $id ?>" style="display: none;"/>

                    <label for="nome_produto">Nome do Produto:</label>
                    <input type="text" id="nome_produto" class="disabled" name="nome_produto" value="<?php echo $name ?>" disabled/>

                    <label for="preco_produto">Preço do Produto:</label>
                    <input class="disabled"
                        type="number"
                        id="preco_produto"
                        name="preco_produto"
                        step="0.01"
                        value="<?php echo $preco ?>" disabled
                    />
                    <label for="qtd_produto">Quantidade do Produto:</label>
                    <input
                    class="disabled"
                        type="number"
                        id="qtd_produto"
                        name="qtd_produto"
                        min="0"
                        value="<?php echo $qtd ?>" disabled
                    />
                    <div class="categorias">
                        <label for="categoria">Categoria: </label>
                        <select name="categoria_id" id="categoria" disabled class="disabled">
                        <?php
                            $sqlCate = "SELECT categoria_id, categoria_name FROM `Categoria`";
                            $buscaCate = mysqli_query($conexao, $sqlCate);
                            while($array = mysqli_fetch_array($buscaCate)){
                                $idCate = $array['categoria_id'];
                                $nameCate = $array['categoria_name'];
                                $selected = ($idCate == $categoria_id) ? 'selected' : '';  // Seleciona a categoria atual
                        ?>
                        <option value='<?php echo $idCate?>' <?php echo $selected ?>><?php echo $nameCate ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="fornecedores">
                        <label for="fornecedor">Fornecedor: </label>
                        <select name="fornecedor" id="fornecedor" disabled class="disabled">
                        <?php
                            $sqlFor = "SELECT fornecedor_id, nome FROM `Fornecedor`";
                            $buscaFor = mysqli_query($conexao, $sqlFor);
                            while($array = mysqli_fetch_array($buscaFor)){
                                $idFor = $array['fornecedor_id'];
                                $nameFor = $array['nome'];
                                $selected = ($idFor == $fornecedor_id) ? 'selected' : '';  // Seleciona o fornecedor atual
                        ?>
                        <option value='<?php echo $idFor?>' <?php echo $selected ?>><?php echo $nameFor ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    </div>
                    <input type="submit" value="Editar Produto" />
                </div>
                <?php } ?>
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
