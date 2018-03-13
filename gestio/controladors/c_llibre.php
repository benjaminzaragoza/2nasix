<?php
$ruta="../../";
include $ruta."gestio/classes/cls_includes.php";
switch ($_GET['accio']){
    case 'a':
        header('Location:'.$ruta.'gestio/vistes/v_llibre.php?idllib=0');
        break;
    case 'l':
        header('Location:'.$ruta.'gestio/llistats/ll_llibre.php');
        break;
    case 'c':
        $idllib = $_GET['idllib'];
        header('Location:'.$ruta.'gestio/vistes/v_llibre.php?idllib='.$idllib);
        break;
    case 'v':
        switch($_POST['h_accio']){
				case 'Aceptar':	//guardem per primera vegada, per tant un INSERT INTO
					$idllib=$_GET['idllib'];
					$llibre=$_POST['llibre'];
                                        $idautor=$_POST['autor'];
					$llib=new llibre($ruta);
					$llib->carregaValors($idllib,$llibre,$idautor);
					$retorn=$llib->alta();
					header('Location:'.$ruta.'gestio/vistes/v_llibre.php?idllib='.$retorn);				
					break;
				case 'Esborrar':	//esborrem per tant DELETE
					$idllib=$_GET['idllib'];
					$llibre=$_POST['h_llibre'];
					$llib=new llibre($ruta);
					$llib->carregaValors($idllib,$llibre);
					$llib->esborra();//esborra la cap�alera
					header('Location:'.$ruta.'gestio/llistats/ll_llibre.php');
					break;
				case 'Guardar': //guardem modificacions per tant un UPDATE
					$idllib=$_GET['idllib'];
					$llibre=$_POST['llibre'];
                                        $idautor=$_POST['autor'];
					$llib=new llibre($ruta);
					$llib->carregaValors($idllib,$llibre,$idautor);
					$llib->modifica();
					header('Location:'.$ruta.'gestio/vistes/v_llibre.php?idllib='.$idllib);				
					break;
			}//tanca el segon switch
    
}
?>

