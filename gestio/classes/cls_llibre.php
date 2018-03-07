<?php
class llibre extends connexio{
	
		// Atributs
		var $lli_idllibre;
		var $lli_llibre;
			
		// funcio creadora
		function llibre($ruta="../../") {
			parent::connexio($ruta); //crea instancia de la classe pare  per tenir tots els m�todes per her�ncia
		}
		
		// funcio d'inicialitzacio 		
		function inicialitza($id){
			$this->lli_idllibre=$id;			
			if ($this->lli_idllibre==0) {//si �s 0 vol dir que es crea una nova inst�ncia i per tant cal inicialitzar els atributs	
				$this->lli_llibre="";
			}
			else {
				// sino �s 0 vol dir que volem consultar un element que ja tenim en la bd
				$sql="SELECT LLIBRES.LLI_IDLLIBRE, LLIBRES.LLI_LLIBRE , LLIBRES.LLI_AUTOR ".
					"FROM LLIBRES WHERE (((LLIBRES.LLI_IDLLIBRE)=".$id."))";
				$rs=$this->DB_Select($sql);
				$rs=$this->DB_Fetch($rs);
				$this->lli_llibre=$rs['LLI_LLIBRE'];
			}
		}
	
		// funcio de carrega de valors
		function carregaValors($id,$llibre){	
				$this->set_lli_idllibre($id);
				$this->set_lli_llibre($llibre);
		}			
		
		
		// funcions d'acces als atributs
		// GET's
		function get_lli_idllibre(){return $this->lli_idllibre;}
		function get_lli_llibre(){return $this->lli_llibre;}
							
		// SET's
		function set_lli_idllibre($valor){$this->lli_idllibre=$valor;}
		function set_lli_llibre($valor){$this->lli_llibre=$valor;}
	
	
		// funcions de presentacio (estat i valor dels camps/accions)
		function estatInputs(){
			if ($this->lli_idllibre==0) return " ";
			else return " disabled ";
		}
		function textSubmit(){
			if ($this->lli_idllibre==0) return "Acceptar";
			else return "Modificar";
		}
		function textDelete(){
			if ($this->lli_idllibre==0) return "Cancelar";
			else return "Esborrar";
		}			
		
		function esborra(){
			$sql="DELETE FROM LLIBRES WHERE LLI_IDLLIBRE=".$this->lli_idllibre;
			
			$this->DB_Execute($sql);
		}			
		
		function modifica(){
			$sql="UPDATE LLIBRES SET LLI_LLIBRE='".$this->lli_llibre."' WHERE LLI_IDLLIBRE=".$this->lli_idllibre;
			$this->DB_Execute($sql);
			
			return $this->lli_idllibre;			
		}			
		
		function alta($llioI=false){
						
			$sql="INSERT INTO LLIBRES (LLI_LLIBRE) VALUES ('".$this->lli_llibre."')";
			$this->DB_Execute($sql);
			
			$sql_id="SELECT max(LLI_IDLLIBRE) AS LLI_IDLLIBRE FROM LLIBRES";
			$rs_id=$this->DB_Select($sql_id);
			$rs_id=$this->DB_Fetch($rs_id);
			$this->lli_idllibre=$rs_id['LLI_IDLLIBRE'];
			return $this->_idllibre;
		}
		
		
}
?>
