<section>
        <div class="container goal-block">
            <h1 class="section-title">Контакти</h1>
            <div class="row adaptable">
                <div class="col basis">
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2540.619091761194!2d30.454189015154594!3d50.44819529540928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0JrQn9CY!5e0!3m2!1sru!2sua!4v1618859856923!5m2!1sru!2sua" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col basis text-center flex-column">
                    <h3 class="call-text">Зворотний зв'язок</h3>
                    <form action="sendmail.php" method="post">
                        <input type="text" class="input" placeholder="Ім'я" name="name" required>
                        <input type="email" class="input" placeholder="Електронна пошта" name="email" required>
                        <textarea class="textarea" maxlength="256" id="text" onchange="count()" name="text" placeholder="Повідомлення" required></textarea>
                        <span id="symbols" class="count-text">256/256 символів залишилось</span>
                        <input type="submit" class="send-button" style="outline:none;" value="Надіслати">
                    </form>
                </div>
            </div>
        </div>
    </section>