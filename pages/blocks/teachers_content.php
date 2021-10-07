<main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col intro-block basis">
                        <h1>Станьте викладачем</h1>
                        <p>Поділіться своїми знаннями з іншими та отримайте статус викладача на fitcourses.</p>
                        <a class="button-xl" href="#register">Реєстрація</a>
                    </div>
                    <div class="col basis">
                        <img class="intro-image" src="images/intro2.png">
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray">
            <div class="container goal-block">
                <h1 class="section-title">Чому наша платформа?</h1>
                <div class="row">
                    <div class="col text-center">
                        <i class="fas fa-user-edit icon"></i>
                        <p class="icon-des">Створення тестів</p>
                    </div>
                    <div class="col text-center">
                        <i class="fas fa-book icon"></i>
                        <p class="icon-des">Додавання власних матеріалів</p>
                    </div>
                    <div class="col text-center">
                        <i class="fas fa-laptop-code icon"></i>
                        <p class="icon-des">Простий інтерфейс</p>
                    </div>
                    <div class="col text-center">
                        <i class="fas fa-chart-line icon"></i>
                        <p class="icon-des">Легкий контроль успішності</p>
                    </div>
                </div>
            </div>
        </section>
      <section id="register">
        <div class="wrapper">
          <div class="col-12 text-center">
            <h2 class="main-text fadeIn first">Реєстрація</h2>
          </div>
        <div id="formContent">
          <form id="register" method="POST" action="tools/reg_teacher.php">
              <input type="text" class="text fadeIn first" id="name" name="name" placeholder="Логін" style="margin-top:30px;" required>
              <input type="email" class="text fadeIn first" id="email" name="email" placeholder="Електронна пошта" required>
              <input type="text" class="text fadeIn first" id="firstname" name="firstname" placeholder="Ім'я" required>
              <input type="text" class="text fadeIn first" id="lastname" name="lastname" placeholder="Прізвище" required>
              <input type="text" class="text fadeIn first" id="fathername" name="fathername" placeholder="По-батькові" required>
              <input type="tel" class="text fadeIn first" id="phone" name="phone" placeholder="Номер телефону" maxlength="10" required>
              <div style="display:flex;justify-content: center;">
              <input type="password" class="text fadeIn second" id="password" name="password" placeholder="Пароль" style="width:41%" minlength="8" required>
              <input type="password" class="text fadeIn second" id="repeat-password" name="repeat-password" placeholder="Повторіть пароль" style="width:41%" minlength="8" required>
              </div>
            <button class="submit" type="submit" class="fadeIn third">Зареєструватись</button>
          </form>
          <span><?php echo $_GET['message'];?></span>
          <div id="formFooter">
              <a href="signin.php">Я вже маю акаунт</a>
          </div>
      
        </div>
      </div>
      </section>