<?php
include_once("includes/conexao.php");
$itens = $_GET['itens'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" href="css/fontawesome.css" >
    <link rel="stylesheet" href="css/slick.css" >
    <link rel="stylesheet" href="css/slick-theme.css" >
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
    <title>Alterar Artigo</title>
  </head>
  <body>
    <form method="post">
      <?php
        $select="SELECT * FROM `tb_artigo` WHERE `cd_artigo` = $itens ";
        if ($con=$mysqli->query($select)) {
          while ($obj= $con->fetch_object()) {
            echo '<div class="container-fluid">
                    <div class="jumbotron mx-sm-auto">
                      <div class="form-group">
                        <label for="artigo"><b>Nome do Artigo:</b></label>
                        <div class="row">
                          <div class="col-11">
                            <input type="text" class="form-control" name="artigo" value="'.$obj->nm_artigo.'" required autofocus>
                          </div>
                        </div>
                        <label for="foto"><b>Foto:</b></label>
                        <div class="form-row">
                          <div class="col-sm-11 col-10">
                            <input type="text" class="form-control" name="foto" value="'.$obj->nm_foto.'" required autofocus>
                          </div>
                        </div>
                        <label for="noticia"><b>Noticia:</b></label>
                        <div class="form-row">
                          <div class="col-sm-11 col-10">
                            <input type="text" class="form-control" name="noticia" value="'.$obj->st_noticia.'" required autofocus>
                          </div>
                        </div>
                      </div>
                      <label for="conteudo"><b>Conteudo:</b></label>
                      <div class="form-row">
                        <div class="col-sm-11 col-10">
                          <input type="text" class="form-control" name="conteudo" value="'.$obj->ds_conteudo.'" required autofocus>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <button type="submit" class="btn btn-info botao" name="botion">Enviar</button>
                        </div>
                      </div>
                    </div>
                  </div>';
        }}else{
          echo "Não há nenhum item cadastrado!";
        }   

        if (isset($_POST['botion'])) {
          $artigo = $_POST['artigo'];
          $foto = $_POST['foto'];
          $noticia = $_POST['noticia'];
          $conteudo = $_POST['conteudo'];
          $select1="UPDATE `tb_artigo` SET `nm_artigo`='$artigo',`nm_foto`='$foto',`st_noticia`='$noticia',`ds_conteudo`='$conteudo',`id_administrador`='1' WHERE `cd_artigo` = $itens ";
            if ($mysqli->query($select1)) {
      ?>
      <script type="text/javascript">
        alert('Alterado com sucesso!');
        document.location="artigos.php";
      </script>
      <?php
        }else{
      ?>
      <script type="text/javascript">
        alert('Erro ao alterar!');
        document.location="artigos.php";
      </script>
      <?php
        }}
      ?>       
    </form>

    <!-- JavaScript -->
    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/slick.min.js" ></script>
    <script src="js/per.js"></script>
  </body>
</html>
