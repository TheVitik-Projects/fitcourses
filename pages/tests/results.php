<?php 
$test_id=$_GET['id'];
$result = mysqli_query($db,"SELECT points FROM tests WHERE id='$test_id'");
$users=mysqli_fetch_array($result);
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
                <table>
                    <tr>
                        <th>Логін</th>
                        <th>Прізвище</th>
                        <th>Ім'я</th>
                        <th>По-батькові</th>
                        <th>Оцінка</th>
                    </tr>
                    <?php 
                    if(unserialize($users['points'])!=null){foreach(unserialize($users['points']) as $key => $value){
                        $result = mysqli_query($db,"SELECT * FROM accounts WHERE id='$key'");
                        $cuser = mysqli_fetch_array($result);
                        ?>
                        <tr>
                            <td><?php echo $cuser['name'];?></td>
                            <td><?php echo $cuser['lastname'];?></td>
                            <td><?php echo $cuser['firstname'];?></td>
                            <td><?php echo $cuser['fathername'];?></td>
                            <td><?php echo $value;?></td>
                        </tr>    
                            <?php }}?>
</table>
        </div>
        
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>