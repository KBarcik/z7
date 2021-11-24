<html>
<head>
<title>Barciński</title>
</head>
<body>
<?php

    session_start();
    $user = $_SESSION['user'];
    $nazwa = $_POST['nazwa']; 
    $adres = "./$user/$nazwa/index.php";
    $adresu = "./$user/$nazwa/upload.php";
    mkdir("./$user/$nazwa");
    //echo $adres;
    copy("./index.php", "$adres");
    copy("./upload.php", "$adresu");
    header('Location: panelu.php');
    
?>