<?php 
$result = mysqli_query($db,"SELECT * FROM tasks");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitcourses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/b2700bfb4b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/acc_header.php"); ?>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/c_sidebar.php"); ?>
      
    <main id="content" class="account-content">
        <section>
            <div class="container">
            <div class="wrapper">
            <div class="col-12 text-center">
                <h2 class="main-text">Створення завдання</h2>
            </div>
              <div id="formContent">
                <form action="../tools/new_task.php?id=<?php echo $course['id'];?>" method="POST" enctype="multipart/form-data">
                  <input class="text" type="text" id="title" name="title" placeholder="Назва завдання" style="margin-top:30px;" maxlength=64 required> 
                  <input class="text" type="text" id="text" name="text" placeholder="Текст завдання" maxlength=1024 required>
                  <input type="date" class="text" name="datesend" required>
                  <div style="display:flex;justify-content: center;">
                  <input class="text" type="url" name="link" placeholder="URL посилання"  style="width:41%">
                  <input class="text" type="text" name="linktext" placeholder="Назва посилання"  style="width:41%">
                  </div>
                  <input class="text" type="file" name="file[]" multiple > 
                  <input class="submit" type="submit"  value="Створити">
                </form>
                <span><?php echo $_GET['message'];?></span>
                <div id="formFooter">
                    <p>*Ви не зможете редагувати завдання після створення.</p>
                  
                </div>
            
              </div>
            </div>
            </div>
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>