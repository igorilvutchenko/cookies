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
		setcookie('visitorEmail', $email, $expires , '/');
		setcookie('visitorPassword', $passHash, $expires , '/');

		echo('COOKIE созданы. Добро пожаловать, ' . $email);
	}
	else {
		session_start();

		$_SESSION['visitorEmail'] = $email;
		$_SESSION['visitorPassword'] = $passHash;
		echo('Сессия создана. Добро пожаловать, ' . $_SESSION[ID] . ',' . $_SESSION['visitorEmail'] . ',,' . $_SESSION['visitorPassword']);
	}

?>