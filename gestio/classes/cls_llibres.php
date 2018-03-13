
<?php
class llibre extends connexio{
	
		// Atributs
		var $llib_idllibre;
		var $llib_llibre;
                var $llib_idautor;
			
		// funcio creadora
		function llibre($ruta="../../") {
			parent::connexio($ruta); //crea instancia de la classe pare  per tenir tots els m�todes per her�ncia
		}
                
		
		// funcio d'inicialitzacio 		
		function inicialitza($id){
			$this->llib_idllibre=$id;			
			if ($this->llib_idllibre==0) {//si �s 0 vol dir que es crea una nova inst�ncia i per tant cal inicialitzar els atributs	
				$this->llib_llibre="";
			}
			else {
				// sino �s 0 vol dir que volem consultar un element que ja tenim en la bd
				$sql="SELECT LLIBRES.LLIB_IDLLIBRE, LLIBRES.LLIB_LLIBRE, LLIBRES.LLIB_IDAUTOR ".
					"FROM LLIBRES WHERE (((LLIBRES.LLIB_IDLLIBRE)=".$id."))";
				$rs=$this->DB_Select($sql);
				$rs=$this->DB_Fetch($rs);
				$this->llib_llibre=$rs['LLIB_LLIBRE'];
                                $this->llib_idautor=$rs['LLIB_IDAUTOR'];
			}
		}
	
		// funcio de carrega de valors
		function carregaValors($id,$llibre,$idautor){	
				$this->set_llib_idllibre($id);
				$this->set_llib_llibre($llibre);
                                $this->set_llib_idautor($idautor);
                                        
		}	
		// funcions d'acces als atributs
		// GET's
		function get_llib_idllibre(){return $this->llib_idllibre;}
		function get_llib_llibre(){return $this->llib_llibre;}
                function get_llib_idautor(){return $this->llib_idautor;}
							
		// SET's
		function set_llib_idllibre($valor){$this->llib_idllibre=$valor;}
		function set_llib_llibre($valor){$this->llib_llibre=$valor;}
                function set_llib_idautor($valor){$this->llib_idautor=$valor;}
	
	
		// funcions de presentacio (estat i valor dels camps/accions)
		function estatInputs(){
			if ($this->llib_idllibre==0) return " ";
			else return " disabled ";
		}
		function textSubmit(){
			if ($this->llib_idllibre==0) return "Aceptar";
			else return "Modificar";
		}
		function textDelete(){
			if ($this->llib_idllibre==0) return "Cancelar";
			else return "Esborrar";
		}			
		
		function esborra(){
			$sql="DELETE FROM LLIBRES WHERE LLIB_IDLLIBRE=".$this->llib_idllibre;
			$this->DB_Execute($sql);
                        $idllib = $_GET['idllib'];
		}			
		
		function modifica(){
			$sql="UPDATE LLIBRES SET LLIB_LLIBRE='".$this->llib_llibre."',LLIB_IDAUTOR=".$this->llib_idautor." WHERE LLIB_IDLLIBRE=".$this->llib_idllibre;
			$this->DB_Execute($sql);
			
			return $this->llib_idllibre;			
		}			
		
		function alta($autoI=false){
						
			$sql="INSERT INTO LLIBRES (LLIB_LLIBRE,LLIB_IDAUTOR) VALUES ('".$this->llib_llibre."','".$this->llib_idautor."')";
                        //echo "$sql";
			$this->DB_Execute($sql);
			$sql_id="SELECT max(LLIB_IDLLIBRE) AS LLIB_IDLLIBRE FROM LLIBRES";
			$rs_id=$this->DB_Select($sql_id);
			$rs_id=$this->DB_Fetch($rs_id);
			$this->llib_idllibre=$rs_id['LLIB_IDLLIBRE'];
			return $this->llib_idllibre;
		}
		
		
}
?>
