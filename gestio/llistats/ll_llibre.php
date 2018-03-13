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
    <td colspan="4" class="titol">Llistat de llibres</td>
  </tr>
  <tr>
    <td colspan="4" align="right">
  </tr>
  <tr>
    <td colspan="3" class="sub_titol">Llibre</td>
    <td colspan="3" class="sub_titol">Autor</td>
  </tr>
   

  <?php
  $items=$gen->llistat_llibres();
  foreach($items as $it){
      $llib= unserialize($it);
      $retorn= $gen->obtenir_autor($llib->get_llib_idautor());
  ?>
  <tr>
      <td></td>
    <td class="<?=$class?>"><?=$llib->get_llib_llibre()?></td>
    <td width="8%" colspan="-1" align="right"  class="scr_subTitol"></td>
     <td class="<?=$class?>"><?=$retorn?></td>
    <td width="8%" colspan="-1" align="left"  class="scr_subTitol">
      <input name="accio_c" type="button" id="accio_c" value="[consultar]" maxlength="255" onClick="javascript:consultar_document('<?=$ruta?>gestio/controladors/c_llibre.php?accio=c&idllib=<?=$llib->get_llib_idllibre()?>')" class="input">    </td>
  </tr>
  <?php
  }
  ?>
  </table>aut_idllibre
</body>
</html>
