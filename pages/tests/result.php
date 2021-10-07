<?php
$test_id=$_GET['id'];
$result = mysqli_query($db,"SELECT * FROM tests WHERE id='$test_id'");
$test=mysqli_fetch_array($result);
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
        
            <div class="container text-center">
                <h2 class="main-text"><?php echo $test['title'];?></h2>
                <h3 class="main-text"><?php
                $result= mysqli_query($db,"SELECT points,max FROM tests WHERE id=$test_id");
                $row=mysqli_fetch_array($result);
                
                if($row['points']!=null){
                foreach(unserialize($row['points']) as $key=>$value){
                    if($key==$id){
                        echo "Ваш бал за тест: ".$value."/".$row['max'];
                    }
                    else{
                        echo "Ви ще не проходили цей тест";
                    }
                
                }}else{
                    echo "Ви ще не проходили цей тест";
                }?></h3>
        </div>
        
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>