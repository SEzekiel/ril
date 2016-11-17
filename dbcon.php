<?php

//database details
$server = 'localhost';
$user = 'root';
$pass =  'agnes123';
$database = 'ril';

//try to connect
$connection = mysql_connect($server, $user, $pass)
//display eror if connection failed
or die ("Could not connect to sever \n".mysql_error());

//connect to databse
mysql_select_db($database)
//or die
or die("Could not connect to database \n".mysql_error());


?>

