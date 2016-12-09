<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    	<link rel="stylesheet" href="style.css">
    </head>
      <body style="background-color: #F3EED3">
      <form method="post" align="center" class="regform">
        <label style="font-size: 35px;">Регистрация нового пользователя <br></label>
          <label>   - поле обязательно для заполнения<br></label>
        <label>Логин  </label><br>
        <input type="text" name=" login" required value="<? if(isset($_POST[' login'])) echo $_POST[' login']; ?>"><br>
        <label>Пароль  </label><br>
        <input type="password" name="parol" required value="<? if(isset($_POST['parol'])) echo $_POST['parol']; ?>"><br>
        <label>Повторите пароль  </label><br>'
        <input type="password" name="parol1" required value="<? if(isset($_POST['parol1'])) echo $_POST['parol1']; ?>"><br>
        <label>Фамилия  </label><br>
        <input type="text" name="surname" required value="<? if(isset($_POST['surname'])) echo $_POST['surname']; ?>"><br>
        <label>Имя  </label><br>
        <input type="text" name="name" required value="<? if(isset($_POST['name'])) echo $_POST['name']; ?>"><br>
        <label>Отчество</label><br>
        <input type="text" name="midname" value="<? if(isset($_POST['midname'])) echo $_POST['midname']; ?>"><br>
        <label>Пол  </label><br>
        <select name="pol" required>
          <option value="Мужской">
          Мужской
          </option>
          <option value="Женский">
          Женский
          </option>
        </select><br>
        <label>E-Mail  </label><br>
        <input type="email" name="email" required value="<? if(isset($_POST['email'])) echo $_POST['email']; ?>"><br>
        <label>Возраст  </label><br>
        <input type="text" name="age" required value="<? if(isset($_POST['age'])) echo $_POST['age']; ?>"><br>
        <label>Страна  </label><br>
        <select name="country" required>
          <option>
          Россия
          </option>
          <option>
          Украина
          </option>
          <option>
          Белорусия
          </option>
        </select><br>

        <label>О себе</label><br>
        <textarea style="resize: none;" rows="8" cols="35" name="about"><? if(isset($_POST['about'])) echo $_POST['about']; ?></textarea><br>
        <input type="submit" value="Регистрация"/>
        <input type="reset" value="Сброс"/>
        </form><br>
  <?
  // meta http-equiv="refresh" content="5; url=index.php"
      if(isset($_POST[' login']) && isset($_POST['parol']) && isset($_POST['parol1']) && isset($_POST['surname']) && isset($_POST['name'])
       && isset($_POST['pol']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['country'])
      && !empty($_POST[' login']) && !empty($_POST['parol']) && !empty($_POST['parol1']) && !empty($_POST['surname']) && !empty($_POST['name'])
       && !empty($_POST['pol']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['country']))//существование переменных и их не пустота.
      {
          if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))//Формат почты
          {
            if($_POST['parol'] == $_POST['parol1'])//Совпадение паролей
            {
              $pd = false;
              $file = fopen(" loginins.txt", "r");
              while(!feof($file))//Пока в файле
              {
                $line = fgets($file);
                $arr = explode('|', $line);
                if(@$arr[0] == $_POST[' login']) $pd = true;
              }
              fclose($file);
              if($pd == false)//Если логина не нашли
              {
                $str = $_POST[' login'].'|'.$_POST['parol'].'|'.$_POST['surname'].'|'.$_POST['name'].'|'.$_POST['midname'].'|'.$_POST['pol'].'|'.$_POST['email'].'|'.$_POST['age'].'|'
                .$_POST['country'].'|'.$_POST['about'];
                $file = file_put_contents(' loginins.txt', $str.PHP_EOL , FILE_APPEND | LOCK_EX);
                echo '<span>Регистрация успешна!</span>';
              }
              else echo' <span>Логин уже занят.</span>';
          }
          else echo '<span>Пароли не совпадают.</span>';
        }
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) echo '<span>Неверный формат Email.</span>';
      }
      else if(isset($_POST['country'])) echo '<span>Введены не все данные.</span>';
    ?>
  </body>
</html>
