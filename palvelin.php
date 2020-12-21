<?php
session_start();
// MUUTTUJAT
//tietokanta
$palvelin= "localhost";  
$kayttajanimi= "root";  
$salasana= "";
$dbname = "projekti_nipa";

//rekisteröinti
$username ="";
$email="";
$virheet=array();



  
// YHTEYS TIETOKANTAAN
$conn = mysqli_connect($palvelin, $kayttajanimi, $salasana, $dbname);  
  
// tarkistetaan yhteys  
if (!$conn) {  
    die("Yhteys ei onnistunut " . mysqli_connect_error());  
}  
echo "Yhteys tietokantaan on luotu";
echo "<br>";



// REKISTERÖINTI
if (isset($_POST['rek_kayt'])) {
	//rekisteröintitietojen siirto
	$username = mysqli_real_escape_string($conn,trim($_POST["username"])); 
	$email = mysqli_real_escape_string($conn, trim($_POST["email"]));
	$password_1 = mysqli_real_escape_string ($conn,trim($_POST["password_1"]));
	$password_2 = mysqli_real_escape_string ($conn,trim($_POST["password_2"]));
				//mysqli_real_escape_string, lisää merkkejä stringiin.
				//Estää tietokanta hyökkäyksiä. 
	
	//jos käyttäjä syöttää tietoja väärin, esim jättää osion täyttämättä
	if (empty($username)){array_push($virheet, "Käyttäjänimi vaaditaan");}
	if (empty($email)){array_push($virheet, "Sähköposti vaaditaan");}
	if (empty($password_1)){array_push($virheet, "Salasana vaaditaan");}
	if($password_1 != $password_2){ array_push($virheet,"Salasanat eivät täsmää");}
				//array_push välittää virheen virheet.phplle
	
	//tarkistus, ettei käyttäjänimi tai sähköposti ole jo käytössä
	$user_info_check ="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($conn, $user_info_check);
	$username=mysqli_fetch_assoc($result);
	
	if($user)
	{
		if($user['username'] === $username)
		{array_push($virheet, "Käyttäjänimi on jo käytössä");}
		if ($user['email'] === $email)
		{array_push ($virheet, "Sähköposti on jo käytössä");}
	}
	//kun käyttäjänimeä ja sähköpostia ei ole löytynyt tietokannasta
	if(count($virheet) == 0)
	{
		$password = md5($password_1);
				//md5 kryptaa salasanan ennen tietokantaan tallentamista
		$query ="INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
		mysqli_query($dbname, $query);
		$_SESSION['username'] =$username;
		$_SESSION['success'] = "Olet kirjautunut sisään";
		header ('location: login.php');
				//ohjaa uudelle sivulle kun kirjautuminen onnistuu
	}
}	
// SISÄÄNKIRJAUTUMINEN
	If(isset($_POST['login_kayt']))
	{
		$username = mysqli_real_escape_string($conn,trim($_POST["username"]));
		$password = mysqli_real_escape_string($conn,trim($_POST["password"]));
		
		if (empty($username))
		{array_push($virheet, "Käyttäjänimi tarvitaan");}
		if (empty($password))
		{array_push($virheet, "Salasana tarvitaan");}
	
		if (count($virheet)==0)
		{
			$password =md5($password);
			$query ="SELECT * FROM users WHERE username ='$username' AND password='$password'";
			$results =mysqli_query($conn, $query);
			if ($results ==1)/*(mysqli_num_rows($results)==1)*/
			{
				$_SESSION['username'] =$username;
				$_SESSION['success'] = "Olet kirjautunut sisään";
				header('location login_index.php');
			}
			else 
			array_push($virheet, "Väärä käyttäjätunnus tai salasana");
		}
	}

?>