<?php
session_start();
if (isset($_POST['title'])) { $title = $_POST['title'];}
if (isset($_POST['description'])) { $description = $_POST['description'];}
include ("db.php");
$id=$_SESSION['id'];
if(isset($_POST['title']) and isset($_POST['description']) and isset($id)){
    $insert= mysqli_query($db,"INSERT INTO courses (creator_id,title,description,status) VALUES('$id','$title','$description',0)");
    $result = mysqli_query($db,"SELECT * FROM courses WHERE id=(SELECT max(id) FROM courses)");
    $row = mysqli_fetch_array($result);
    header("Location: ../course.php?page=stream&id=".$row['id']);
}
else{
    header("Location: ../account.php?page=create");
}
?>