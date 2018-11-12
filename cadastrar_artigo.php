<?php
  include_once("includes/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar Artigos</title>

    <!-- BootstrapCSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!-- Menu Lateral e Jumbotron CSS -->
    <link href="css/menu-lateral.css" rel="stylesheet">
    <link href="css/layout_form.css" rel="stylesheet">

  </head>
  <body>
    <!--Menu Lateral-->
    <?php
      include_once ("includes/menu-adm.php");
    ?>
    <div id="container-form">
      <?php
        include_once ("includes/fundo.html");
      ?>
      <form method="post">
        <div class="container-fluid">
          <div class="jumbotron mx-sm-auto">
            <div class="mx-auto pt-3 pb-3 text-center">
            <h1>Cadastrar Artigos</h1>
          </div>
            <div class="form-group ml-2 mr-2">
              <label for="artigo"><b>Nome do artigo:</b></label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" name="nome" required autofocus>
                </div>
              </div>
              <label for="link"><b>Link da Foto do Artigo:</b></label>
              <div class="form-row">
                <div class="col-12">
                  <input type="text" class="form-control" name="foto" value="foto-artigos/" required>
                </div>
              </div>
              <label for="conteudo"><b>Conteúdo:</b></label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" name="conteudo" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mx-auto pt-2 text-center">
                <button type="submit" name="butao" class="btn btn-info">Cadastrar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php
      if (isset($_POST['butao'])) {
          $nome = $_POST['nome'];
          $foto = $_POST['foto'];
          $conteudo = $_POST['conteudo'];
          $select="INSERT INTO `tb_artigo`(`nm_artigo`, `nm_foto`, `st_noticia`, `ds_conteudo`, `id_usuario`) VALUES ('$nome','$foto','0','$conteudo','1')";
            if ($mysqli->query($select)) {
    ?>
    <script type="text/javascript">
      alert('Cadastrado com sucesso!');
      document.location="artigos.php";
    </script>
    <?php
      }else{
        ?>
    <script type="text/javascript">
      alert('Erro ao cadastrar!');
      document.location="artigos.php";
    </script>
    <?php
        
      }}
    ?>

    <!-- JavaScript -->
    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/slick.min.js" ></script>
    <script src="js/per.js"></script>
    <script src="js/footer-navbar-segundamento.js"></script>
  </body>
</html>
