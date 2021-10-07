<?php
session_start();
$id=$_SESSION['id'];
include("tools/db.php");
if(isset($id)){
    $result = mysqli_query($db,"SELECT * FROM accounts WHERE id='$id'");
    $user = mysqli_fetch_array($result);
    if(isset($_GET["page"])){
        if($_GET["page"]=="all"){
            include("pages/tests/all.php");
        }
        elseif($_GET["page"]=="new"){
            include("pages/tests/new.php");
        }
        elseif($_GET["page"]=="results"){
            include("pages/tests/results.php");
        }
        elseif($_GET["page"]=="result"){
            include("pages/tests/result.php");
        }
        elseif($_GET["page"]=="start"){
            if(isset($_GET["id"])){
                $test_id=$_GET["id"];
                $result = mysqli_query($db,"SELECT * FROM tests WHERE id='$test_id'");
                $test=mysqli_fetch_array($result);
                $content = unserialize($test['content']);
                $text=array();
                foreach($content as $key => $value){
                    foreach($value as $k => $v){
                    if($k=="question"){
                        array_push($text,$v);
                    }
                }
                foreach(unserialize($test['points']) as $key=>$value){
                    if($key!=$id){
                        $yet=false;
                    }
                    else{
                        $yet=true;
                    }
                }
                }
                if(isset($test['title'])){
                    if($yet==false){
                        include("pages/tests/start.php");
                    }
                    else{
                        include("pages/tests/error_yet.php");
                    }
                }
                else{
                    include("pages/tests/error_id.php");
                }
            }
            else{
                include("pages/tests/error_id.php");
            }
        }
        else{
            header("Location: tests.php?page=all");
        }
    }
    else{
    include("pages/tests/all.php");
    }
}
else{
    header("Location: signin.php");
}
?>