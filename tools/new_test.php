<?php
session_start();
if (isset($_POST['title'])) { $title = $_POST['title'];}
if (isset($_POST['max'])) { $max = $_POST['max'];}
if (isset($_POST['html'])) { $html = $_POST['html'];}
include ("db.php");
$id=$_SESSION['id'];
$content = array();
if(isset($id) and isset($_POST['title']) and isset($_POST['max'])){
foreach($_POST as $key => $value){
  if(strpos($key,"title")===false and strpos($key,"max")===false and strpos($key,"html")===false){
    array_push($content,array(
      $key => $value
    ));
  }
}
$content=serialize($content);
  $insert= mysqli_query($db,"INSERT INTO tests (creator_id,title,content,max,html) VALUES('$id','$title','$content','$max','$html')");
  header("Location: ../tests.php?page=all");
}
?>