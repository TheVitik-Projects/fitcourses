<input type="checkbox" id="toggle-2" alt="sidemenu">
    <div id="sidemenu" class="sidenav">
        <div class="side-container">
        <ul>
        <li class="side-link l-active"><a href="account.php?page=main"><i class="fas fa-home" style="margin-right:5px"></i>Головна</a></li>
        <?php if($user['role']==1){ ?>
        <li class="side-link"><a href="tests.php?page=all"><i class="fas fa-clipboard-check mini-icon"></i>Мої тести</a></li>
        <li class="side-link"><a href="tests.php?page=new"><i class="fas fa-plus-circle mini-icon"></i>Створити тест</a></li>
            <li class="side-link"><a href="account.php?page=create"><i class="fas fa-plus-circle" style="margin-right:5px"></i>Створити курс</a></li>
        <?php }?>
        <!--<li class="side-link"><a href="account.php?page=calendar"><i class="fas fa-calendar-alt" style="margin-right:5px"></i></i>Календар</a></li>-->
        <li class="side-link"><a><i class="fas fa-graduation-cap" style="margin-right:5px"></i>Мої курси</a></li>
        <?php 
        $result = mysqli_query($db,"SELECT * FROM courses WHERE creator_id='$id'");
        if($user['role']==1){ 
            while($course = mysqli_fetch_assoc($result)){
                if($course['status']!=2){
                ?>
            
            <li class="side-link course"><a style="color:#007bff;" href="course.php?page=main&id=<?php echo $course['id'];?>"><i class="fas fa-graduation-cap" style="margin-right:5px"></i><?php echo $course['title'];?></a></li>
            <?php }}}?>
        <?php if(unserialize($courses['courses'])!=null){ foreach(unserialize($courses['courses']) as $key => $value){
            $result = mysqli_query($db,"SELECT * FROM courses WHERE id='$value'");
            $course = mysqli_fetch_array($result);
            if(isset($course['id'])){
            ?>
        <li class="side-link course"><a href="course.php?page=main&id=<?php echo $course['id'];?>"><i class="fas fa-graduation-cap" style="margin-right:5px"></i><?php echo $course['title'];?></a></li>
        <?php }}} ?>
        
        </ul>
        </div>
      </div>