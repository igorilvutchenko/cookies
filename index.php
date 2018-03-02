<?php
require_once 'config.php';
session_start();

	$isAuth = false;


	if(isset($_COOKIE['visitorPassword']))
	{
		$visitorPassword = $_COOKIE['visitorPassword'];
		$visitorEmail = $_COOKIE['visitorEmail'];
		
		if(isset($visitorPassword) and ($visitorPassword == $dbPass))
		{
		$isAuth = true;
		}
	}
	elseif($_SESSION['visitorEmail'] == $dbemail)
	{
		$visitorPassword = $_SESSION['visitorPassword'];
		$visitorEmail = $_SESSION['visitorEmail'];

		echo('Сессия создана' . $visitorEmail . ',, ' . $visitorPassword);	

		if(isset($visitorPassword) and ($visitorPassword == $dbPass))
		{
		$isAuth = true;
		}	
	}

	else
	{
?>

<?php if($isAuth == true): ?>
	<h1>Здравствуйте, <?= $dbemail ?></h1>
<?php 
else: ?>

<form method="post" action="auth.php">
	<input type="email" name="email" value="<?=$visitorEmail?>"><br>
	<input type="password" name="password" value="<?=$visitorPassword?>">
	<br>
	<label>
		<input type="checkbox" name="remember_me" value="1">
		Запомнить меня
	</label><br>
	<button type="submit">Войти</button>
</form>
<?php endif; ?>
<?php
 session_unset(); 
}?>