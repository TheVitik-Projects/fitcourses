<?php
$errors = array(); 
$hidden_errors=0;
if (isset($_POST['name'])) { $name = $_POST['name'];}else{$hidden_errors+=1;}
if (isset($_POST['email'])) { $email = $_POST['email'];}else{$hidden_errors+=1;}
if (isset($_POST['password'])) { $password=$_POST['password'];}else{$hidden_errors+=1;}

$password = md5($password);
include ("db.php");
$check= mysqli_query($db,"SELECT * FROM accounts WHERE email='$email' OR name='$name'");
$myrow = mysqli_fetch_array($check);
if ($myrow['id']) { 
    if ( $myrow['email']==$email ) {
        array_push($errors, "Пошта вже використовується.");
    }
    else if ( ($myrow['name']==$name) ) {
        array_push($errors, "Цей логін вже використовується.");
    }
}
if (count($errors) == 0 and $hidden_errors == 0) {
        $ip=$_SERVER['REMOTE_ADDR'];
        $date= date("d-m-Y"); 
        $register = mysqli_query ($db,"INSERT INTO accounts (name,password,email,date,ip,role,avatar) VALUES('$name','$password','$email','$date','$ip',0,'unknown')");
        $getid = mysqli_query($db,"SELECT id FROM accounts WHERE name='$name'");
        $row = mysqli_fetch_array($getid);
        session_start();
        $_SESSION['id'] = $row['id'];
        header("Location: ../account.php?page=main");
    }
else{
    header("Location: ../signup.php?message=".$errors[0]);
}
    ?>