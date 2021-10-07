<?php
session_start();
$id=$_SESSION['id'];
include ("tools/db.php");
if(isset($id)){
    $result = mysqli_query($db,"SELECT * FROM accounts WHERE id='$id'");
    $user = mysqli_fetch_array($result);
    if(isset($_GET["page"])){
        if($_GET["page"]=="exit"){
            session_destroy();
            header("Location: signin.php");
        }
        elseif(file_exists("pages/account/".$_GET["page"].".php")){
            include("pages/account/".$_GET["page"].".php");
        }
        else{
            include("pages/account/404.php");
        }
    }
    else{
        include("pages/account/main.php");
    }
}
else{
    header("Location: signin.php");
}
?>
