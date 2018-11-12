 <?php
  include_once("includes/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="imagens/icone_etec.png" >
    <title>Horário dos Coordenadores</title>
   <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Menu Lateral e Jumbotron CSS -->
    <link href="css/menu-lateral.css" rel="stylesheet">
    <link href="css/layout_form.css" rel="stylesheet">
  </head>
  <body>
  	<?php
		 include_once ("includes/menu-adm.php");
		?>

	 	<div id="container-form">
		  <?php
		  	include_once ("includes/fundo.html");
		  ?>
	    <form method="post">
		      <div class="jumbotron mx-auto p-3">
		       <div class="mx-auto pt-3 pb-3 text-center">
		       	   <h1>Cadastrar Horário</h1> </div>
		          <div class="row">
		            <div class="col-6">
		          		<label for="entrada"><b>Entrada:</b></label>
		              <input type="time" class="form-control" name="entrada" required autofocus>
		            </div>
		            <div class="col-6">
		              <label for="saida"><b>Saída:</b></label>
		              <input type="time" class="form-control" name="saida" required autofocus>
		            </div>
		          </div>
		   				<label for="semana"><b>Dia da Semana:</b></label>
		          <div class="row">
		            <div class="col-12">
		              <select name="tipo" class="form-control">
			              <option value="Segunda-feira" required autofocus> Segunda-feira
			              <option value="Terça-feira" required> Terça-feira
			              <option value="Quarta-feira" required> Quarta-feira
			              <option value="Quinta-feira" required> Quinta-feira
			              <option value="Sexta-feira" required> Sexta-feira
		              </select>
		            </div>
		          </div>
<?php
	echo '<label for="coord"><b>Coordenadores:</b></label>
		    <div class="row">
		        <div class="col-12">
		            <select name="coordenadores" class="form-control">';
		           	$select="SELECT * FROM `tb_usuario` WHERE `id_tipo` = 1";
		    		if ($con=$mysqli->query($select)) {
		    			while ($obj= $con->fetch_object()) {
		            		echo '<option value="'.$obj->cd_usuario.'" required autofocus>'.$obj->nm_usuario.' '.$obj->nm_sobrenome.'';
						}
					}else{
		  				echo 'Não há coordenadores cadastrados';
					}
?>
</option>
</select>
</div>
</div>
		        
		     <div class="row">
		          <div class="col-12 mx-auto pt-2 text-center">
		            <button type="submit" name="butao" class="btn btn-info" >Cadastrar</button>
		          </div>
		        </div>
		    </div>
			</form>
		</div>
    <?php
			if (isset($_POST['butao'])) {
		    $entrada = $_POST['entrada'];
		    $saida = $_POST['saida'];
		    $tipo = $_POST['tipo'];
		    $coordenadores = $_POST['coordenadores'];
				$insert="INSERT INTO `tb_horario_coordenador`(`hr_entrada`, `hr_saida`, `nm_dia_semana`, `id_usuario`) VALUES ('$entrada','$saida','$tipo','$coordenadores')";
 					if ($mysqli->query($insert)) {
  	?>
  	<script type="text/javascript">
      alert('Cadastrado com sucesso!');
      document.location="coordenadores.php";
    </script>
    <?php
			}else{
  	?>
  	<script type="text/javascript">
      alert('Erro ao Cadastrar!');
      document.location="coordenadores.php";
    </script>
    <?php
  		}}
		?>

    <!-- JavaScript -->
    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/slick.min.js" ></script>
    <script src="js/per2.js"></script>
    <script src="js/footer-navbar-segundamento.js"></script>
  </body>
</html>
