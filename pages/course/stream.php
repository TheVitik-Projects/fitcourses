<?php $result = mysqli_query($db,"SELECT * FROM tasks"); ?>
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
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/c_sidebar.php"); ?>
    <main id="content" class="account-content">
        <section>
        
            <div class="container">
                <div class="row"><div class="col">
            <div class="c-intro">
                <?php if($course['creator_id']!=$id){?>
                <div class="course-settings"><label alt="coursemenu" for="intro"><i class="fas fa-cog"></i></label></div>
                <?php }?>
                <h1><?php echo $course['title'];?></h1>
                <h5><?php echo $course['description'];?></h5>
                <?php if($course['creator_id']!=$id){?>
                <input type="checkbox" id="intro" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="course.php?page=leave&id=<?php echo $course['id'];?>"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                          <?php }?>
                          <?php if($user['role']==1 and $user['id']==$course['creator_id']){ ?>
                          <div>
                            <input type="text" class="url-text" id="invite" readonly value="https://fitcourses.ua/course.php?invite=<?php echo base64_encode("easykeycode".$course['id']);?>">
                            <a href="" onclick="copy()" class="url-icon"><i class="fas fa-copy"></i></a> 
                        </div>
                        <?php } ?>
            </div>
            </div></div>
            <?php 
                    $index=0;
                    if(mysqli_fetch_assoc($result)==null){echo "<h1 class='section-title'>Курс не містить завдань</h1>";}
                    while($tasks = mysqli_fetch_assoc($result)){
                        if($tasks['status']==1){
                        if($tasks['course_id']==$_GET['id']){
                        $index+=1;
                        $exist=true;?>
            <div class="c-stream-task">
                    <div class="row">
                        <div class="col-9">
                            <h1><i class="fas fa-clipboard-list" style="margin-right:10px"></i><?php echo $tasks['title'];?></h1>
                        </div>
                        <div class="col-3">
                            <p class="c-datesend">Дата здачі: <?php echo $tasks['datesend'];?></p>
                        </div>
                        </div>
                <hr>
                <div class="c-task">
                    <p><?php echo $tasks['text'];?></p>
                    <ul class="c-files">
                    <?php if(unserialize($tasks['files'])!=null){ foreach(unserialize($tasks['files']) as $key => $value){
                        ?>
                            <li><a href="<?php echo $value['link']?>"><i class="fas fa-calendar-check mini-icon"></i><?php echo $value['title'];?></a></li>
                            <?php }}?>
                    </ul>
                </div>
                <hr>
                    <p class="c-datecreated">Опубліковано <?php echo $tasks['datecreated'];?></p>
            </div>
            <?php }}}if($exist==false){echo "<h1 class='section-title'>Курс не містить завдань</h1>";}?>
        </div>
        
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
<script>
function copy() {
  var copyText = document.getElementById("invite");
  copyText.select();
  document.execCommand("copy");
}
</script>
</body>
</html>