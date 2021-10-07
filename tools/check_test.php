<?php
session_start();
include ("db.php");
$id=$_SESSION['id'];
$content = array();
if(isset($id) and isset($_GET['id'])){
$test_id=$_GET['id'];
foreach($_POST as $key => $value){
  if(strpos($key,"question")===false){
      foreach($value as $k => $v){
    array_push($content,$v);
  }}
}
$result= mysqli_query($db,"SELECT content,max,points FROM tests WHERE id=$test_id");
$row=mysqli_fetch_array($result);

$chct = unserialize($row['content']);
$check=array();
foreach($chct as $key => $value){
    foreach($value as $k => $v){
    if(strpos($k,"question")===false){
      array_push($check,$v);
    }
  }
}
$new=array();
foreach($check as $key => $value){
    foreach($value as $k => $v){
    array_push($new,$v);
    }
}
$max=$row['max'];
$count = $max/count($new);
for($i=0;$i<count($new);$i++){
    if($new[$i]!=$content[$i]){
        $max-=$count;
    }
}
$points=unserialize($row['points']);
if($points==null){
    $points=array();
}
$points[$id]=$max;
$points=serialize($points);
$result = mysqli_query($db,"UPDATE tests SET points='$points' WHERE id='$test_id'");
header("Location: ../tests.php?page=result&id=".$test_id);
}
?>