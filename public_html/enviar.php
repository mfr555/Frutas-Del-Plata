<?php
    require_once ("class.phpmailer.php");
    require_once("class.smtp.php");
    $nombre=$_POST["nombre"];
    
    $telefono=$_POST["telefono"];
    $email=$_POST["email"];
   	$mensaje=$_POST["mensaje"];
	$mailphp=new PHPMailer();
 	$cuerpo= '
			<html>
				<head>
  					<title>Contacto Web</title>
				</head>
				<body>
  					<p>Nombre: '.$_POST["nombre"].'</p>
  					<p>Teléfono: '.$_POST["telefono"].'</p>
  					<p>E-Mail: '.$_POST["email"].'</p>
  					<p>Mensaje: '.$_POST["mensaje"].'</p>
  
				</body>
			</html>		
';
	$mailphp->IsSMTP(); 
	$mailphp->SMTPAuth   = true;
	$mailphp->Host       = "mail.frutasdelplata.com.uy"; 
	$mailphp->Username   ="soporte@frutasdelplata.com.uy";
	$mailphp->Password   ="1*soporte1*";
	$mailphp->SMTPSecure = 'ssl';
	$mailphp->Port       = 465;                      

    $mailphp->AddReplyTo  ($email, "Sr./Sra.");
    //$mailphp->From       = "info@seeandcheck.uy";
                    
                   
    $mailphp->FromName   = "Frutas del Plata";
                    
    $mailphp->Subject    = "Consulta";

    $mailphp->Body       = $cuerpo;//HTML Body

    $mailphp->AltBody    = "This is the body when user views in plain text format"; //Text Body

    $mailphp->WordWrap   = 50; // set word wrap    

    
	$mailphp->AddAddress("info@frutasdelplata.com.uy","Usuario");

    $mailphp->IsHTML(true); // send as HTML
                    

    if(!$mailphp->Send()) {

	    $error_form="Error el enviar. Intente nuevamente.";
	    $error_form=$mailphp->ErrorInfo;
	     
   }else {
                         
    	$error_form="Mensaje enviado. Gracias por contactarnos.";  
    	 echo 1;               
      }

    ?>

