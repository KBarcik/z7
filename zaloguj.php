<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				$ip = $_SERVER["REMOTE_ADDR"];
                    function ip_details($ip) 
                    {
                     $json = file_get_contents ("https://ipinfo.io/{$ip}/geo");
                    $details = json_decode ($json);
                    return $details;
                    }
                    $data = date("Y-m-d H:i:s");
                    $login = $_POST['login'];
                   
				if ($haslo=$wiersz['pass'])
				{
                     $result = mysqli_query ($polaczenie, "SELECT * FROM uzytkownicy");
					$_SESSION['zalogowany1'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['user'] = $wiersz['user'];	
					$_SESSION['email'] = $wiersz['email'];
                    $_SESSION['imie1'] = $wiersz['imie'];
					$_SESSION['nazwisko1'] = $wiersz['nazwisko'];		
					mysqli_query($polaczenie, "UPDATE uzytkownicy SET datagodz = '$data', ip = '$ip' WHERE user = '$login'"); 
					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: panelu.php');
				}
		    	else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowe dane logowania!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>