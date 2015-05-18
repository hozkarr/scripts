<?php
header("Content-Type: text/html;charset=utf-8");

$con = mysql_connect("localhost", "silverio", "SIL2auD");
mysql_select_db("conference", $con) OR DIE ("Error: No es posible establecer la conexión");

mysql_query("SET NAMES 'utf8'");

if (!$con) {
    die('Could not connect: ' . mysql_error());
}
/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 26/02/15
 * Time: 11:57
 */ 
