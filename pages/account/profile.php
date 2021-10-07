<?php
$result = mysqli_query($db,"SELECT courses FROM accounts WHERE id='$id'");
$courses = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitcourses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/b2700bfb4b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>
<body>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/acc_header.php"); ?>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/sidebar.php"); ?>
      
    <main id="content" class="account-content">
        <section>
            <div class="container">
            <h1 class="section-title">Профіль</h1>
            <div class="row">
                <div class="col-4">
                    <img width="250px" height="250px" src="images/<?php echo $user['avatar'];?>.png">
                </div>
                <div class="col text-center">
                    <form action="../tools/setdata.php" method="POST">
                    <table>
                    <tr>
                        <td>Логін</td>
                        <td><?php echo $user['name'];?></td>
                    </tr>
                    <tr>
                        <td>Прізвище</td>
                        <td><input class="profile-input" type="text" value="<?php echo $user['lastname'];?>" maxlength=24 name="lastname"><i class="fas fa-user-edit"></i></td>
                    </tr>
                    <tr>
                        <td>Ім'я</td>
                        <td><input class="profile-input" type="text" value="<?php echo $user['firstname'];?>" maxlength=24 name="firstname"><i class="fas fa-user-edit"></i></td>
                    </tr>
                    <tr>
                        <td>По-батькові</td>
                        <td><input class="profile-input" type="text" value="<?php echo $user['fathername'];?>" maxlength=24 name="fathername"><i class="fas fa-user-edit"></i></td>
                    </tr>
                    <tr>
                        <td>Електронна пошта</td>
                        <td><?php echo $user['email'];?></td>
                    </tr>
                    <tr>
                        <td>Номер телефону</td>
                        <td><input class="profile-input" type="tel" value="<?php echo $user['phone'];?>" maxlength=10 name="number"><i class="fas fa-user-edit"></i></td>
                    </tr>
                    <tr>
                        <td>Дата реєстрація</td>
                        <td><?php echo $user['date'];?></td>
                    </tr>
                    <tr>
                        <td>Роль</td>
                        <td><?php if($user['role']==0){echo "Студент";}elseif($user['role']==1){echo "Викладач";}else{echo "Адміністратор";};?></td>
                    </tr>
                    </table><br>
                    <table>
                    <tr>
                        <td width=43%>Старий пароль</td>
                        <td><input class="profile-input" type="password" name="oldpassword"><i class="fas fa-user-edit"></i></td>
                    </tr>
                    <tr>
                        <td>Новий пароль</td>
                        <td><input class="profile-input" type="password" name="newpassword"><i class="fas fa-user-edit"></i></td>
                    </tr>
                    </table>
                    <input type="submit" class="submit" value="Зберегти">
                    </form>
                </div>
            </div>
        </div>
        </section>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>