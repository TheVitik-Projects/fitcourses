<?php
session_start();
    if(isset($_SESSION['id'])){
        header("Location: account.php?page=main");
    }
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
<header class="hide">
        <div class="container">
            <div class="row">
            <div class="col-2">
            <a href="index.php" class="logo-text">FITCOURSES</a>
            </div>
            <div class="col-4">
                <div class="search">
                    <input type="text" class="search-input" placeholder="Пошук курсів" name="find">
                    <a href="#" class="search-icon"><i class="fas fa-search"></i></a> 
                </div>
            </div>
            <div class="col">
                <label alt="menu" for="toggle-1" class="toggle-menu"><ul><li></li> <li></li> <li></li></ul></label>
		        <input type="checkbox" id="toggle-1" alt="menu">
                <nav class="nav-menu">
                    <ul style="display: flex;">
                        <li><a class="link" href="teachers.php">Викладачам</a></li>
                        <li><a class="link" href="signin.php" >Вхід</a></li>
                        <li><a class="link button" href="signup.php">Реєстрація</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
      <section>
        <div class="wrapper fadeInDown">
          <div class="col-12 text-center">
            <h2 class="main-text fadeIn first">Реєстрація</h2>
          </div>
        <div id="formContent">
          <form id="register" method="POST" action="tools/reg_student.php">
              <input type="text" class="text fadeIn first" id="name" name="name" placeholder="Логін" style="margin-top:30px;">
              <input type="email" class="text fadeIn first" id="email" name="email" placeholder="Електронна пошта">
              <div style="display:flex;justify-content: center;">
              <input type="password" class="text fadeIn second" id="password" name="password" placeholder="Пароль" style="width:41%">
              <input type="password" class="text fadeIn second" id="repeat-password" name="repeat-password" placeholder="Повторіть пароль" style="width:41%">
              </div>
            <input class="submit" type="submit" class="fadeIn third" >
          </form>
          <span><?php echo $_GET['message'];?></span>
          <div id="formFooter">
              <a href="signin.php">Я вже маю акаунт</a>
            
          </div>
      
        </div>
      </div>
      </section>
      <?php include("pages/blocks/footer.php"); ?>
    <script>
        $(document).ready(function () {
            setTimeout(
         function() 
         {
          if (window.matchMedia("(min-width: 1025px)").matches) {
            $('html, body').animate({scrollTop: 70},500);
         }}, 3000);  
    });
    </script>
</body>
</html>