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
            <h1 class="section-title">Вітаємо, <?php if(!isset($user['firstname'])){echo $user['name'];}else{echo $user['lastname']." ".$user['firstname']." ".$user['fathername'];} ?>!</h1>
            <div class="row">
                <div class="col text-center">
                    <i class="fas fa-book icon"></i>
                    <p class="icon-des">Тест</p>
                </div>
                <div class="col text-center">
                    <i class="fas fa-laptop-code icon"></i>
                    <p class="icon-des">Тест</p>
                </div>
                <div class="col text-center">
                    <i class="fas fa-briefcase icon"></i>
                    <p class="icon-des">Тест</p>
                </div>
            </div>
        </div>
        </section>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>