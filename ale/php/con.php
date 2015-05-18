<?php
$con = mysql_connect("localhost", "silverio", "SIL2auD");
mysql_select_db("conference", $con) OR DIE ("Error: No es posible establecer la conexión");

if (!$con) {
    die('Could not connect: ' . mysql_error());
}
/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 07/01/15
 * Time: 11:57
 */ 
