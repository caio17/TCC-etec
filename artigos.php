<?php
include_once("includes/conexao.php");
include_once("includes/texto.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">
<head>

    <link rel="shortcut icon" href="imagens/icone_etec.png" >
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Página dos Artigos</title>
	<!-- Bootstrap e FontAwsome CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link href="css/fontawesome-all.css" rel="stylesheet">

	<!-- Menu Lateral e Tabela CSS -->
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
			<div class="jumbotron mx-auto">
			<div class="col-md-3 mt-2">
				<a href="cadastrar_artigo.php" class="btn btn-success h2">Novo Artigo</a>
			</div>
			<hr/>
			<div class="table-responsive">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>CD</th>
							<th>Artigo</th>
							<th>Descrição</th>
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>
<?php
							
	$select="SELECT * FROM `tb_artigo` WHERE `st_noticia` = 0 "; 
		if ($con=$mysqli->query($select)) {
			while ($obj= $con->fetch_object()) {
				echo "<tr>";
				echo "<td>".$obj->cd_artigo."</td>";
				echo "<td>".$obj->nm_artigo."</td>";
				echo "<td>". limita_caracteres($obj->ds_conteudo, 140, false).'<a href="artigo.php?view=0&itens='.$obj->cd_artigo.'"> Ler Mais</a>'."</td>";
				echo '<td class="actions">';
				echo '<a href="artigo.php?view=0&itens='.$obj->cd_artigo.'" TYPE="BUTTON" NAME="submit" class="btn btn-success btn-xs botao" >Visualizar</a>';
				echo '<a href="alterar_artigo.php?edit=0&itens='.$obj->cd_artigo.'" TYPE="BUTTON" NAME="submit" class="btn btn-warning btn-xs botao">Editar</a>';
				echo '<a class="btn btn-danger btn-xs botao" style="color:white;" data-toggle="modal" data-target="#delete-modal';
										echo $obj->cd_artigo.'">Excluir</a>';
				echo '</td>';
				echo "</tr>";
			}
		}else{
			echo "Não há nenhum item cadastrado!";
		}            
							
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
    $selectmodal="SELECT * FROM `tb_artigo`";
    if ($con=$mysqli->query($selectmodal)) {
    while ($obj= $con->fetch_object()) {

echo '<div class="modal fade" id="delete-modal';
echo $obj->cd_artigo . '" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content corverdinha">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Excluir Artigo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este artigo?
      </div>
      <div class="modal-footer">
        <a href="excluir_artigo.php?cd=';
        echo $obj->cd_artigo . ' " class="btn btn-primary corverdinha">Sim</a>
    <button type="button" class="btn btn-default " data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>';
        }
    }
    ?>

<style type="text/css">

	.botao{
		width: 100%;
	}
			
</style>
		<!-- JavaScript -->
		<script src="js/jquery.min.js" ></script>
		<script src="js/popper.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/slick.min.js" ></script>
		<script src="js/per.js"></script>
		<script src="js/footer-navbar-segundamento.js"></script>
	</body>
</html>