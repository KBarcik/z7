<?php
$target_dir = ".";
$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
 { echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded."; }
 else { echo "Error uploading file."; }
header('Location: index.php');
?>