<?php

include 'con.php';

if(isset($_POST['envio'])){

    echo "entre";

    $cliente=$_POST['cliente'];
    $nombre=$_POST['nombre'];
    $numero=$_POST['numero'];
    $servicio=$_POST['servicio'];
    $descripcion=$_POST['descripcion'];

   $sql= mysql_query("INSERT INTO `conference`.`Proveedores_sip` (`sip_id`, `sip_sp_id`, `sip_name`, `sip_did`, `sip_service`,
            `sip_description`, `sip_lang`, `sip_welcome_prompt`, `sip_lang_select`)
            VALUES (NULL, '$cliente', '$nombre', '$numero', '$servicio', '$descripcion', 'Spanish', NULL, NULL)");

    if (!$sql) {
        die('Consulta no válida: ' . mysql_error());
    }

}

echo "<SCRIPT LANGUAGE='javascript'>
			location.href = 'troncales.php';
	</SCRIPT>";




/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 03/03/15
 * Time: 9:35
 */ 