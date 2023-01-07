<?php

// Veri tabanı bağlantısı

$host 		= "localhost";
$dbname 	= "php_blog";
$charset 	= "utf8";
$root 		= "root";
$password 	= "";

try{
	
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
}catch(PDOExeption $error){
  echo $error->getMessage();
}
?>