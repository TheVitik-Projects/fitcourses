<?php
session_start();
$id=$_SESSION['id'];
if (isset($_POST['firstname'])) { $firstname = $_POST['firstname'];}
if (isset($_POST['lastname'])) { $lastname = $_POST['lastname'];}
if (isset($_POST['fathername'])) { $fathername = $_POST['fathername'];}
if (isset($_POST['number'])) { $number = $_POST['number'];}
if (isset($_POST['oldpassword'])) { $oldpassword=$_POST['oldpassword'];}
if (isset($_POST['newpassword'])) { $newpassword=$_POST['newpassword'];}
include("db.php");
if(isset($id)){
    if(isset($firstname)){
        $result = mysqli_query($db,"UPDATE accounts SET firstname='$firstname' WHERE id='$id'");
    }
    if(isset($lastname)){
        $result = mysqli_query($db,"UPDATE accounts SET lastname='$lastname' WHERE id='$id'");
    }
    if(isset($fathername)){
        $result = mysqli_query($db,"UPDATE accounts SET fathername='$fathername' WHERE id='$id'");
    }
    if(isset($number)){
        $result = mysqli_query($db,"UPDATE accounts SET phone='$number' WHERE id='$id'");
    }
    if(isset($oldpassword) and isset($newpassword)){
        $result = mysqli_query($db,"SELECT password FROM accounts WHERE id='$id'");
        $row = mysqli_fetch_array($result);
        if($row['password']==md5($oldpassword)){
            $newpassword=md5($newpassword);
            $result = mysqli_query($db,"UPDATE accounts SET password='$newpassword' WHERE id='$id'");
        }
    }
    header("Location: ../account.php?page=profile");
}
else{
    header("Location: ../signin.php");
}
    ?>