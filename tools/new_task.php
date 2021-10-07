<?php
session_start();
if (isset($_POST['description'])) { $title = $_POST['title'];}
if (isset($_POST['price'])) { $text = $_POST['text'];}
if (isset($_POST['category'])) { $datesend = $_POST['datesend'];}
$target_dir = '../images/products';
if(isset($_FILES['file']['name']) && $_FILES['file']['size'] > 0) {
  $original_filename = $_FILES['file']['name'];
  $ext = pathinfo($original_filename, PATHINFO_EXTENSION); 
  $filename_without_ext = basename($original_filename, '.'.$ext);
  $target = $target_dir . $filename_without_ext . '.' .$ext;
  $tmp  = $_FILES['file']['tmp_name'];
  move_uploaded_file($tmp, $target);
}
  $date= date("d-m-Y"); 
  $datesend=strtotime($datesend);
  $datesend=date("d-m-Y",$datesend);
  $insert= mysqli_query($db,"INSERT INTO tasks (course_id,title,text,files,datecreated,datesend,status) VALUES('$course_id','$title','$text','$srfiles','$date','$datesend','1')");
  header("Location: ../course.php?page=tasks&id=".$course_id);
?>