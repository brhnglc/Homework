<?php
require 'connect.php';
ob_start();
session_start();
	if(isset($_POST['giris'])){
		$count = 0;
		$username = $_POST["username"];
		$password = $_POST["password"];
		if(!$username){
			#echo"<style></style>";
			echo"<style> #username{border: 2px solid red !important;}  </style>";
		}else{
			$count = $count+1;
			echo"<style> #username{border:none !important !important;}  </style>";
		}
		if(!$password){
			echo"<style> #password{border: 2px solid red !important;}  </style>";
		}else{
			$count = $count+1;
			echo"<style> #password{border:none !important !important;}  </style>";
		}
	
		if($count == 2){
			$kullanici_sor = $db->prepare('SELECT * FROM users WHERE user_name = ? && user_password = ?');
			$kullanici_sor->execute([$username,$password]);
			$say =$kullanici_sor->rowCount();
			if($say==1){
				$_SESSION['username'] = $username;
				echo "<div style='background-color:#99E5AB; padding:10 0 10 10'><h2 style='text-align:center; color:#0E7527; font-family: 'CSS Fonts List', 'Courier', Courier; '>Başarıyla Giriş Yapıldı!</h2></div>";
				header("refresh:1,logined_page/logined_page.php");
			}else{
				echo"<div style='background-color:#F66B55; padding:10 0 10 10'><h2 style='text-align:center; color:#781C0E; font-family: 'CSS Fonts List', 'Courier', Courier; '>Kullanıcı Adı Ve Şifreniz Uyuşmamaktadır!</h2></div>";	
			}
			
		}
		
	}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Login</title>
</head>
<body>
    <section class="background">
        <header>
            <!-- <nav>
                <ul class="nav__links">
                    
                    <li id="contact"><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav> -->
            <!-- <a class="cta" href="#"><button>Register</button></a> -->
        </header>
        <form method="post">
			<div class="content">	
				<img id="logo" src="./logo-blue.svg" alt="aCaNaturelogo">
				<h1 id="logintext" style="color: #0087a9; font-weight: 900 !important;">LOGIN</h1>
				<input id="username" type="text" name="username" placeholder="Username">
				<input id="password" type="password" name="password" placeholder="Password">
				<!-- <div class="button">
					<input id="button" type="button" value="Sign in">
				</div> -->
				<button  id="sign_in" name="giris">Sign in</button>
				<p class="register_yazi" style="color: white;">Don't have an account yet?</p>
				<a class="register_yazi" style="text-decoration: underline;" href="register.php">Create new account</a>
			</div>
		</form>
    </section>
</body>
</html>