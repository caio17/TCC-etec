<?php
  include_once "includes/conexao.php";
  $apagar=$_GET ['cd'];
  $select="DELETE FROM `tb_usuario` WHERE `cd_usuario` = $apagar ";
 if ($mysqli->query($select)) {
  ?>
  <script type="text/javascript">
          alert('Item apagado com sucesso!');
          document.location="coordenadores.php";
        </script>

    <?php
}else{
  ?>
  <script type="text/javascript">
          alert('Erro ao excluir item!');
          document.location="coordenadores.php";
        </script>
        <?php

}
?>