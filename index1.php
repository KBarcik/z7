<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panelu.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Barciński</title>
</head>

<body>
<center><h1> Logowanie </h1>
	
	<form action="zaloguj.php" method="post">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		<input type="submit" value="Zaloguj się" />
	    <br /><br>
    </form>
	<a href="http://barcik1.beep.pl/Barciński/z7/indexlink.php" > Panel główny </a><br/>
<br>   
        <a href="http://barcik1.beep.pl/Barciński/index.php" > Powrót do Barciński </a><br/></center>
	
<?php
    if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
 
<br><br>
</body>
</html>