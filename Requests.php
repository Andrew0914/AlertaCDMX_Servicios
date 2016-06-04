<?php 
/*imports*/
include('Connector.php');
include('AccesoUsuarios.php');
include('ServiciosMapa.php');
/*------*/

	$id_request= $_GET["id_request"]; //recibe un id que identifica la accion
	
	if($id_request == "00"){ //cuando un usuario entra por primera vez a la app se guardan sus datos
		$user_id = $_GET["user_id"];
		$usuario = new AccesoUsuarios($user_id);

		$user_email = $_GET["user_email"];
		$user_displayName = $_GET["user_displayName"];
		$user_image = $_GET["user_image"];
		$usuario-> firstTime($user_email,$user_displayName,$user_image);
	}

	if($id_request == "01"){ //inserta nueva publicacion
		
		$servicio = new ServiciosMapa();
		$user_id = $_GET["user_id"];
		$pbl_texto = $_GET["pbl_texto"];
		$pbl_coordenada_latitud = $_GET["latitud"];
		$pbl_coordenada_longitud = $_GET["longitud"];
		$servicio-> insertPost($user_id,$pbl_texto,
			$pbl_coordenada_latitud,$pbl_coordenada_longitud);
	}
	
	if($id_request=="02"){
		$marcador = new ServiciosMapa();
		$marcador->getMarkers();
	}

	if($id_request=="03"){
		$publicacion = new ServiciosMapa();
		$latitud = $_GET["latitud"];
		$longitud = $_GET["longitud"];
		$publicacion->getPostByPosition($latitud,$longitud);
	}

	if($id_request=="04"){
		$usuario= new ServiciosMapa();
		$user_id = $_GET["user_id"];
		$usuario->getUserById($user_id);
	}


 ?>	