<?php

class InsertAvatarCore {

	// Check the fields
	public function checkFields($a) 
	{
		foreach($a as $f) {
			if(empty($_POST[$f]))
				return false;
		}
		return true;
	}
	

	
	public function saveAvatarImage($imagen, $nombre, $ruta) 
	{
		if(is_uploaded_file($imagen['tmp_name'])) {
			
			// New name of the image
			$nuevo_nombre = str_replace(' ', '-', strtolower($nombre)).'.jpg';
			
			// Check pre-existence of the image
			if(file_exists("$ruta$nuevo_nombre"))
				$nuevo_nombre = str_replace(' ', '-', strtolower($nombre)).rand(0, 100).'.jpg';
			
			// Name of the temporary image
			$imagen_tmp = $imagen['tmp_name'];
			
			// Obtaining original dimensions
			$dimensiones = getimagesize($imagen_tmp);
			$ancho = $dimensiones[0];
			$alto = $dimensiones[1];
			
			// Create Image
			$imagen_ = imagecreatetruecolor(128, 128);
			$imagen = imagecreatefromjpeg($imagen_tmp);
			imagecopyresampled($imagen_, $imagen, 0, 0, 0, 0, 128, 128, $ancho, $alto);
			
			// Save the image
			imagejpeg($imagen_, "$ruta$nuevo_nombre");
			
			// Return the image
			return $nuevo_nombre;
		}
	}
	public function saveAvatarMySQL($imagen) 
	{
		global $loggedInUser,$mysqli, $db_table_prefix;
		
		$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users 
				SET  Avatar_URL =? 
				WHERE id =?
				");
		$stmt->bind_param("si", $imagen, $loggedInUser->user_id);
		$stmt->execute();
		$stmt->store_result();
		$stmt->close();	

	}
	
	// Get the avatars for users
	public function getAvatarIMG($id)
	{
		global  $loggedInUser, $mysqli, $db_table_prefix;
		
		$stmt = $mysqli->prepare("SELECT Avatar_URL
			   FROM ".$db_table_prefix."users
			   WHERE id  = ?");
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->bind_result($id);
				
				$stmt->close();
			


	}
	
	}
	
?>