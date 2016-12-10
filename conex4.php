<?php
function cnxxy(){
    $db=mysql_connect("localhost","root","") or die("No se conecto al servidor");
            mysql_select_db("capacitacion",$db) or die ("No se conecto a la base de datos");
            return $db;
}
$dbx=cnxxy();
?>