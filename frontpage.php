
<?php 
session_start();

include 'connection.php';

$sql  = "SELECT imgnewsname  FROM newsimages ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$images = $stmt->fetchAll();
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
    <div class="logo"> <img class="logoimag" src="backimages/logo2.png" alt=""></div>
    <div class="profil">
        <i class="fa-solid fa-user" style="color: white;"></i>
    </div>
    <span><span></span></span>
    <div class="wrap">
        <a onmouseover="playstationin()" onmouseout="playstationout()" href="#"><div></div></a>
        <a onmouseover="pcin()" onmouseout="pcout()" href="#"><div></div></a>
        <a onmouseover="xbowin()" onmouseout="xboxout()" href="#"><div></div></a>
        <a href="#"><div></div></a>
            
    </div>
    
    <div class="account">
        <?php if (isset($_SESSION['name']) && isset($_SESSION['chosenAvatar'])): ?>
            <img style="margin-top: 10%;" src="avatars/<?php echo $_SESSION['chosenAvatar']; ?>" alt="Selected Avatar">
            <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <?php else: ?>
        <h2>Welcome!</h2>
        <p>Please enter your email and password to log in:</p>
        <?php echo "logi" ?>
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

    
    <input type="hidden" id="chosenAvatar" name="chosenAvatar" value="">
    
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
</body>
</html>
<script>
    function playstationin() {
        document.querySelector('body').style.backgroundImage = 'none';
        document.querySelector('body').style.backgroundImage = "url('backimages/federico-vitale-7QvJbALhefo-unsplash.jpg')";
        document.querySelector('body').style.backgroundSize = 'contain';
        document.querySelector('body').style.backgroundPosition = "center center";
    }

    function playstationout() {
        document.querySelector('body').style.backgroundImage = "url('backimages/ghost-call-of-duty-modern-warfare-ii-thumb.jpg')";
    }

    function pcin() {
        document.querySelector('body').style.backgroundImage = 'none';
        document.querySelector('body').style.backgroundImage = "url('backimages/omar-prestwich-0HAPFlyy9o4-unsplash.jpg')";
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

    var i =0;
    function hideall(array,i){
    array.forEach(element => {
      if(element !== array[i] ){
        element.style.display = "none";}
    });
  }
  hideall(miniimgs,i);
function myFunction() {
  i++;
  if(i === miniimgs.length){
    i = 0;}
    miniimgs[i].style.display = "block";
  hideall(miniimgs,i);
}

myFunction();


const interval = 4000;
setInterval(myFunction, interval);


    function selectAvatar(avatarName) {
        
        document.getElementById('chosenAvatar').value = avatarName;
    }
</script>



<script src="index.js"></script>