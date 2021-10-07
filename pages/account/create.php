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
            <div class="wrapper">
            <div class="col-12 text-center">
                <h2 class="main-text">Створення курсу</h2>
            </div>
              <div id="formContent">
                <form action="../tools/create_course.php" method="POST">
                  <input class="text" type="text" id="title" name="title" placeholder="Назва курсу" style="margin-top:30px;" maxlength=32 required> 
                  <input class="text" type="text" id="description" name="description" placeholder="Опис курсу" maxlength=64 required>
                  <!--<p><input type="checkbox" id="status" value="1" name="status">
                  <label for="status">Приватний?</label></p>-->
                  <input class="submit" type="submit"  value="Створити">
                </form>
                <span><?php echo $_GET['message'];?></span>
                <div id="formFooter">
                    <p>*Ви не зможете редагувати курс після створення.</p>
                  
                </div>
            
              </div>
            </div>
        </div>
        </section>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>