<?php
try{
	$db = new PDO("mysql:host=localhost; dbname=register; charset=utf8" ,'root', '');
	#echo "veri tabanı baglanıldı";
}
catch (Exception $e){
	echo $e->getMessage;
}

?>