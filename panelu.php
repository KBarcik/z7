<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany1']))
	{
		header('Location: index.php');
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
	
<?php

	echo "<p>Witaj ".$_SESSION['imie1'].'! [ <a href="logout.php">Wyloguj się!</a>]</p>';
   // echo "<p><b>E-mail</b>: ".$_SESSION['email'];

	$user = $_SESSION['user'];
	$dir = "./$user";
	$pliki = scandir($dir,1);
	echo "";
    //print_r($pliki);
	//foreach($pliki as $plik) print "<p><a href = ./'$plik'</a></p>";
	if (is_dir($dir)){
		if ($dh = opendir($dir)){
		  while (($file = readdir($dh)) !== false){
			  if($file != "." and $file != ".."){
				echo "<a href = ./".$user."/". $file . ">".$file."</a><br>";
			  }
		  }
		  closedir($dh);
		}
	  }


?>
<br>
	<form method="POST" action="dodaj.php">
	Nazwa nowego podkatalogu: <input type="text" name="nazwa">
	<input type="submit" value="Utwórz"/>
</body>
</html>