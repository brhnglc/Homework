<?php 
include 'ayar.php';
session_start();
$username=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9a5d0d0ceb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="template.css">
    <title>aCaNature | Timeline</title>
</head>
<body>

    <header>
        <img id="logo" src="logo-white.svg" style="width: 15%;" alt="aCaNaturelogo">
    </header>

    <div class="container">

        <section>
            <img id="section_pp" src="./new-logo.svg" alt="aCaNature Profil Picture">
            <p id="name_surname" style="margin-bottom: 30px; font-size: x-large;"><?php echo $username;?></p>
            
            <div class="section_lists">
                <ul class="lists">
                    <li><a id="sections_a" href="#">MY PROFILE</a></li>
                    <li><a id="sections_a" href="#">FRIENDS</a></li>
                    <li><a id="sections_a" href="#">MESSAGE</a></li>
                    <li><a id="sections_a" href="#">ACTIVITIES</a></li>
                    <li><a id="sections_a" href="#">SAVEDS</a></li>
                </ul>
            </div>
            <div id="log-out">
                <div class="logout"> 
                    <a id="logout_link" href="../index.php">
                        <img id="logout_img" src="logout-svgrepo-red.svg" alt="aCa logout image">
                        <p id="logout_text">LOG OUT</p>
                    </a>
                </div>
            </div>
			<a href="post_adder.php"><button id="new_post_button">New Post!</button></a>
        </section>
        
        <div class="post_area">

            <div class="discover">
                <img id="discover_img" src="./new-logo.svg" alt="aCaNature kesfet image">
                <p id="discover_text">Discover your nearest camping spots and trekking routes!</p>
                <button id="discover_button">KEŞFET!</button>
            </div>

            <div class="posts">
				<?php
					$veri = $db->prepare("SELECT * FROM yazilar ORDER BY yazilar_id DESC");
					$veri->execute();
					$islem = $veri->fetchALL(PDO::FETCH_ASSOC);
					foreach($islem as $row){
						echo '
						<div id="post1">
							<div id="post_top">
								<img id="posts_pp" src="./new-logo.svg" alt="posts profile picture">
								<div class="post_name_date">
									<p id="post_name_surname">'.$row["user_name"].'</p>
									<p id="post_date_time">'.$row["yazilar_tarih"].'</p>
								</div>
							</div>
							<div id="post_middle">
								<p style="padding: 1em;">'.$row["yazilar_aciklama"].'</p>
							   <img id="post_image" src="data:image/jpeg;base64,'.base64_encode($row['yazilar_resim']).'">
							</div>
							<div id="post_bottom">
								<img id="like-button" class="circle-like" src="./fire-outline-colorful.svg" style="width: 6%;" alt="">
								<a  href="empytmap.php?'.$row['yazilar_long'].'&'.$row['yazilar_lat'].'" style="width: 6%;"><img id="map-button" class="circle-map" src="./compass.svg"  alt=""></a>
							</div>
						</div>
						';
					}
             
                ?>
            </div>
        </div>
    </div>
</body>
</html>