<?php
  include_once("includes/conexao.php");
  include_once("includes/texto.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="utf-8">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" href="css/fontawesome.css" >
    <link rel="stylesheet" href="css/slick.css" >
    <link rel="stylesheet" href="css/slick-theme.css" >
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
<title>Página dos Cursos</title>

</head>

<style>

.botao{
  width: 80%;
}

</style>

 <div class="col-md-3 mt-2">
            <a href="cadastrar_curso.php" class="btn btn-primary pull-right h2">Novo Curso</a>
        </div>
      </div> <!-- /#top -->
 
      <hr />
      <div id="list" class="row">
        <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>CD</th>
                    <th>Cursos</th>
                    <th class="actions">Ações</th>
                 </tr>
            </thead>
            <tbody>
<tr>
   <?php
  $select="SELECT * FROM `tb_curso` WHERE 1"; 
    if ($con=$mysqli->query($select)) {
    while ($obj= $con->fetch_object()) {
    echo  "<td>".$obj->cd_curso."</td>";
    echo "<td>".$obj->nm_curso."</td>";

echo '<td> <a href="curso.php?view=0&itens='.$obj->cd_curso.'" TYPE="BUTTON" NAME="submit" class="btn btn-success btn-xs botao" >Visualizar</a>';
echo ' <a href="alterar_curso.php?edit=0&itens='.$obj->cd_curso.'" TYPE="BUTTON" NAME="submit" class="btn btn-warning btn-xs botao">Editar</a>';
echo ' <a href="excluir_curso.php?excl=0&itens='.$obj->cd_curso.'" TYPE="BUTTON" NAME="submit" class="btn btn-danger btn-xs botao">Excluir</a>';
echo '</td>
</tr>';
    }}else{
    echo "Não há nenhum item cadastrado!";
    }            

?>
</tr>

    <!-- JavaScript -->
    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/slick.min.js" ></script>
    <script src="js/per.js"></script>


  </body>
</html>