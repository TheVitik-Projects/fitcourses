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
                <?php 
                    $index=0;
                    $exist=false;
                    while($tasks = mysqli_fetch_assoc($result)){
                        if($tasks['status']==1){
                        if($tasks['course_id']==$_GET['id']){
                            $exist=true;
                            $index+=1;?>
                        
            <div class="c-stream-task c-m">
                    <div class="row collapser" data-toggle="collapse" data-target="#task<?php echo $index;?>" style="cursor:pointer">
                        <div class="col">
                            <h1><i class="fas fa-clipboard-list" style="margin-right:10px"></i><?php echo $tasks['title'];?></h1>
                        </div>
                        <div class="col-3">
                            <p class="c-datesend">Дата здачі: <?php echo $tasks['datesend'];?></p>
                        </div>
                    </div>
                    <div class="collapse" id="task<?php echo $index;?>">
                <hr>
                <div class="c-task">
                    <p><?php echo $tasks['text'];?></p>
                    <ul class="c-files">
                        <?php if(unserialize($tasks['files'])!=null){foreach(unserialize($tasks['files']) as $key => $value){?>
                            <li><a href="<?php echo $value['link']?>"><i class="fas fa-calendar-check mini-icon"></i><?php echo $value['title'];?></a></li>
                            <?php }}?>
                        
                        <!--<li><a href="https://google.com"><i class="fas fa-link mini-icon"></i>Посилання</a></li>
                        <li><a href="account.php?page=stream?course=1"><i class="far fa-file-video mini-icon"></i>Відео</a></li>
                        <li><a href="account.php?page=stream?course=1"><i class="far fa-file-image mini-icon"></i>Фото</a></li>
                        <li><a href="account.php?page=stream?course=1"><i class="far fa-file-word mini-icon"></i>Документ</a></li>
                        <li><a href="account.php?page=stream?course=1"><i class="far fa-file-powerpoint mini-icon"></i>Презентація</a></li>
                        <li><a href="account.php?page=stream?course=1"><i class="far fa-file-pdf mini-icon"></i>PDF-файл</a></li>
                        <li><a href="account.php?page=stream?course=1"><i class="far fa-file-audio mini-icon"></i>Аудіо</a></li>-->
                    </ul>
                </div>
                <hr>
                <div class="row">
                    <div class="col-11">
                        <p class="c-datecreated">Опубліковано <?php echo $tasks['datecreated'];?></p>
                    </div>
                    <div class="col-1">
                        <?php if($user['role']==1 and $user['id']==$course['creator_id']){ ?>
                        <a style="color:red" href="tasks.php?page=delete&id=<?php echo $tasks['id'];?>" class="c-datecreated">Видалити</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            </div>
            <?php }}} if($exist==false){echo "<h1 class='section-title'>Курс не містить завдань</h1>";}?>
            </div>
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>