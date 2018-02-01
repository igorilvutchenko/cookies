<?php 
require_once 'config.php';

	if(empty($_POST['email']) OR empty($_POST['password']))
	{
		die('Пожалуйста, заполните все поля');
	}
	else {
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$remember = $_POST['remember_me'];


			if ($email == $dbemail)
			{
				$passHash = md5($pass);
				if($passHash == $dbpass) 
				{
					// die('Добро пожаловать!');
				}
				else {
					die('Пароль введен неверно');
				}
			}
			else {
				die ('Такого пользоватля нет');
			}
		}
		if ($remember == 1) {
			$expires = time() + (60*60*24*7);
			setcookie('token', $passHash, $expires , '/');
			// echo $_COOKIE['token'];
			die('Куки созданы');
		}

		else {
			session_start();

			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;

			echo '<pre>';
			var_dump($_SESSION);
			echo '</pre>';

			die('Сессия создана');
		}

?>