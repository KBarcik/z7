<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />	
<title>Barciński</title>		
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body>
<center><h1> Rejestracja </h1>
<!-- Formularz rejestracji klienta -->
<form method="POST">
<br>
Login:<input type='text' name='user_login' id="user_login" required><br>
Hasło:<input type='password' name='password_v1' id="password_v1" required><br>
Powtórz hasło:<input type="password" name="password_v2" id="password_v2" required><br><br>
<input type="submit" value="Rejestruj"/><br>
<br>
Jesli masz już konto: <a href="index.php"> Zaloguj się </a><br><br></center>
</form>

<?php
// Logujemy się do bd, wpisujemy dane klienta i dodajemy je do bd
	$dbhost = "mysql01.barcik1.beep.pl";
	$dbuser = "barcik1";
	$dbpassword = "";
	$dbname = "laboratorium";
    $polaczenie = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
	if ($polaczenie->connect_error) die($polaczenie->connect_error);
	
// Dodajemy i sprawdzamy warunki nowego konta. Klient zostanie utworzony w momencie kiedy hasła będą się zgadzały
// oraz nie będzie użytkownika o tej samej nazwie
    $user_login = $_POST['user_login'];
	
    $password_v1 = $_POST['password_v1'];
    $password_v2 = $_POST['password_v2'];
        if ($user_login != NULL && $password_v1 != NULL && $password_v2 != NULL)
        {
    $wybierzLogin = "SELECT Login FROM `uzytkownicy` WHERE Login='$user_login'";
    $pobierzLogin = $polaczenie->query($wybierzLogin);
    $iloscLoginow = $pobierzLogin->num_rows;
	
	if($iloscLoginow>0) 
        {
            echo "Taki login już istnieje";
	}
	else {if ($password_v1 == $password_v2) 
	{
		mkdir("./$user_login");
            $dodajKlienta = "INSERT INTO `uzytkownicy` (user, pass) VALUES ('$user_login', '$password_v1')";
            $hasloLogin = $polaczenie->query($dodajKlienta);
            mysqli_close($polaczenie);
            if($hasloLogin == TRUE)
		{
                    echo "Rejestracja przebiegła pomyślnie";
		}
		else 
                {
                    echo "Rejestracaja nie powiodła się";}
		} 
                else 
                {
                    echo "Hasla nie są identyczne";}
	}	}
	
?>
<center><a href="indexlink.php"> Powrót do panelu głównego  </a></center>
</body>
</html>