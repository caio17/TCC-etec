<?php
	include_once("includes/conexao.php");
  $itens = $_GET['itens'];
	$ds_artigo= "SELECT * FROM `tb_artigo` WHERE cd_artigo = $itens ";
	if($artigo = $mysqli->query($ds_artigo)){
	}else {
		echo "Não foi!!!!";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
  <meta charset="utf-8">

  <link rel="shortcut icon" href="imagens/icone_etec.png" >
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap e FontAwsome CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link href="css/fontawesome-all.css" rel="stylesheet">
  <!-- Menu Lateral e Tabela CSS -->
  <link href="css/menu-lateral.css" rel="stylesheet">
  <link href="css/layout_form.css" rel="stylesheet">

    <style>
      @media (min-width: 990px) {
        #foto_artigo {
          width: 40%;
          height: auto;
          float:left;
          position:relative;
        }
      }

      #foto_artigo {
          width: 100%;
          height: auto;
          position:relative;
        }
    </style>
  </head>
  <body>


	<?php
    include_once ("includes/menu-adm.php");
    while($obj = $artigo->fetch_object()){
	?>
          
          <div class="mt-5"> 
			<?php
				echo '<h1> <div class="mx-auto pt-3 pb-3 text-center">'. $obj->nm_artigo .'</div></h1>';
        echo '<title>'.$obj->nm_artigo.'</title>';
			?>   
      </div>
  <?php
	echo '<div class="mt-2 mt-sm-0" id="foto_artigo"><div class="mx-auto pt-3 pb-5 text-center">
  <img class="img-fluid" src="'.$obj->nm_foto.'"></div></div>';
?>

	<div class="ml-5 mr-5 mb-3" align="justify">
		<?php
				echo $obj->ds_conteudo;
		?>
	</div>
	<?php
	}
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
