
<?php 
	class AccesoUsuarios{

		private $user_id="";
		
		function __construct($user_id) {
       		$this->user_id = $user_id;
   		}

   		function firstTime($user_email,$user_displayName,$user_image){ // guarda los datos de un usuario que entro por 1era vez
   			if(!($this->itExists())){
	   			$db = new Connector();
	   			$user_email = $db->sec($user_email);
	   			$user_displayName = $db->sec($user_displayName);

	   			$query = "INSERT INTO usuarios (user_id,user_email,user_displayName,user_image) VALUES ('" . 
	   					$this->user_id . "', '" . $user_email . "','".$user_displayName."','".$user_image."');";
				if ($db->execute($query)) {
					$respuesta= array("log" => "up");
	    			echo json_encode($respuesta);
				}
				else{
					$respuesta= array("log" => "no");
	    			echo json_encode($respuesta);
					
				}
			}else{
				$respuesta= array("log" => "in");
	    		echo json_encode($respuesta);
			}
   		}


   		function itExists(){
   			$conn = new Connector();
   			$pregunta = "SELECT user_id FROM usuarios WhERE user_id='".$this->user_id."'";
   			if($conn->execute($pregunta) & count($conn->result->fetch_array()) > 1){
   				return 1;
   			}
   			return 0;
   			

   			//echo json_encode($conn->result->fetch_assoc());

   		}

	}

 ?>