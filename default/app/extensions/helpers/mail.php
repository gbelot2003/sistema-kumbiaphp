<?php

class Mail {

	public static function sendContactMail($nombre ,$AddAddress, $title, $message)
	{
		Load::lib("PHPMailer/class.phpmailer");	
		$obj = new PHPMailer();
		$obj->IsSMTP();
		$obj->SMTPAuth = true; // Habilitamos la autenticación SMTP - 
		$obj->Host = "mail.dominio.com"; // Nombre del servidor SMTP 
		$obj->Port = 26; // Puerto del SMTP
		$obj->Username = ""; // Cuenta de usuario del SMTP  ... de aqui sale el correo
		$obj->Password = ""; // Clave del usuario SMTP 
		$obj->AddAddress("gerardobelot@dominio.com", "Correo desde Webmasterhn");
		$obj->SetFrom("", "");
		$obj->Subject = "Mensaje desde Sitioweb";
		$body = $title."<br/>";
		$body .= $nombre. " te a enviado un mensaje <br/>";
		$body .= "Su Correo es <<strong>" . $AddAddress . "</strong>";
		$body .= $message;
		$obj->MsgHTML($body);
		if($obj->Send())
		{
			Flash::valid("El Mensaje $title a sido enviado a $AddAddress");
			return true;
		} 
		else
		{
		 	Flash::error("Error: " . $obj->ErrorInfo); 
		 return false; 
		}
	}
}
