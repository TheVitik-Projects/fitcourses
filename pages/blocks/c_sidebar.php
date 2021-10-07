<input type="checkbox" id="toggle-2" alt="sidemenu">
    <div id="sidemenu" class="sidenav">
        <div class="side-container">
        <ul>
        <li class="side-link l-active"><a href="account.php?page=main"><i class="fas fa-home mini-icon"></i>Головна</a></li>
        <li class="side-link"><a href="course.php?page=stream&id=<?php echo $course['id'];?>"><i class="fas fa-bullhorn mini-icon"></i>Потік</a></li>
        <li class="side-link"><a href="course.php?page=tasks&id=<?php echo $course['id'];?>"><i class="fas fa-clipboard-list mini-icon"></i>Завдання</a></li>
        <?php if($user['role']==1 and $user['id']==$course['creator_id']){ ?>
        <li class="side-link"><a href="course.php?page=new&id=<?php echo $course['id'];?>"><i class="fas fa-plus-circle mini-icon"></i>Створити завдання</a></li>
        <li class="side-link"><a href="course.php?page=users&id=<?php echo $course['id'];?>"><i class="fas fa-users mini-icon"></i>Користувачі</a></li>
        <li class="side-link"><a style="color:red" href="course.php?page=delete&id=<?php echo $course['id'];?>"><i class="fas fa-edit mini-icon"></i>Видалити курс</a></li>
        <?php } ?>
        </ul>
        </div>
      </div>