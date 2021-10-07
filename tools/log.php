<?php
if (isset($_POST['name'])) { $name = $_POST['name'];}
if (isset($_POST['password'])) { $password=$_POST['password'];}
$password = md5($password);
include ("db.php");
$result = mysqli_query($db,"SELECT id,password FROM accounts WHERE name='$name'");
$myrow = mysqli_fetch_array($result);
if (empty($myrow['password'])){
        header ("Location: ../signin.php?message=Акаунт з таким логіном не існує.");
}
else {
    if ($myrow['password']==$password) {
        session_start();
        $_SESSION['id'] = $myrow['id'];
        header("Location: ../account.php?page=main");
    }
    else { 
        header ("Location: ../signin.php?message=Ви ввели неправильний пароль.");
    }
}
?>