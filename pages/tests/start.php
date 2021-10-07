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
                <h2 class="main-text"><?php echo $test['title'];?></h2>
            </div>
              <div id="formContent">
                <form action="../tools/check_test.php?id=<?php echo $test['id'];?>" method="POST" name="testform">
                <p style="margin:10px;color:green">Бал за тест: <?php echo $test['max'];?></p>
                  <div id="test-content">
                    <?php echo $test['html'];?>
                </div>
                  <input onclick="getContent()" class="submit" type="submit"  value="Завершити">
                </form>
                <span><?php echo $_GET['message'];?></span>
                <div id="formFooter">
                    <p>*У Вас є лише 1 спроба.</p>
                </div>
                <input id="questions" type="hidden" value="<?php 
                foreach($text as $value){
                for($i=1;$i<count($value)+1;$i++){
                    echo $value[$i]."-";
                 } }?>"
              </div>
            </div>
        </div>
        
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
        <script>
            var questions = document.getElementById("questions").value;
            var format = questions.split("-");
            var elem = document.getElementsByClassName("test-block");
            for(var i=0;i<format.length;i++){
                elem[i].firstChild.value=format[i];
            }
            </script>
</body>
</html>