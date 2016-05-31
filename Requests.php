<?php 
/*imports*/
include('AccesoUsuarios.php');
//include('ServiciosMapa.php');
	$id_request= $_GET["id_request"]; 
	/* recibe id para decidir que hacer por medio de if's,es mandada pro el movil*/
	if($id_request == "00"){ //cuando un usuario entra por primera vez a la app se guardan sus datos
		$user_id = $_GET["user_id"];
		$usuario = new AccesoUsuarios($user_id);

		$user_email = $_GET["user_email"];
		$user_displayName = $_GET["user_displayName"];
		$user_image = $_GET["user_image"];
		$usuario-> firstTime($user_email,$user_displayName,$user_image);
	}

	


 ?>	