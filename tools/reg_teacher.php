<?php
$errors = array(); 
$hidden_errors=0;
if (isset($_POST['name'])) { $name = $_POST['name'];}else{$hidden_errors+=1;}
if (isset($_POST['firstname'])) { $firstname = $_POST['firstname'];}else{$hidden_errors+=1;}
if (isset($_POST['lastname'])) { $lastname = $_POST['lastname'];}else{$hidden_errors+=1;}
if (isset($_POST['fathername'])) { $fathername = $_POST['fathername'];}else{$hidden_errors+=1;}
if (isset($_POST['phone'])) { $phone = $_POST['phone'];}else{$hidden_errors+=1;}
if (isset($_POST['email'])) { $email = $_POST['email'];}else{$hidden_errors+=1;}
if (isset($_POST['password'])) { $password=$_POST['password'];}else{$hidden_errors+=1;}

$password = md5($password);
include ("db.php");
$check= mysqli_query($db,"SELECT * FROM accounts WHERE phone='$phone' OR email='$email' OR name='$name'");
$myrow = mysqli_fetch_array($check);
if ($myrow['id']) { 
    if ( $myrow['email']==$email ) {
        array_push($errors, "Пошта вже використовується.");
    }
    else if ( ($myrow['name']==$name) ) {
        array_push($errors, "Цей логін вже використовується.");
    }
    else if($myrow['phone']==$phone){
        array_push($errors, "Цей номер вже використовується");
    }
}
if (count($errors) == 0 and $hidden_errors == 0) {
        $ip=$_SERVER['REMOTE_ADDR'];
        $date= date("d-m-Y"); 
        $register = mysqli_query ($db,"INSERT INTO accounts (name,password,email,firstname,lastname,fathername,phone,date,ip,role,avatar) VALUES('$name','$password','$email','$firstname','$lastname','$fathername','$phone','$date','$ip',0,'unknown')");
        $getid = mysqli_query($db,"SELECT id FROM accounts WHERE name='$name'");
        $row = mysqli_fetch_array($getid);
        include("mail.php");
        $data = [
            'text' => "Нова реєстрація викладача!\n$lastname $firstname $fathername\nЛогін: $name\nEmail: $email\nТелефон: $phone",
            'chat_id' => "$admin"
        ];
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
        session_start();
        $_SESSION['id'] = $row['id'];
        header("Location: ../account.php?page=main");
    }
else{
    header("Location: ../teachers.php?message=".$errors[0]);
}
    ?>