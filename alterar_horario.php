<?php
  include_once("includes/conexao.php");
  $itens = $_GET['itens'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alterar Horário dos Coordenadores</title>
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
      include_once("includes/menu-adm.php");  
    ?>
    <div id="container-form">
      <?php
        include_once ("includes/fundo.html");
      ?>
      <div class="jumbotron mx-auto">  
          <table class="table" cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th>CD</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Dia da Semana</th>
                <th class="actions">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php
              $select="SELECT * FROM `tb_horario_coordenador` WHERE  `id_usuario` = $itens ORDER BY FIELD(`nm_dia_semana`, 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira')";

                if ($con=$mysqli->query($select)) {
                  $row =  $con->num_rows;
                if ($row == 0) {
                  echo '<th class="text-center">Não há horário cadastrado!</th>';
                }
                  while ($obj= $con->fetch_object()) {
                    echo "<td>".$obj->cd_horario_coordenador."</td>";
                    echo "<td>".$obj->hr_entrada."</td>";
                    echo "<td>".$obj->hr_saida."</td>";
                    echo "<td>".$obj->nm_dia_semana."</td>";

                    echo '<td> <a class="btn btn-info btn-xs botao" style="color:white;" data-toggle="modal" data-target="#abrir-modal';
                    echo $obj->cd_horario_coordenador.'">Editar</a>';
                    echo ' <a class="btn btn-danger btn-xs botao" style="color:white;" data-toggle="modal" data-target="#delete-modal';
                    echo $obj->cd_horario_coordenador.'">Excluir</a>';
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
<?php
    $selectmodal="SELECT * FROM `tb_horario_coordenador`";
    if ($con=$mysqli->query($selectmodal)) {
    while ($obj= $con->fetch_object()) {

echo '<div class="modal fade" id="abrir-modal';
echo $obj->cd_horario_coordenador . '" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content corverdinha">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Alterar Horário</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <form method="post">
        <label for="entrada"><b>Entrada:</b></label>
              <input type="time" class="form-control" name="entrada" value="'.$obj->hr_entrada.'" required autofocus>
               <label for="saida"><b>Saída:</b></label>
              <input type="time" class="form-control" name="saida" value="'.$obj->hr_saida.'" required autofocus>
               <label for="semana"><b>Dia da Semana:</b></label>
          <div class="row">
            <div class="col-12">
              <select name="semana" class="form-control">
              <option value="Segunda-feira" required autofocus> Segunda-feira
              <option value="Terça-feira" required> Terça-feira
              <option value="Quarta-feira" required> Quarta-feira
              <option value="Quinta-feira" required> Quinta-feira
              <option value="Sexta-feira" required> Sexta-feira
                </select>
            </div>
          </div>
          <input type="hidden" value="'.$obj->cd_horario_coordenador.'" name="cd_horario">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary corverdinha" name="botion">Confirmar</button>
    <button type="button" class="btn btn-default " data-dismiss="modal">Cancelar</button>
    </form>
      </div>
    </div>
  </div>
</div>';
        }
    }

     if (isset($_POST['botion'])) {

$entrada = $_POST['entrada'];
$saida = $_POST['saida'];
$semana = $_POST['semana'];
$horario = $_POST['cd_horario'];

$update="UPDATE `tb_horario_coordenador` SET `hr_entrada`='$entrada',`hr_saida`='$saida',`nm_dia_semana`='$semana',`id_usuario`='$itens' WHERE `cd_horario_coordenador` =  $horario ";

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
          alert('Erro ao alterar!');
          document.location="alterar_horario.php";
        </script>
        <?php

}}

    $selectmodal1="SELECT * FROM `tb_horario_coordenador`";
    if ($con=$mysqli->query($selectmodal1)) {
    while ($obj= $con->fetch_object()) {

echo '<div class="modal fade" id="delete-modal';
echo $obj->cd_horario_coordenador. '" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content corverdinha">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Excluir horário</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este horário?
      </div>
      <div class="modal-footer">
        <a href="excluir_horario.php?cd=';
        echo $obj->cd_horario_coordenador . ' " class="btn btn-primary corverdinha">Sim</a>
    <button type="button" class="btn btn-default " data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>';

}}
?>

    <!-- JavaScript -->
    <link href="css/menu-lateral.css" rel="stylesheet">
    <link href="css/layout_form.css" rel="stylesheet">
    <script src="js/jquery.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/slick.min.js" ></script>
    <script src="js/per.js"></script>


  </body>
</html>
