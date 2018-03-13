<?php
    $ruta="../../";
    include $ruta."gestio/classes/cls_includes.php";
    
    //echo "sdfjhsdjfhsd=".$_GET['idaut'];
    $idaut = $_GET['idaut'];
    $aut = new autor();
    $aut->inicialitza($idaut);
    
    

?>
<html>
<head>
<title>Vista Inicial</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="<?=$ruta?>res/jscript/funcions.js"></script>
<script language="javascript">
	function submit_form() {
		if (document.formulari.f_submit.value=='Modificar') {	
			document.formulari.f_submit.value='Guardar';
		}
		else {
				if (document.formulari.f_submit.value=="Aceptar") {
					if (confirm("S'emmagatzemaran els canvis sol�licitats. Continuar?")) {
						document.formulari.h_accio.value=document.formulari.f_submit.value;
						document.formulari.f_submit.value='Modificar';
						document.formulari.submit();					
					}
					else {
						
						document.formulari.f_submit.value='Aceptar';
					}
				}
				else {
								
					if (confirm("S'emmagatzemaran els canvis sol�licitats. Continuar?")) {
						document.formulari.h_accio.value=document.formulari.f_submit.value;
						document.formulari.submit();
					}			
					else {
						document.formulari.f_submit.value='Modificar';
						document.formulari.autor.value=document.formulari.h_autor.value;
						document.formulari.autor.disabled=true;

					}//tanca l'else
			}//tanca l'else		
		}//tanca l'else
	}//tanca la funci�
	
	function delete_form() {
		if (document.formulari.f_delete.value=='Esborrar'){
			if (confirm("Segur que vols esborrar aquest autor?")) {
					document.formulari.h_accio.value=document.formulari.f_delete.value;
					//document.writeln(document.formulari.h_accio.value); 
					document.formulari.submit();
			}
		}
		else if (document.formulari.f_delete.value=='Cancelar') {
			document.formulari.h_accio.value=document.formulari.f_delete.value;
			document.formulari.submit();				
		}
	}
</script>	
<link href="estils.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="formulari" action="<?=$ruta?>gestio/controladors/c_autor.php?accio=v&idaut=<?=$idaut?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="h_accio" id="h_accio" value="">
        <input type="hidden" name="h_autor" id="h_autor" value="<?=$aut->get_aut_autor()?>">
	<table width="100%">
		<tr>
			<td colspan="7" class="sub_titol">Informaci&oacute; de l' autor</td>
		</tr>
		<tr>
			<td width="3">&nbsp;</td>
			<td width="115" class="etiqueta">Identificador</td>
			<td width="126"><input name="id" type="text" disabled class="input" value="<?=$aut->get_aut_idautor()?>">			</td>
			<td width="113">&nbsp;</td>
			<td width="293">&nbsp;		  </td>			
		    <td width="94" align="center">&nbsp;</td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td class="etiqueta">Autor</td>
		  <td colspan="4"><input name="autor" type="text" class="input" id="autor" value="<?=$aut->get_aut_autor()?>" size="75">
	      </td>
		</tr>
	</table>
	<table width="100%">
		<tr>
		  	<td colspan="3"  class="sub_titol">Opciones de l' autor</td>
	    </tr>
		<tr>
		  <td width="1%">&nbsp;</td>
		  <td align="right" class="etiqueta">
		    <input type="button" name="f_submit" value="<?=$aut->textSubmit()?>" class="input" onClick="javascript:submit_form()">
		    <input type="button" name="f_delete" value="<?=$aut->textDelete()?>" class="input" onClick="javascript:delete_form()">
		  </td>submit
		  <td width="1%">&nbsp;</td>submit
	  </tr>			
					
	</table>	
	submit
</form>
</body>
</html>