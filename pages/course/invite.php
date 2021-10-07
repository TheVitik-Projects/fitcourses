<?php 
$invite=$_GET['invite'];
$coid=str_replace("easykeycode","",base64_decode($invite));
$result = mysqli_query($db,"SELECT * FROM courses WHERE id='$coid'");
$course=mysqli_fetch_array($result);
$creator_id=$course['creator_id'];
$result = mysqli_query($db,"SELECT * FROM accounts WHERE id='$creator_id'");
$creator=mysqli_fetch_array($result);
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
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/c_sidebar.php"); ?>
    <main id="content" class="account-content">
        <section>
        
            <div class="container">
                <div class="c-intro">
                <div class="course-settings"><label alt="coursemenu" for="intro"><i class="fas fa-cog"></i></label></div>
                <h1><?php echo $course['title'];?></h1>
                <h5><?php echo $course['description'];?></h5>
                <input type="checkbox" id="intro" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="course.php?page=leave&id=<?php echo $course['id'];?>"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                          <div class="invite-profile">
                          <img class="nav-avatar" src="images/<?php echo $creator['avatar'];?>.png">
                          <p>Запрошення від: <?php if(!isset($user['firstname'])){echo $creator['name'];}else{echo $creator['lastname']." ".$creator['firstname']." ".$creator['fathername'];} ?>
                        </div>
            </div>
            <center>
            <a href="course.php?page=join&id=<?php echo base64_encode("easykeycode".$coid);?>" class="submit hoverlink" style="margin-top:30px;">Записатись</a>
            </center>
        </div>
        
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>