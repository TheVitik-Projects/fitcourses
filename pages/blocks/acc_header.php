<header>
        <div class="container">
            <div class="row">
                <label alt="sidemenu" for="toggle-2" class="toggle-menu"><ul><li></li> <li></li> <li></li></ul></label>
		        
            <div class="col-2">
            <a href="index.php" class="logo-text">FITCOURSES</a>
            </div>
            <div class="col-4">
                <div class="search">
                    <input type="text" class="search-input" placeholder="Пошук курсів" name="find">
                    <a href="#" class="search-icon"><i class="fas fa-search"></i></a> 
                </div>
            </div>
            <div class="col">
                <label alt="menu" for="toggle-1" class="toggle-menu"><ul><li></li> <li></li> <li></li></ul></label>
		        <input type="checkbox" id="toggle-1" alt="menu">
                <nav class="nav-menu">
                    <ul style="display: flex;">
                    <li><label alt="usermenu" for="toggle-3" class="toggle-menu"><?php if(!isset($user['firstname'])){echo $user['name'];}else{echo $user['lastname']." ".$user['firstname']." ".$user['fathername'];} ?><img class="nav-avatar" src="images/<?php echo $user['avatar'];?>.png"></label></li>
                        <input type="checkbox" id="toggle-3" alt="usermenu">
                        <div id="usermenu" class="usernav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="user-link"><a href="account.php?page=profile"><i class="fas fa-user" style="margin-right:5px"></i>Профіль</a></li>
                            <!--<li class="user-link"><a href="account.php?page=settings"><i class="fas fa-cog" style="margin-right:5px"></i>Налаштування</a></li>-->
                            <li class="user-link"><a href="account.php?page=exit"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Вийти</a></li>
                            </ul>
                          </div>
                    </ul>
                </nav>
            </div>
        </div>
    </header>