<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany1']))
	{
		header('Location: index1.php');
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
    //print_r($pliki);
	//foreach($pliki as $plik) print "<p><a href = ./'$plik'</a></p>";

      $url1 = $_SERVER['SERVER_NAME'];
      $url2 = $_SERVER['PHP_SELF'];
      $url2 = explode(DIRECTORY_SEPARATOR, $url2);
      for ($i=0 ; $i<=sizeof($url2) ; $i++)
      {
          if (preg_match('/\.(php|php5|php4|php3)$/', $url2[$i]))
          {
              unset($url2[$i]);
          }
      }
      $url2 = implode(DIRECTORY_SEPARATOR, $url2);
      $url = $url1 . $url2;

      $str = substr($url2, 4);
      $dir = "./";
      $pliki = scandir($dir,1);

      //echo $str;

      if (is_dir($dir)){
		if ($dh = opendir($dir)){
		  while (($file = readdir($dh)) !== false){
			  if($file != "." and $file != ".." and $file != "index.php" and $file != "upload.php"){
				echo "<a href = './".$file."' download>".$file."</a><br>";
			  }
		  }
		  closedir($dh);
		}
	  }
    
      echo "<br><br>";

      print '<a href="/z7/panelu.php">Cofnij</a>';
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
 Wybierz plik do załadowania:
 <input type="file" name="fileToUpload" id="fileToUpload">
 <input type="submit" value="Upload" name="submit">
</form>
</body>
</html>