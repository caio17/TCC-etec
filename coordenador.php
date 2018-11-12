<?php
	include_once("includes/conexao.php");
  $itens = $_GET['itens'];
	$select0= "SELECT * FROM `tb_usuario` WHERE cd_usuario = $itens and id_tipo = 1 ";
	if($coordenador = $mysqli->query($select0)){
	}else {
		echo "Não foi!!!!";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <meta charset="utf-8">
  <head>
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
  #foto_coordenador {
    width: 40%;
    height: auto;
    float:left;
    position:relative;
  }
}
    </style>
		<link rel="shortcut icon" href="imagens/icone_etec.png" >
  </head>
  <body class="bg-light">

	<?php
    include_once ("includes/menu-adm.php");
	while($obj = $coordenador->fetch_object()){
	?>
<div class="container-table" style="margin-top:100px;">
	<div class="mx-auto pt-3 pb-5 text-center">
		<p id="nm_coordenador" class="h1">
			<?php
				echo $obj->nm_usuario;
        echo " ".$obj->nm_sobrenome;
        echo '<title>'.$obj->nm_usuario." ".$obj->nm_sobrenome.'</title>';
			?>
		</p>
	</div>
  <?php
	echo '<div class="mr-sm-5 mt-5 mt-sm-0 mr-0" id="foto_coordenador"  ><img class="img-fluid"
    src="'.$obj->nm_foto.'"></div>';
 echo '<div class="border" style="color: #fff; background-color: #212529;">';
  echo '<div class="row">
        Login: '.$obj->nm_login.'
        </div>';

  echo '<div class="row">
        Cargo: Coordenador';

	echo "</div>";
		?>
</div>
	<?php
	}
?>

<table class="table">
  <thead class="thead-dark text-center">
    <tr>
      <th scope="col text-center">Segunda-Feira</th>
      <th scope="col text-center">Terça-Feira</th>
      <th scope="col text-center">Quarta-Feira</th>
      <th scope="col text-center">Quinta-Feira</th>
      <th scope="col text-center">Sexta-Feira</th>
    </tr>
  </thead>

  <tbody>
<tr>
<?php
$select1= "SELECT * FROM `tb_horario_coordenador` WHERE `id_usuario` = $itens and nm_dia_semana = 'Segunda-feira'";
$select2= "SELECT * FROM `tb_horario_coordenador` WHERE `id_usuario` = $itens and nm_dia_semana = 'Terça-feira'";
$select3= "SELECT * FROM `tb_horario_coordenador` WHERE `id_usuario` = $itens and nm_dia_semana = 'Quarta-feira'";
$select4= "SELECT * FROM `tb_horario_coordenador` WHERE `id_usuario` = $itens and nm_dia_semana = 'Quinta-feira'";
$select5= "SELECT * FROM `tb_horario_coordenador` WHERE `id_usuario` = $itens and nm_dia_semana = 'Sexta-feira'";

  if ($con1=$mysqli->query($select1)) {
    $row1 =  $con1->num_rows;
  if ($row1 == 0) {
    echo '<th class="text-center">---</th>';
  }

  if ($row1 == 1) {
    if ($obj1= $con1->fetch_object()) {
    echo '<th class="text-center">'.$obj1->hr_entrada.' as '.$obj1->hr_saida.'</th>';
  }}

  if ($row1 >= 2) {
    echo '<th class="text-center">';
    while ($obj1= $con1->fetch_object()) {
    echo "$obj1->hr_entrada as $obj1->hr_saida <br>";
}
  }}else {
    echo "Não foi!";
  }




  if ($con2=$mysqli->query($select2)) {
    $row2 =  $con2->num_rows;
  if ($row2 == 0) {
    echo '<th class="text-center">---</th>';
  }

  if ($row2 == 1) {
    if ($obj2= $con2->fetch_object()) {
    echo '<th class="text-center">'.$obj2->hr_entrada.' as '.$obj2->hr_saida.'</th>';
  }}

  if ($row2 >= 2) {
    echo '<th class="text-center">';
    while ($obj2= $con2->fetch_object()) {
    echo "$obj2->hr_entrada as $obj2->hr_saida <br>";
}
  }}else {
    echo "Não foi!";
  }

  if ($con3=$mysqli->query($select3)) {
    $row3 =  $con3->num_rows;
  if ($row3 == 0) {
    echo '<th class="text-center">---</th>';
  }

  if ($row3 == 1) {
    if ($obj3= $con3->fetch_object()) {
    echo '<th class="text-center">'.$obj3->hr_entrada.' as '.$obj3->hr_saida.'</th>';
  }}

  if ($row3 >= 2) {
    echo '<th class="text-center">';
    while ($obj3= $con3->fetch_object()) {
    echo "$obj3->hr_entrada as $obj3->hr_saida <br>";
}
  }}else {
    echo "Não foi!";
  }

  if ($con4=$mysqli->query($select4)) {
    $row4 =  $con4->num_rows;
  if ($row4 == 0) {
    echo '<th class="text-center">---</th>';
  }

  if ($row4 == 1) {
    if ($obj4= $con4->fetch_object()) {
    echo '<th class="text-center">'.$obj4->hr_entrada.' as '.$obj4->hr_saida.'</th>';
  }}

  if ($row4 >= 2) {
    echo '<th class="text-center">';
    while ($obj4= $con4->fetch_object()) {
    echo "$obj4->hr_entrada as $obj4->hr_saida <br>";
}
  }}else {
    echo "Não foi!";
  }

  if ($con5=$mysqli->query($select5)) {
    $row5 =  $con5->num_rows;
  if ($row5 == 0) {
    echo '<th class="text-center">---</th>';
  }

  if ($row5 == 1) {
    if ($obj5= $con5->fetch_object()) {
    echo '<th class="text-center">'.$obj5->hr_entrada.' as '.$obj5->hr_saida.'</th>';
  }}

  if ($row5 >= 2) {
    echo '<th class="text-center">';
    while ($obj5= $con5->fetch_object()) {
    echo "$obj5->hr_entrada as $obj5->hr_saida <br>";
}
  }}else {
    echo "Não foi!";
  }
?>
</tr>
</tbody>
</div>
  	<script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/slick.min.js" ></script>
    <script src="js/per.js"></script>
    <script src="js/footer-navbar-segundamento.js"></script>

    <script>
        $(document).ready(function(){
          alert("nfjfjfg");
        }
    </script>

  </body>
</html>
