<?php
session_start ();

if (!isset($_SESSION['username']))
	{ 
	$_SESSION['msg']="Sinun täytyy ensiksi kirjautua nähdäksesi tämän sivun";
	header('location : login.php'); 
	}

if (isset($_GET['logout']))
	{ 
	session_destroy();
	unset($_SESSION ['username']);
	header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kirjautunut sisään</title>
	<link rel="stylesheet" type="text/css" href="TEE OMA CSS">
</head>
<body>
	<h2>Olet kotisivulla, kirjautuneena sisään</h2>
	<?php 
		if(isset($_SESSION['success'])) : ?> 
	<div>
		<h3>
			<?php 
			echo $_SESSION['success'];
			unset ($_SESSION['success']);
			?>
		</h3>
	</div>
<?php  endif?>

<!--Tiedot tilistä, jotka näkyvät käyttäjälle-->
<?php if(isset($_SESSION['username']));?>
	<h3> Tervetuloa <strong><?php echo $_SESSION['username'];?></strong></h3>
	<p><a href="login_index.php?logout='1'" style ="color: green;"> Kirjaudu ulos</a></p>

<?php endif ?>
</body>
</html>