<?php
require 'connect.php';
ob_start();
session_start();
	if(isset($_POST['giris'])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		if(!$username){
			echo "Lütfen kullancı adınızı girin";
		}elseif(!$password){
			echo "Lütfen şifrenizi girin";
		}else{
			$kullanici_sor = $db->prepare('SELECT * FROM users WHERE user_name = ? || user_password = ?');
			$kullanici_sor->execute([$username,$password]);
			echo $say =$kullanici_sor->rowCount();
			if($say==1){
				$_SESSION['username']=$username;
				echo "başarıyla giriş yaptınız";
				header("refresh:2,index.php");
			}else{
				echo "bir hata oluştu";
			}
			
		}
		
	}
	
	if(isset($_POST['register'])){
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password_again = @$_POST["password-again"];		
	if(!$username){
		echo "Lütfen kullancı adınızı girin";
	}elseif(!$password || !$password_again){
		echo "Şifrenizi giriniz";
	}elseif($password!=$password_again){
		echo "Girdiginiz şifreler aynı olması gerekiyor";
	}elseif(!$surname || !$username){
		echo "Lütfen isim soyisim giriniz";
	}elseif(!$email){
		echo "Lütfen email adresini giriniz";
	}else{
	 $sorgu = $db->prepare('INSERT INTO users SET user_name = ?,user_surname = ?,user_username = ?,user_email = ?,user_password= ?');
	 $ekle = $sorgu->execute([$username,$surname,$username,$email,$password]);
	 if($ekle){
		 echo "Kayıt başarıyla gerkçekleşti";
		 header("refresh:2,login.php");
	 }else{
		 echo "bir hata oldu";
	 }
	}
	
	}
?>