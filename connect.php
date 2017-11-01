<?php 
$con = mysql_connect("localhost","root","anchoino1");

if (!$con)
{
  die();
}

mysql_select_db("photolibrary",$con);
?>