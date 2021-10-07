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
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/sidebar.php"); ?>
      
    <main id="content" class="account-content">
        <section>
            <div class="container">
                <?php 
                    $result = mysqli_query($db,"SELECT * FROM tests");
                    $index=0;
                    $exist=false;
                    while($tests = mysqli_fetch_assoc($result)){
                        if($tests['creator_id']==$id){
                            $exist=true;
                            $index+=1;?>
                        
            <div class="c-stream-task c-m">
                
                    <div class="row" >
                        <div class="col">
                            
                            <a class="c-title" style="cursor:pointer" href="tests.php?page=results&id=<?php echo $tests['id'];?>"><h1><i class="fas fa-clipboard-check" style="margin-right:10px"></i><?php echo $tests['title'];?></h1></a>
                        </div>
                        <div class="col">
                            <div>
                        <input type="text" class="url-test" id="link" value="https://fitcourses.ua/tests.php?page=start&id=<?php echo $tests['id'];?>">
                        </div>
                        </div>
                        <div class="col-3">
                            <p class="c-datesend">Максимум балів: <?php echo $tests['max'];?></p>
                        </div>
                        </div>
            </div>
            <?php }} if($exist==false){echo "<h1 class='section-title'>У вас немає тестів</h1>";}?>
            </div>
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>