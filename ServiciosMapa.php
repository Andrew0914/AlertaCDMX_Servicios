<?php 
include('Connector.php');

	class ServiciosMapa{

         

   		/*function insertIssue(){

   			//echo json_encode($conn->result->fetch_assoc());
   		}*/


         //Funcion para las incidencias en un marcador si una coordenada no existe la agrega y si ya existe le suma uno a la incidencia
   		function levelMarker($coordenada_x,$coordenada_y){
            $db = new Connector();   
            $query = "INSERT INTO marcadores (mrk_coordenadas,mrk_incidencias) VALUES ('" . $coordenada_x . "','" . $coordenada_y . "', 1);";
   		   echo $query."<br>";
            if(!$this->existsPoint($coordenada_x,$coordenada_y)){
                  if ($db->execute($query)) {
                     $respuesta = array("marcador"=>"insertado");
            echo json_encode($respuesta);
            
            }else{
               $respuesta = array("marcador"=>"nada");
            echo json_encode($respuesta); 

            } //aqui
            } else{
               $query = "SELECT mrk_coordenada_x, mrk_coordenada_y FROM marcadores WhERE mrk_coordenada_x = '".$coordenada_x."' AND mrk_coordenada_y = '".$coordenada_y."' ";
               $db->execute($query);
               echo "YA EXISTE CORRDENADA <br>";
               $query=  "UPDATE marcadores SET mrk_incidencias= mrk_incidencias+1 WHERE mrk_coordenada_x = '".$coordenada_x."' AND mrk_coordenada_y = '".$coordenada_y."'";
               $db->execute($query);
               echo "Marcador actualizado";
            }
         }

         //obtiene las coordenadas del marcador
   		function getMarker($coordenada_x,$coordenada_y){
            $db = new Connector(); 
            $query = "SELECT mrk_incidencias FROM marcadores where mrk_coordenada_x = '".$coordenada_x."' AND mrk_coordenada_y = '".$coordenada_y."'  ";
            echo $query."<br>";
            $db->execute($query);
            echo json_encode($db->result->fetch_assoc());
            //echo json_encode($conn->result->fetch_assoc());
   		}

         //Obtiene la publicacion apartir de las coordenadas
         function getIssue($coordenada_x,$coordenada_y){
            $arreglo = new array();
            $db = new Connector();
            $query ="SELECT * FROM publicaciones WHERE pbl_coordenada_x='".$coordenada_x."' AND pbl_coordenada_y='".$coordenada_y."'";
            if($db->execute($query)){
               while($fila = $db->result->fetch_array()){
               $arreglo($fila);
               // 
            }       
               
            }
         }
             
            function existsPoint($mrk_coordenada_x,$mrk_coordenada_y){
            $conn = new Connector();
            $pregunta = "SELECT mrk_coordenada_x, mrk_coordenada_y FROM marcadores WhERE mrk_coordenada_x=".$mrk_coordenada_x." AND mrk_coordenada_y = ".$mrk_coordenada_y."' ";
            if($conn->execute($pregunta) & count($conn->result->fetch_array()) > 1){
               return 1;
            }
            return 0; 
         }
   }
         /*$objeto =  new ServiciosMapa();
         $objeto->getMarker("andy<3");*/
         
         $objeto = new ServiciosMapa();
         $objeto->getIssue(255.1,255.2);

         /*$objeto = new ServiciosMapa();
         $objeto->levelMarker(174.85,255.5);*/
 ?>
