<?php 
$result = mysqli_query($db,"SELECT * FROM tasks");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitcourses</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/b2700bfb4b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/acc_header.php"); ?>
    <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/sidebar.php"); ?>
      
    <main id="content" class="account-content">
        <section>
            <div class="container">
            <div class="wrapper">
            <div class="col-12 text-center">
                <h2 class="main-text">Створення тесту</h2>
            </div>
              <div id="formContent">
              <div class="tools-panel">
                    <i onclick="addBlock()" class="far fa-plus-square"></i>
                    <i onclick="delBlock()" class="far fa-minus-square"></i>
                    <i onclick="addRadio()" class="far fa-circle"></i>
                    <i onclick="addCheck()" class="far fa-check-square"></i>
                    <i onclick="addList()" class="far fa-list-alt"></i>
                    <i onclick="addInput()"class="far fa-edit"></i>
                </div>
                <form action="../tools/new_test.php" method="POST" name="testform">
                  <input class="text" type="text" id="title" name="title" placeholder="Назва тесту" style="margin-top:30px;" maxlength=64 required>
                  <input class="text" type="number" id="max" name="max" placeholder="Максимальний бал" style="margin-top:30px;" maxlength=3 required>
                  <div id="test-content">
                    
                </div>
                  <input type="hidden" name="html" value="">
                  <input onclick="getContent()" class="submit" type="submit"  value="Створити">
                </form>
                <span><?php echo $_GET['message'];?></span>
                <div id="formFooter">
                    <p>*Ви не зможете редагувати тест після створення.</p>
                </div>
            
              </div>
            </div>
            </div>
        </section>
        <?php include($_SERVER["DOCUMENT_ROOT"]."/pages/blocks/footer.php"); ?>
        <script>
          var blocks=0;
          var radio=0;
          var check=0;
          var list=0;
          var input=0;
          var html="";
          function addBlock(){
            blocks+=1;
            var content = document.getElementById("test-content");
            content.innerHTML+='<div class="test-block"><input class="text" type="text" name="question['+blocks+']" placeholder="Текст запитання" required><div id="test-type'+blocks+'"></div>';
            
          }
          function delBlock(){
            if(blocks>0){
              blocks-=1;
              var content = document.getElementById("test-content");
              var c = content.lastChild.remove();
            }
          }
          function addRadio(){
            var test = document.getElementById("test-type"+blocks);
            var count = test.childNodes.length/2;
            if(count!=4){
              radio+=1;
              var text = prompt("Введіть текст варіанту відповіді", "");
              test.innerHTML+='<input type="radio" id="radio1-'+radio+'" value='+count+' name=radio['+blocks+'] required><label for="radio1-'+radio+'" >'+text+'</label>';
            }
            else{
              alert("Максимальна кількість елементів - 4");
            }
          }
          function addCheck(){
            var test = document.getElementById("test-type"+blocks);
            var count = test.childNodes.length/2;
            if(count!=4){
              check+=1;
              var text = prompt("Введіть текст варіанту відповіді", "");
              test.innerHTML+='<input type="checkbox" id="check1-'+check+'" value='+count+' name=check['+blocks+']><label for="check1-'+check+'" >'+text+'</label>';
            }
            else{
              alert("Максимальна кількість елементів - 4");
            }
          }
          function addList(){
            var test = document.getElementById("test-type"+blocks);
            var count = test.childNodes.length;
            if(count!=1){
              list+=1;
              var text = prompt("Введіть варіанти відповідей через кому", "Варіант1,Варіант2");
              if(text!=null){
                test.innerHTML+='<select name="select['+blocks+']" required></select>';
                var select = document.getElementsByName("select["+blocks+"]");
                var string = text.split(',');
                
                for(var i=0;i<string.length;i++){
                  var opt = document.createElement('option');
                  opt.text=string[i];
                  opt.value = string[i];
                  select[0].appendChild(opt);
                };

                
              }
              
            }
            else{
              alert("Максимальна кількість елементів - 1");
            }
          }
          function addInput(){
            var test = document.getElementById("test-type"+blocks);
            var count = test.childNodes.length;
            if(count!=1){
              input+=1;
              test.innerHTML+='<input class="text" type="text" id="text1'+input+'" placeholder="Відповідь" name="input['+blocks+']"" required>';
            }
            else{
              alert("Максимальна кількість елементів - 1");
            }
          }
          function getContent(){
            document.testform.html.value=document.getElementById("test-content").innerHTML;
          }
          </script>
</body>
</html>