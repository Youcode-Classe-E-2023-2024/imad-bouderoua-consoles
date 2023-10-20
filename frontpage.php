
<?php 
session_start();

include 'connection.php';

$sql  = "SELECT imgnewsname  FROM newsimages ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$images = $stmt->fetchAll();

$sql3  = "SELECT ad  FROM ads ORDER BY id DESC";

$stmt3 = $conn->prepare($sql3);
$stmt3->execute();

$imagesads = $stmt3->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HTML</title>

<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="quote">Unlock the Adventure</div><div class="quote2">All copyrights are reserved 2023</div>
    <div class="logo"> <img class="logoimag" src="backimages/logo2.png" alt=""></div>
    <div class="profil">
        <i  class="fa-solid fa-user" style="color: white;"></i>
    </div>
    <span><span></span></span>
    <div class="wrap">
    <a href="shop.php?platform=playstation" onmouseover="playstationin()" onmouseout="playstationout()">
    <div>Playstation</div>
</a>
<a href="shop.php?platform=pc" onmouseover="pcin()" onmouseout="pcout()">
    <div>PC</div>
</a>
<a href="shop.php?platform=xbox" onmouseover="xbowin()" onmouseout="xboxout()">
    <div>Xbox</div>
</a>
        <a href="#"><div></div></a>
            
    </div>
    
    <div class="account">
    <svg class="exitbutton" style="position: relative; font-size:larger; margin-top:2%; right: -42%; width: 1em;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        <?php if (isset($_SESSION['name']) && isset($_SESSION['chosenAvatar'])): ?>
            <img src="avatars/<?php echo $_SESSION['chosenAvatar']; ?>" alt="Selected Avatar">
            <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
            <form method="POST" action="disconnect.php">
                <button type="submit" name="disconnect">Disconnect</button>
            </form>
        <?php else: ?>
        <h2>Welcome!</h2>
        <p>Please enter your email and password to log in:</p>
        <form method="POST" action="login.php">
    <label for="email">Email:</label>
    <input type="email" id="email" require name="email" required><br>
    
    <label for="password">Password:</label>
    <input  type="password" id="password" name="password" required><br>
    
    <label for="avatar">Choose an avatar:</label>
    <div class="avatars">
        <img src="avatars/download.jpg" alt="" onclick="selectAvatar('download.jpg')">
        <img src="avatars/images.jpg" alt="" onclick="selectAvatar('images.jpg')">
        <img src="avatars/images.png" alt="" onclick="selectAvatar('images.png')">
    </div>

    
    <input type="hidden" id="chosenAvatar" require name="chosenAvatar" value="">
    
    <button type="submit" name="log">Log In</button>
    </form>
    <?php endif; ?>
</div>

    <div class="shortnews">
    <?php if ($stmt->rowCount() > 0) { ?>
	
    <?php foreach ($images as $image): ?>
    <img class="imgnewsmini newsfront" src="newsfolder/<?=$image['imgnewsname']?> " alt="">        
    
    <?php endforeach;} ?>
    </div>
    <div class="ads" style="  top:18%;">
    <?php if ($stmt3->rowCount() > 0) { ?>
	
    <?php foreach ($imagesads as $imageads): ?>
    <img class="adn imgnewsmini newsfront" src="adsfolder/<?=$imageads['ad']?> " alt="">        
    
    <?php endforeach;} ?>
    </div>
    
</body>
</html>
<script>
    function playstationin() {
        document.querySelector('body').style.backgroundImage = 'none';
        document.querySelector('body').style.backgroundImage = "url('backimages/pexels-borja-lopez-1346154 (1).jpg')";
        document.querySelector('body').style.backgroundSize = 'contain';
        document.querySelector('body').style.backgroundPosition = "center center";
    }

    function playstationout() {
        document.querySelector('body').style.backgroundImage = "url('backimages/ghost-call-of-duty-modern-warfare-ii-thumb.jpg')";
    }

    function pcin() {
        document.querySelector('body').style.backgroundImage = 'none';
        document.querySelector('body').style.backgroundImage = "url('backimages/The-Beginners-Guide-to-Creating-your-Dream-Gaming-Setupf.png')";
        document.querySelector('body').style.backgroundSize = 'contain';
    }

    function pcout() {
        document.querySelector('body').style.backgroundImage = "url('backimages/ghost-call-of-duty-modern-warfare-ii-thumb.jpg')";
    }

    function xbowin() {
        document.querySelector('body').style.backgroundImage = 'none';
        document.querySelector('body').style.backgroundImage = "url('backimages/marko-blazevic-rMCwWG2kSyU-unsplash.jpg')";
        document.querySelector('body').style.backgroundSize = 'contain';
        document.querySelector('body').style.backgroundPosition = "center center";
    }

    function xboxout() {
        document.querySelector('body').style.backgroundImage = "url('backimages/ghost-call-of-duty-modern-warfare-ii-thumb.jpg')";
    }



    const miniimgs = document.querySelectorAll(".imgnewsmini");
    console.log("mini" + miniimgs.length)
const ads = document.querySelectorAll(".adn");
var i = 0;
var a = 0;

function hideall(array, index) {
  array.forEach((element, idx) => {
    element.style.display = idx === index ? "block" : "none";
  });
}

hideall(miniimgs, i);
hideall(ads, a);

function cycleImagesAndAds() {
    
  i++;
  if (i === miniimgs.length - ads.length) {
    i = 0;
  }
  a++;
  if (a === ads.length) {
    a = 0;
  }

  hideall(miniimgs, i);
  hideall(ads, a);
}

cycleImagesAndAds();

const interval = 4000;
setInterval(cycleImagesAndAds, interval);


    function selectAvatar(avatarName) {
        
        document.getElementById('chosenAvatar').value = avatarName;
    }

    var accountElement = document.querySelector('.account');
    document.querySelector('.exitbutton').addEventListener("click", function () {
  console.log("dkhelt");
  
  if (accountElement.style.display === "block" || accountElement.style.display === "") {
      accountElement.style.display = "none";
  } else {
      accountElement.style.display = "block";
  }
});

document.querySelector('.fa-solid').addEventListener("click", function () {
    console.log("dkhelt2")
    if (accountElement.style.display === "block" || accountElement.style.display === "") {
      accountElement.style.display = "none";
  } else {
      accountElement.style.display = "block";
  }
})
</script>



<script src="index.js"></script>