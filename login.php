<?php include ('palvelin.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title>Naapurini Nipa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="rekisteri_tyylit.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<!--header-->
	<div class="header">
		<h1>Naapurini Nipa</h1>
		<p>Lemmikkihoitola luppakorvan varmuudella</p>
	</div>

	<!-- navigointi-->
	<div class="navbar">
		<a href="index.html" class="aktiivinen"> Etusivu </a>
		<a href="hoitopaketit.html"> Hoitopaketit </a>
		<a href="hinnastot.html"> Hinnasto </a>
		<a href="yhteydenotto.html"> Yhteydenottopyyntö </a>
		<a href="rekisterointi.php" class="oikea"> Rekisteröidy/Kirjaudu</a>
	</div>

	<!--Pää- ja sivuosiot-->
	<div class="osiot">
		<div class="sivuosio">
			<div class="kuva"  style="height: 200px;">
				<img src="logo.png" style="height: 200px;">
			</div>
			<h5>Yhteystiedot</h5>
				<ul class="yhteystiedot">
				<p><li><b>Naapurini Nipa Oy</b>
				<br>PL 216
				<br>40101 Jyväskylä</p>
		
				<p><b>Puh.</b> 040 777 1234
				<br><b>Email.</b> info(a)nn.net</li></p>
				</ul>
			
		</div>
		
		<div class="paaosio">
			<div class="otsikko">
				<h2>Kirjaudu</h2>
			</div>
			<form action="login.php" method="post">
			<?php include ('virheet.php'); ?>
				<div>
					<label> Käyttäjänimi</label>
					<input type="text" name="username">
				</div>
				<div>
					<label> Salasana</label>
					<input type="password" name="password">
				</div>
				<button type="submit" class="btn" name="login_kayt"> Kirjaudu</button>
			
				<p>Ei tunnuksia? <a href="rekisterointi.php"><b>Rekisteröidy täältä</b></a></p>
			
			
			</form>
			
			
		</div>
	</div>
	
	<div class="footer">
				<a href="https://www.facebook.com/" class="fa fa-facebook"></a>
				<a href="https://www.instagram.com/" class="fa fa-instagram"></a>
				<a href="https://www.snapchat.com" class="fa fa-snapchat-ghost"></a>
				<a href="https://www.skype.com" class="fa fa-skype"></a>
				<a href="https://twitter.com/" class="fa fa-twitter"></a>
	</div>

</body>
</html>
