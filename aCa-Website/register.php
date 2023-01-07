	
<?php
require 'connect.php';
ob_start();
session_start();
	if(isset($_POST['register'])){
	$count = 0;
	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password_again = @$_POST["password-again"];		

	if(!$username){ 
		echo"<style> #username{border: 2px solid red !important;}  </style>";
	}else{
		$count = $count+1;
		echo"<style> #username{border:none !important !important;}</style>";
	}
	if(!$password || !$password_again){
		echo"<style> #password{border: 2px solid red !important;}  </style>";
	}else{
		$count = $count+1;
		echo"<style> #password{border:none !important !important;}  </style>";
	}
	if($password!=$password_again){
		 echo "<script> alert('Lütfen Şifreleriniz Aynı Olsun')</script>";
	}else{
		$count = $count+1;
	}
	if(!$surname){
		echo"<style> #surname{border: 2px solid red !important;}  </style>";
	}else{
		$count = $count+1;
		echo"<style> #surname{border:none !important !important;}  </style>";
	}
	if(!$name){
		echo"<style> #name{border: 2px solid red !important;}  </style>";
	}else{
		$count = $count+1;
		echo"<style> #name{border:none !important !important;}  </style>";
	}
	if(!$email){
		echo"<style> #email{border: 2px solid red !important;}  </style>";
	}else{
		$count = $count+1;
		echo"<style> #email{border:none !important !important;}  </style>";
	}
	
	if($count == 6){
	 $as = mysqli_connect("localhost","root","","register");
	 $ass = "SELECT * FROM users WHERE user_name='$username'";
	 $res_u = mysqli_query($as,$ass) or die (mysqli_error($as));
	  $as1 = mysqli_connect("localhost","root","","register");
	 $ass1 = "SELECT * FROM users WHERE user_email='$email'";
	 $res_u1 = mysqli_query($as1,$ass1) or die (mysqli_error($as1));
	 if(mysqli_num_rows($res_u)>0){
		 echo"<div style='background-color:#F66B55; padding:10 0 10 10'><h2 style='text-align:center; color:#781C0E; font-family: 'CSS Fonts List', 'Courier', Courier; '>Bu Kullancı Adı Kullanılmakta!</h2></div>";	
	 }elseif(mysqli_num_rows($res_u1)>0){
		echo"<div style='background-color:#F66B55; padding:10 0 10 10'><h2 style='text-align:center; color:#781C0E; font-family: 'CSS Fonts List', 'Courier', Courier; '>Bu Email Adresine Kayıtlı Bir Hesap Bulunmakta!</h2></div>";
	 }else{
	 
	 $sorgu = $db->prepare('INSERT INTO users SET user_name = ?,user_surname = ?,user_username = ?,user_email = ?,user_password= ?');
	 $ekle = $sorgu->execute([$username,$surname,$username,$email,$password]);
	 if($ekle){
		 echo "<div style='background-color:#99E5AB; padding:10 0 10 10'><h2 style='text-align:center; color:#0E7527; font-family: 'CSS Fonts List', 'Courier', Courier; '>Başarıyla Üye Olundu!</h2></div>";
		 header("refresh:2,index.php");
	 }else{
		 echo "bir hata oldu";
	 }
	}
	}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>

<body>
    <section class="background">
		<form method="post">	
			<div class="content">
				<img id="logo" src="./logo-blue.svg" alt="aCaNaturelogo">
				<h1 id="logintext" style="color: #0087a9;">REGISTER</h1>
				<input id="name" name="name" type="text" placeholder="Name">
				<input id="surname" name="surname" type="text" placeholder="Surname">
				<input id="username" name="username" type="text" placeholder="Username">
				<input id="email" name="email" type="email" placeholder="Email">
				<input id="password" name="password" type="password" placeholder="Password">
				<input id="password" name="password-again" type="password" placeholder="Password again">
				<button id="create" name="register">Create</button></a>
			</div>
		</form>
       
    </section>
</body>
</html>

