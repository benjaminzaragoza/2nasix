<?php
$ruta="../../";

include$ruta."gestio/classes/cls_includes.php";
$gen = new general();
?>

<html>
<head>
<meta http-equiv="Content-Type" tptent="text/html; charset=iso-8859-1">

<script language="javascript">
	function consultar_document(url){
		document.location=url;
	}
</script>

<link href="../vistes/estils.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" >
  <tr>
    <td colspan="3" class="titol">Llistat d'Autors</td>
  </tr>
  <tr>
    <td colspan="3" align="right">
  </tr>
  <tr>
    <td colspan="3" class="sub_titol">Autor</td>
  </tr>

  <?php
  $items=$gen->llistat_autors();
  foreach($items as $it){
      $aut= unserialize($it);
      ?>
  <tr>
    <td></td>
    <td class="<?=$class?>"><?=$aut->get_aut_autor()?></td>
    <td width="8%" colspan="-3"  class="scr_subTitol">
      <input name="accio_c" type="button" id="accio_c" value="[consultar]" maxlength="255" onClick="javascript:consultar_document('<?=$ruta?>gestio/controladors/c_autor.php?accio=c&idaut=<?=$aut->get_aut_idautor()?>')" class="input"></td>
  </tr>
      
  <?php 
  $items2=$aut->llistat_llibres();
    foreach($items2 as $it2){
    $llib= unserialize($it2);
  ?>

  <td></td>
  <tr><td></td>
  <td width="3%" colspan="2" align="left" class="<?=$class?>"><?=$llib->get_llib_llibre()?></td>
  <td></td>
  </tr>
  <?php
  }
  }
  ?>
 
  </table>
</body>
</html>

