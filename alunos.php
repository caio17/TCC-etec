<!DOCTYPE html>
<?php
session_start();
include_once("includes/conexao.php");
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	<title>Exibir alunos</title>
	<style>
		body{
			position: fixed;
			width: 100%;
			height: 100%;
		}

		.jumbotron{
			background-color: #DFDFDF;
			width: 50%;
			height: 450px;
			margin-top: 150px;
			border-radius: 1rem;
			color: #006634;
			border: 1px #006634 solid;
		}

		.btn-nome{
			width: 100%;
			background-color: #BBB5B5;
		}

		.btn-nome:hover{
			background-color: white;
		}

		#olho{
			width: 100%;
		}

		.btn-cadastrar{
			width: 100%;
			background-color: #BBB5B5;
		}

		.btn-cadastrar:hover{
			background-color: white;
		}
		/* Skew do fundo da página*/
		.skewed-gray{
			position: absolute;
			top: 9%;
			right: 4.5%;
			width: 3%;
			height: 15%;
			background-color: gray;
			transform: skew(-60deg);
			z-index: -1;
			filter: opacity(0.4);
		}
		/* Mts */
		.mt-5{
			margin-top:3rem !important;
		}

		.mt-6{
			margin-top:6rem !important;
		}

		.mt-7{
			margin-top:9rem !important;
		}

		.mt-8{
			margin-top:12rem !important;
		}

		.mt-9{
			margin-top:15rem !important;
		}

		.mt-10{
			margin-top:18rem !important;
		}

		.mt-11{
			margin-top:21rem !important;
		}

		.mt-12{
			margin-top:24rem !important;
		}

		.mt-13{
			margin-top:27rem !important;
		}

		.mt-14{
			margin-top:30rem !important;
		}

		.mt-15{
			margin-top:33rem !important;
		}

		.mt-16{
			margin-top:36rem !important;
		}

		.mt-17{
			margin-top:39rem !important;
		}

		.mt-18{
			margin-top:42rem !important;
		}

		.mt-19{
			margin-top:45rem !important;
		}

		.mt-20{
			margin-top:48rem !important;
		}
		/* Mrs */
		.mr-5{
			margin-right:3rem !important;
		}

		.mr-6{
			margin-right:6rem !important;
		}

		.mr-7{
			margin-right:15rem !important;
		}

		.mr-8{
			margin-right:30rem !important;
		}

		.mr-9{
			margin-right:45rem !important;
		}

		.mr-10{
			margin-right:60rem !important;
		}
		/*Mls*/
		.ml-6{
			margin-left: 5.1rem !important;
		}
		/*Colunas-verdes*/
		.coluna-verde{
			position: absolute;
			top: 0;
			left: 0%;
			width: 5%;
			height: 100%;
			background-color: #006634;
			z-index: -1;
		}
</style>
</head>
<body>
	<div class="container-skew">
		<!--Primeira coluna-->
		<div class="skewed-gray mt-5"></div>
		<div class="skewed-gray mt-6"></div>
		<div class="skewed-gray mt-7"></div>
		<div class="skewed-gray mt-8"></div>
		<!--Segunda coluna-->
		<div class="skewed-gray mt-8 mr-7"></div>
		<div class="skewed-gray mt-9 mr-7"></div>
		<div class="skewed-gray mt-10 mr-7"></div>
		<div class="skewed-gray mt-11 mr-7"></div>
		<!--Terceira coluna-->
		<div class="skewed-gray mt-11 mr-8"></div>
		<div class="skewed-gray mt-12 mr-8"></div>
		<div class="skewed-gray mt-13 mr-8"></div>
		<div class="skewed-gray mt-14 mr-8"></div>
		<!--Quarta coluna-->
		<div class="skewed-gray mt-14 mr-9"></div>
		<div class="skewed-gray mt-15 mr-9"></div>
		<div class="skewed-gray mt-16 mr-9"></div>
		<div class="skewed-gray mt-17 mr-9"></div>
		<!--Quinta coluna-->
		<div class="skewed-gray mt-17 mr-10"></div>
		<div class="skewed-gray mt-18 mr-10"></div>
		<div class="skewed-gray mt-19 mr-10"></div>
		<div class="skewed-gray mt-20 mr-10"></div>
	</div>
	<div class="container-colunas">
		<div class="coluna-verde"></div>
		<div class="coluna-verde ml-6" style="width:2.5%;"></div>
	</div>

	<div class="container-fluid">
		<div class="jumbotron mx-auto pt-5 pb-2">
			<form method="post">
				<div class="form-group">
					<label for="rm">RM:</label>
					<div class="form-row">
						<div class="col-10">
							<input type="text" class="form-control" id="rm" name="rm">
						</div>
						<div class="col-2">
							<button class="btn btn-nome" name="pesquisar" value="pesquisar">Pesquisar</button>
						</div>
					</div>
					<label for="nome">NOME:</label>
					<div class="form-row">
						<div class="col-12"><input type="text" class="form-control" id="nome" disabled value="
							<?php
							if (isset($_POST['pesquisar'])) {
								$_SESSION['rm'] = $_POST['rm'];
								$rm = $_SESSION["rm"];
								$sql = "SELECT nm_aluno FROM tb_aluno WHERE nr_rm='$rm'";
								$result = $mysqli->query($sql);

								if ($result->num_rows > 0) {
											// dados de cada row
									$row = $result->fetch_assoc();
									echo $row["nm_aluno"];
								}
								else {
									echo "0 results";
								}
							}
							?>
							">
						</div>
					</div>
				</form>
				<hr>
				<form method="post">
					<div class="form-group">
						<label for="usr">
							EMAIL:
						</label>
						<div class="row">
							<div class="col-12">
								<input type="text" class="form-control" name="email" id="usr">
							</div>
						</div>
						<label for="senhainput">
							SENHA:
						</label>
						<div class="form-row">
							<div class="col-sm-11 col-10">
								<input type="password" class="form-control" name="senha" id="senhainput">
							</div>
							<div class="col-sm-1 col-2">
								<button type="button" id="olho" class="btn btn-light"><i class="fas fa-eye"></i></button>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-3">
							<button type="button" class="btn btn-cadastrar" data-toggle="modal" data-target="#confirmar">Confirmar</button>
						</div>
					</div>
					<!--Modal-->
					<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="confirmar" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="confirmar">Confirmar</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Tem certeza que deseja enviar?
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					        <input type="submit" name="cadastrar" class="btn btn-success" value="Enviar"/>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			</form>

			<?php
			if(isset($_POST['cadastrar'])){
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$rml= $_SESSION['rm'];
				$sql1 = "UPDATE tb_aluno SET nm_login='$email', nm_senha='$senha' WHERE nr_rm='$rml'";
				if ($mysqli->query($sql1)) {
					session_destroy();
				} else {
					echo "Error updating record: " . $conn->error;
				}
			}
			?>
		</div>

		<!-- JavaScript -->
		<script src="js/jquery.min.js" ></script>
		<script src="js/popper.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/slick.min.js" ></script>
		<script src="js/per.js"></script>

	</body>
	</html>
