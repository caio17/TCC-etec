<?php
include_once("includes/conexao.php");
$itens = $_GET['itens'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Alterar Coordenadores</title>
    <!-- Ícone da pagina-->
    <link rel="shortcut icon" href="imagens/icone_etec.png" >
    <!-- CSS Bootstrap e Font Awesome-->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
    <!-- CSS da pagina-->
    <link href="css/layout_form.css" rel="stylesheet">
  
</head>

<body>
  <?php
  include_once("includes/menu-adm.php")
  ?>
  <form method="post">
    <?php
    $select="SELECT * FROM `tb_usuario` WHERE `cd_usuario` = $itens ";
    if ($con=$mysqli->query($select)) {
      while ($obj= $con->fetch_object()) {
        ?>
        <div id="container-form">
          <?php
            include_once ("includes/fundo.html");
          ?>
         <div class="jumbotron mx-sm-auto">
            <div class="mx-auto pt-3 pb-3 text-center">
            <h1>Alterar Coordenadores</h1>
          </div>
          <div class="form-group ml-2 mr-2">
             <div class="row">
               <div class="col-6">
                 <label for="nome"><b>Nome:</b></label>
                 <input type="text" class="form-control" name="nome" <?php echo 'value="'.$obj->nm_usuario.'"'; ?> required autofocus>
               </div>
               <div class="col-6">
                 <label for="snome"><b>Sobrenome:</b></label>
                 <input type="text" class="form-control" name="sobrenome"<?php echo 'value="'.$obj->nm_sobrenome.'"'; ?> required autofocus>
               </div>
             </div>

             <div class="row">
               <div class="col-12">
                 <label for="foto"><b>Foto:</b></label>
                 <input type="text" class="form-control" name="foto" <?php echo 'value="'.$obj->nm_foto.'"'; ?> required autofocus>
               </div>
             </div>

             <div class="row">
               <div class="col-12">
                 <label for="login"><b>Login:</b></label>
                 <input type="text" class="form-control" name="login" <?php echo 'value="'.$obj->nm_login.'"'; ?> required autofocus>
               </div>
             </div>

             <label for="senha"><b>Senha:</b></label>
             <div class="form-row">
               <div class="col-sm-11 col-10">
                 <input type="password" class="form-control" id="senha" name="senha" <?php echo 'value="'.$obj->nm_senha.'"'; ?> required autofocus>
               </div>
               <div class="col-sm-1 col-2">
                 <button type="button" id="olho" class="btn btn-light"><i class="fas fa-eye"></i></button>
               </div>
             </div>

             <label for="csenha"><b>Confirmar Senha:</b></label>
             <div class="form-row">
               <div class="col-sm-11 col-10">
                 <input type="password" class="form-control" id="csenha" name="csenha" <?php echo 'value="'.$obj->nm_senha.'"'; ?> required autofocus>
               </div>
               <div class="col-sm-1 col-2">
                 <button type="button" id="olho2" class="btn btn-light"><i class="fas fa-eye"></i></button>
               </div>
             </div>
             <div class="row">
               <div class="col-12 mx-auto pt-2 text-center">
                 <button type="submit" name="butao" class="btn btn-info corverdinha" >Cadastrar</button>
               </div>
             </div>
           </div>
         </div>

         <?php

       }}else{
        echo "Não há nenhum item cadastrado!";
      }

      if (isset($_POST['butao'])) {
        $senha = $_POST['senha'];
        $csenha = $_POST['csenha'];
        if ($senha == $csenha) {

          $nome = $_POST['nome'];
          $sobrenome = $_POST['sobrenome'];
          $foto = $_POST['foto'];
          $login = $_POST['login'];

          $update="UPDATE `tb_usuario` SET `nm_usuario`='$nome',`nm_sobrenome`='$sobrenome',`nm_foto`='$foto',`nm_login`='$login',`nm_senha`='$senha' WHERE `cd_usuario` = $itens ";
          if ($mysqli->query($update)) {
            ?>
            <script type="text/javascript">
              alert('Alterado com sucesso!');
              document.location="coordenadores.php";
            </script>

            <?php
          }else{
           ?>
           <script type="text/javascript">
            alert('Erro ao alterar dados!');
            document.location="coordenadores.php";
          </script>

          <?php
        }
      }else{
        ?>
        <script type="text/javascript">
          alert('Novas Senhas Não Condizem!');
          document.location="coordenadores.php";
        </script>
        <?php
      }
    }
    ?>
  </form>

  <!-- JavaScript -->
  <link href="css/menu-lateral.css" rel="stylesheet">
    <link href="css/layout_form.css" rel="stylesheet">
  <script src="js/jquery.min.js" ></script>
  <script src="js/bootstrap.min.js" ></script>
  <script src="js/per2.js"></script>
  <script src="js/footer-navbar-segundamento.js"></script>


</body>
</html>
