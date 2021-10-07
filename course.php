<?php
session_start();
$id=$_SESSION['id'];
include("tools/db.php");
if(isset($id)){
    $result = mysqli_query($db,"SELECT * FROM accounts WHERE id='$id'");
    $user = mysqli_fetch_array($result);
if(isset($_GET['invite'])){
    include("pages/course/invite.php");
}
elseif(isset($_GET["id"])){
    if(isset($_GET["page"])){
        if($_GET["page"]=="leave"){
            $c = unserialize($user['courses']);
            $c = array_diff($c,[$_GET["id"]]);
            $c = serialize($c);
            $result = mysqli_query($db,"UPDATE accounts SET courses='$c' WHERE id='$id'");
            header("Location: account.php?page=main");
        }
        elseif($_GET["page"]=="delete"){
            $course_id=$_GET["id"];
            $result = mysqli_query($db,"SELECT * FROM courses WHERE id='$course_id'");
            $course = mysqli_fetch_array($result);
            if($id==$course['creator_id']){
                $result = mysqli_query($db,"UPDATE courses SET status='2' WHERE id='$course_id'");
            }
            header("Location: account.php?page=main");
        }
        elseif($_GET["page"]=="join"){
            $course_id=str_replace("easykeycode","",base64_decode($_GET["id"]));
            $c = unserialize($user['courses']);
            if($c==null){
                $c=array();
            }
            foreach($c as $key => $value){
                if($value==$course_id){
                    $bool=true;
                }
            }
            $result = mysqli_query($db,"SELECT * FROM courses WHERE id='$course_id'");
            $members=mysqli_fetch_array($result);
            if($id==$members['creator_id']){
                $bool=true;
            }
            if($bool==false){
                array_push($c,intval($course_id));
                $c = serialize($c);
                $result = mysqli_query($db,"UPDATE accounts SET courses='$c' WHERE id='$id'");

                $m=unserialize($members['members']);
                if($m==null){
                    $m=array();
                }
                array_push($m,intval($id));
                $m = serialize($m);
                $result = mysqli_query($db,"UPDATE courses SET members='$m' WHERE id='$course_id'");
            }
            header("Location: course.php?page=stream&id=".$course_id);
            
            
        }
        elseif(file_exists("pages/course/".$_GET["page"].".php")){
            $course_id=$_GET["id"];
            $result = mysqli_query($db,"SELECT * FROM courses WHERE id='$course_id'");
            $course = mysqli_fetch_array($result);
            if(isset($course) and $course['status']!=2){
                if(unserialize($user['courses'])!=null)
                foreach(unserialize($user['courses']) as $key => $value){
                    if ($value==$_GET["id"]){
                        $access=true;
                        include("pages/course/".$_GET["page"].".php");
                        break;
                    }
                }
                $cid=$_GET["id"];
                $result = mysqli_query($db,"SELECT * FROM courses WHERE creator_id='$id' AND id='$cid'");
                $row=mysqli_fetch_array($result);
                if(isset($row['id'])){
                    include("pages/course/".$_GET["page"].".php");
                    $access=true;
                }
                if($access==false){
                    include("pages/course/error_access.php");
                }
            }
            else{
                include("pages/course/error_id.php");
            }
        }
        else{
            header("Location: course.php?page=stream&id=".$_GET["id"]);
        }
    }
    else{
    include("pages/course/stream.php");
    }
}
else{
    include("pages/course/error_id.php");
}
}
else{
    header("Location: signin.php");
}
?>