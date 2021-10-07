<?php
$db_host="localhost";
$db_username="root";
$db_pass="";
$db_name="fitcourses";
$db = mysqli_connect($db_host,$db_username,$db_pass);
mysqli_select_db($db,$db_name);
?>