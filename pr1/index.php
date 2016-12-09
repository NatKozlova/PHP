<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Авторизация</title>
		<link rel="stylesheet" href="style.css">
    </head>
	
	<body>
	
        <div class="fon">
		
            <div class="priv">
                <img src="1.png" height="80px">
                <p>Добро пожаловать!</p>
            <p>Введите правильные имя<br> пользователя и пароль<br> для входа на сайт!</p>
                <br>
                <a href="#">Регистрация</a>
            </div>
				
				<?php $login = "morrigan"; $pwd = "12345";
				if(!isset($_POST['pwd']))
				{
					echo '<div class="vhod">			
                <h2>Вход</h2>				
				<form method="POST"><div class="auto">			
					<div class="user">
                    <b>Имя пользователя</b>
					<input id="username" maxlength="20" name="username">
                    </div>
					
					<div class="pass">
                    <b>Пароль</b><br>
                <input type="password" name="pwd">
					</div>
				
                <input class="but" type="submit" value="Вход">
			
				</div></form>
				
            </div>';
				}
				else if($_POST['username'] == $login && $_POST['pwd'] == $pwd)
				{
					echo 'Privet '.$login;
					echo '<a href="./index.php">Выход </a>';
				}
				else if($_POST['username'] != $login || $_POST['pwd'] != $pwd)
				{
					echo '<div class="vhod">			
                <h2>Вход</h2>				
				<form method="POST"><div class="auto">			
					<div class="user">
					<p>Вы ввели неправельные данные</p>
                    <b>Имя пользователя</b>
					<input id="username" maxlength="20" name="username">
                    </div>
					
					<div class="pass">
                    <b>Пароль</b><br>
                <input type="password" name="pwd">
					</div>
				
                <input class="but" type="submit" value="Вход">
			
				</div></form>
				
            </div>';
				}
				?>
				
           
        </div>
    </body>
</html>