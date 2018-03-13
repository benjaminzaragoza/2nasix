<?php
class general extends connexio{
  var $conn;

  function general ($ruta="../../"){
      parent::connexio($ruta);
  }
  
  
  function llistat_autors(){
      $sql="SELECT AUT_IDAUTOR FROM AUTORS";
      $rs=$this->DB_Select($sql);
      $i=1;
      while ($rs_f=$this->DB_Fetch($rs)){
          $aut=new autor();
          $aut->inicialitza($rs_f['AUT_IDAUTOR']);
          $items[$i]=serialize($aut);
          $i++;
      }
      return $items;
  }
  
  function llistat_llibres(){
      $sql="SELECT LLIB_IDLLIBRE FROM LLIBRES";
      $rs=$this->DB_Select($sql);
      $i=1;
      while ($rs_f=$this->DB_Fetch($rs)){
          $llib=new llibre();
          $llib->inicialitza($rs_f['LLIB_IDLLIBRE']);
          $items[$i]=serialize($llib);
          $i++;
      }
      return $items;
  }
  function obtenir_autor($id_autor){
      $sql="SELECT AUT_AUTOR FROM AUTORS WHERE AUT_IDAUTOR=".$id_autor;
      $rs=$this->DB_Select($sql);
      $rs_f=$this->DB_Fetch($rs);
      return $rs_f['AUT_AUTOR'];
  }
  
    
    
}
?>