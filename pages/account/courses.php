<?php
$result = mysqli_query($db,"SELECT courses FROM accounts WHERE id='$id'");
$courses = mysqli_fetch_assoc($result);
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
            <h1 class="section-title">Огляд курсів</h1>
            <div class="row">
                <div class="col">
                    <div class="course-block">
                        <a href="account.php?course=1"><div class="course-img img-red"><div class="course-settings"><label alt="coursemenu" for="course1" class="toggle-menu"><i class="fas fa-cog"></i></label></div></div></a>
                        <div class="course-footer">
                            <div class="course-name">Назва курсу</div>
                            <div class="course-desc">Опис курсу</div>
                        </div>
                        <input type="checkbox" id="course1" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="#contact"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-block">
                        <a href="account.php?course=2"><div class="course-img img-green"><div class="course-settings"><label alt="coursemenu" for="course2" class="toggle-menu"><i class="fas fa-cog"></i></label></div></div></a>
                        <div class="course-footer">
                            <div class="course-name">Назва курсу</div>
                            <div class="course-desc">Опис курсу</div>
                        </div>
                        <input type="checkbox" id="course2" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="#contact"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-block">
                        <a href="account.php?course=3"><div class="course-img img-blue"><div class="course-settings"><label alt="coursemenu" for="course3" class="toggle-menu"><i class="fas fa-cog"></i></label></div></div></a>
                        <div class="course-footer">
                            <div class="course-name">Назва курсу</div>
                            <div class="course-desc">Опис курсу</div>
                        </div>
                        <input type="checkbox" id="course3" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="#contact"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="course-block">
                        <a href="account.php?course=4"><div class="course-img img-red"><div class="course-settings"><label alt="coursemenu" for="course1" class="toggle-menu"><i class="fas fa-cog"></i></label></div></div></a>
                        <div class="course-footer">
                            <div class="course-name">Назва курсу</div>
                            <div class="course-desc">Опис курсу</div>
                        </div>
                        <input type="checkbox" id="course1" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="#contact"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-block">
                        <a href="account.php?course=5"><div class="course-img img-green"><div class="course-settings"><label alt="coursemenu" for="course2" class="toggle-menu"><i class="fas fa-cog"></i></label></div></div></a>
                        <div class="course-footer">
                            <div class="course-name">Назва курсу</div>
                            <div class="course-desc">Опис курсу</div>
                        </div>
                        <input type="checkbox" id="course2" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="#contact"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-block">
                        <a href="account.php?course=6"><div class="course-img img-blue"><div class="course-settings"><label alt="coursemenu" for="course3" class="toggle-menu"><i class="fas fa-cog"></i></label></div></div></a>
                        <div class="course-footer">
                            <div class="course-name">Назва курсу</div>
                            <div class="course-desc">Опис курсу</div>
                        </div>
                        <input type="checkbox" id="course3" alt="coursemenu">
                        <div id="coursemenu" class="coursenav">
                            <ul style="display:flex; flex-direction: column;margin-left:-40px">
                            <li class="course-link"><a href="#contact"><i class="fas fa-sign-out-alt" style="margin-right:5px"></i>Покинути курс</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
</body>
</html>