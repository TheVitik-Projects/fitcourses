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
    <?php include("pages/blocks/header.php"); ?>
    <?php include("pages/blocks/index_content.php"); ?>
    <?php include("pages/blocks/call.php"); ?>
    <?php include("pages/blocks/footer.php"); ?>
    <script>
        document.getElementById('text').onkeyup = function () {
            document.getElementById('symbols').innerHTML = (256 - this.value.length)+"/256 символів залишилось";
        };
    </script>
</body>
</html>