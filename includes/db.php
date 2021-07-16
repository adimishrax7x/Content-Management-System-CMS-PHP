<?php

$db_host ='localhost';
$db_user ='root';
$db_pass ='mysqlUsernamePassword';
$db_name ='cms';
$db_port =3308;


$connection=mysqli_connect($db_host,$db_user,$db_pass,$db_name,$db_port);
// if($connection){
//     echo "We are connected";
// }
// else
// {
//     die( "ERROR ". mysqli_connect_error());
// }


?>