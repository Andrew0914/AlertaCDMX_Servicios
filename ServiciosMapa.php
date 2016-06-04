<?php 
//include('Connector.php'); // usar ais para pruebas pero dejar comentado al terminar
   class ServiciosMapa{

      function getMarkers(){
         $firtsArray= array();
         $db = new Connector;
         $query = "SELECT * from marcadores";
         if($db->execute($query)){
            while ($fila=$db->result->fetch_assoc()) {
               array_push($firtsArray,$fila);// hay que poner cada row en un arreglo
            }
            $arrayJson = array();
            $arrayJson["marcadores"]=$firtsArray; // ese arreglo darle una key para hacerlo asociativo
            echo json_encode($arrayJson);          // para que el json se forme bien
            
         }
      }

      function getPostByPosition($latitud,$longitud){ // obtiene las publicaciones asociadas a un marker
         
         $db = new Connector();
         $primerArray = array();
         $query = "SELECT * FROM publicaciones WHERE pbl_coordenada_latitud='".$latitud
                  ."' AND  pbl_coordenada_longitud='".$longitud."'";
          if($db->execute($query)){
            
            while ($fila=$db->result->fetch_assoc()) {
               array_push($primerArray,$fila);
            }
            $arrayPost = array();
            $arrayPost["publicaciones"]=$primerArray;
            echo json_encode($arrayPost);
         }
       }

      function getUserById($user_id){
         $db = new Connector();
         $query="SELECT * FROM usuarios WHERE user_id='".$user_id."'";
         if($db->execute($query)){
            $resultado=$db->result->fetch_assoc();
            echo json_encode($resultado);
         }  
      }

      function insertPost($user_id, $pbl_texto, $pbl_coordenada_latitud, $pbl_coordenada_longitud){
            
         $db = new Connector();
         
         $query = "INSERT INTO publicaciones (user_id, pbl_texto,pbl_coordenada_latitud, pbl_coordenada_longitud) 
            values 
            ('".$user_id."', '".$pbl_texto."','".$pbl_coordenada_latitud."','".$pbl_coordenada_longitud."')";
         if ($db->execute($query)) {
            if($this->levelMarker($pbl_coordenada_latitud,$pbl_coordenada_longitud)){
            $respuesta= array("publicado" => "si");
            echo json_encode($respuesta);
         }else{
            $respuesta= array("publicado" => "no");
            echo json_encode($respuesta);
         }

         } 
         else{
            $respuesta= array("publicado" => "no");
            echo json_encode($respuesta);
         }
      }

   function levelMarker($coordenada_latitud,$coordenada_longitud){
            $db = new Connector();   
            $query = "INSERT INTO marcadores (mrk_coordenada_latitud,mrk_coordenada_longitud,mrk_incidencias) VALUES ('" . $coordenada_latitud . "','" . $coordenada_longitud . "', 1);";
            if(!$this->existsPoint($coordenada_latitud,$coordenada_longitud)){
                  if ($db->execute($query)) {
                     
                     return 1;
                  }else{
                     
                     return 0;
                  }
            }else{
               $query=  "UPDATE marcadores SET mrk_incidencias= mrk_incidencias+1 WHERE mrk_coordenada_latitud = '".$coordenada_latitud."' AND mrk_coordenada_longitud = '".$coordenada_longitud."'";
               if($db->execute($query)){
                 return 1;
               }else{
                  return 0;
               }
            }
         }

   function existsPoint($coordenada_latitud,$coordenada_longitud){
            $conn = new Connector();
            $pregunta = "SELECT mrk_coordenada_latitud, mrk_coordenada_longitud FROM marcadores WhERE mrk_coordenada_latitud=".$coordenada_latitud." AND mrk_coordenada_longitud = '".$coordenada_longitud."' ";
            if($conn->execute($pregunta) & count($conn->result->fetch_array()) > 1){
               return 1;
            }
            return 0; 
   }
}
   /*$objeto= new ServiciosMapa();
   $objeto->insertPost("104680268944855158307","Hola mundo loco","19.396649","-99.096575");*/
?>
