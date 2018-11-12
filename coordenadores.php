<?php
	include_once("includes/conexao.php");
	include_once("includes/texto.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
		<meta charset="utf-8">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="shortcut icon" href="imagens/icone_etec.png" >
		<!-- Bootstrap e FontAwsome CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link href="css/fontawesome-all.css" rel="stylesheet">

	<!-- Menu Lateral e Tabela CSS -->
	<link href="css/menu-lateral.css" rel="stylesheet">
	<link href="css/layout_form.css" rel="stylesheet">
<title>Página dos Coordenadores</title>

</head>

<style>

@media (min-width: 576px){
	.botao{
		width: 70%;
	}
}

.botao{
		width: 24%;
	}

	      

</style>
<body>

	<?php
			include_once ("includes/menu-adm.php");
      	?>
		<div id="container-form">
			<?php
				include_once ("includes/fundo.html");
			?>


	<div class="container-fluid jumbotron corverdinha mx-sm-auto">
		<div class="row justify-content-around">
			<div class="col-md-3 col-12 mt-2 ml-auto pr-0">
					<a href="cadastrar_coordenador.php" class="btn btn-success form-control my-2 my-sm-0" style="padding:2px; margin-bottom:5px;">Cadastrar Coordenador</a>
			</div>

			<div class="col-md-3 col-12 mt-2 mx-md-auto pr-0">
				<a href="cadastrar_horario.php" class="btn btn-success form-control my-2 my-sm-0" style="padding:2px; margin-bottom:5px;">Cadastrar Horário</a>
			</div>
		</div>
		<div id="list" class="row" style="margin-top:5px;">
			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>CD</th>
							<th>Coordenador</th>
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!--Mostrar conteúdo da tabela-->
						 	<?php
								$select="SELECT * FROM `tb_usuario` WHERE `id_tipo` = 1 ORDER BY  `cd_usuario` ASC ";
									if ($con=$mysqli->query($select)) {
										while ($obj= $con->fetch_object()) {
											echo  "<td>".$obj->cd_usuario."</td>";
											echo "<td>".$obj->nm_usuario." ".$obj->nm_sobrenome."</td>";
											echo '<td> <a href="coordenador.php?view=0&itens='.$obj->cd_usuario.'" TYPE="BUTTON" NAME="submit" class="btn btn-success btn-xs botao" >Visualizar</a>';
											echo ' <a href="alterar_coordenador.php?edit=0&itens='.$obj->cd_usuario.'" TYPE="BUTTON" NAME="submit" class="btn btn-warning btn-xs botao">Editar</a>';
											echo ' <a href="alterar_horario.php?edit=0&itens='.$obj->cd_usuario.'" TYPE="BUTTON" NAME="submit" class="btn btn-warning btn-xs botao">Editar Horário</a>';
											echo ' <a class="btn btn-danger btn-xs botao" style="color:white;" data-toggle="modal" data-target="#delete-modal';
											echo $obj->cd_usuario.'">Excluir</a>';
											echo '</td>
											</tr>';
										}
									}else{
											echo "Não há nenhum item cadastrado!";
									}
							?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
	</div>
</div>

		<!-- JavaScript -->
		<script src="js/jquery.min.js" ></script>
		<script src="js/popper.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/footer-navbar-segundamento.js"></script>


	</body>

</html>
<?php
    $selectmodal="SELECT * FROM `tb_usuario`";
    if ($con=$mysqli->query($selectmodal)) {
    while ($obj= $con->fetch_object()) {

echo '<div class="modal fade" id="delete-modal';
echo $obj->cd_usuario . '" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title" id="modalLabel">Excluir Coordenador</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
		      </div>
		      <div class="modal-body">
		        Deseja realmente excluir este coordenador '.$obj->nm_usuario.'?
		      </div>
		      <div class="modal-footer">
		        <a href="excluir_coordenador.php?cd=';
		        echo $obj->cd_usuario . '" class="btn btn-danger">Excluir</a>
		    	<button type="button" class="btn btn-default " data-dismiss="modal">Cancelar</button>
		      </div>
		    </div>
  		</div>
  	</div>';
        }
    }
    ?>
