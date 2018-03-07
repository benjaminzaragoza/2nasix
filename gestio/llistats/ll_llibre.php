<?php
$ruta="../../";
include $ruta."gestio/classes/cls_includes.php";

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
    <td colspan="3" class="sub_titol">Llistat d'Llibres</td>
  </tr>
  <tr>
    <td colspan="3" align="right">
  </tr>
  <tr>
    <td width="2%">&nbsp;</td>
    <td colspan="2" class="etiqueta">Llibres</td>
  </tr>
<?php
$items =$gen->llistat_llibre();
foreach($items as $it){
    $lli= unserialize($it);
?>
  <tr>
    <td></td>
    <td class="<?=$class?>"><?=$lli->get_lli_llibre()?>
       
    <td width="8%" colspan="-3" align="right"  class="scr_subTitol">
      <input name="accio_c" type="button" id="accio_c" value="[consultar]" maxlength="255" onClick="javascript:consultar_document('<?=$ruta?>gestio/controladors/c_llibre.php?accio=c&idlli=<?=$lli->get_lli_idllibre()?>')" class="input">    </td>
  </tr>
 <?php
}
 ?>
  </table>
