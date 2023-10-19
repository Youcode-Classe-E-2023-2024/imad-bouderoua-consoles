<?php 
 session_start();

# database connection file
include 'connection.php';

# fetching images
$sql  = "SELECT imgnewsname  FROM newsimages ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();

$images = $stmt->fetchAll();

$sql2 ="SELECT * FROM cartes WHERE platform = 'playstation' ORDER BY id DESC;";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();

$cartes = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <div class="header">
        <div class="headerup">
            <div >
                <img class="logo" src="backimages/logo2.png" alt="">
            </div>
            <div class="userstuff">
                <div class="upbutton" style="width: 215px;"> <div style=""><i class="iconsup fa-solid fa-download"></i></div>Download Console+</div>
                <div class="upbutton"> <i class="iconsup fa-solid fa-phone"></i>Support</div>
                <div class="upbutton" ><i class="iconsup fa-regular fa-user"></i> Account</div>
            </div>
        </div>
        <div class="headerdown">
            <div class="navbar">
                <span>menu 1</span>
                <span>menu 1</span>
                <span>menu 1</span>
                <span>menu 1</span>
                <span>menu 1</span>
                <span>menu 1</span>
            </div>
            <div class="inputBox_container">
  <svg class="search_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" alt="search icon">
    <path d="M46.599 46.599a4.498 4.498 0 0 1-6.363 0l-7.941-7.941C29.028 40.749 25.167 42 21 42 9.402 42 0 32.598 0 21S9.402 0 21 0s21 9.402 21 21c0 4.167-1.251 8.028-3.342 11.295l7.941 7.941a4.498 4.498 0 0 1 0 6.363zM21 6C12.717 6 6 12.714 6 21s6.717 15 15 15c8.286 0 15-6.714 15-15S29.286 6 21 6z">
    </path>
  </svg>
  <input class="inputBox" id="inputBox" type="text" placeholder="Search For Products">
</div>
            
            <button class="Btn">
 Go Premium
            </button>
        </div>

    </div>
    <div class="newscontainer">
    <div class="news">
        <div class="slideleft" id="left"><i class="fa-solid fa-angle-left"></i></div>
        <div class="slideright"  id="right"><i class="fa-solid fa-angle-right"></i></div>
        
        <?php if ($stmt->rowCount() > 0) { ?>
	
        <?php foreach ($images as $image): ?>
        <img class="imgnews" src="newsfolder/<?=$image['imgnewsname']?> " alt="">        
        
    <?php endforeach;} ?>
    </div>
    </div>
    </div>
    <div class="sellcont">


                
    <?php foreach ($cartes as $carte): $uniqueName = 'star-' . $carte['id'];?>
                                
                                <div class="cartes">
                                    <div style="margin: 1% 1%; font-size: 20px; display: flex;">
                                        <img class="imgcarte" src="gamesimages/<?=$carte['gameimg']?>" alt="">
                                        <div style="margin: 12% 15%;">
                                            <div style="width: 150px; line-height:1.6; color:#000;">
                                                Year: <div style="display: flex; justify-content: center" class="styletype"><?php echo $carte['year']; ?></div>
                                            </div>
                                            <div style="width: 180px; line-height:1.6;color:#000;">
                                                Kind: <div style="display:flex; justify-content:center" class="styletype"><?php echo $carte['type']; ?></div>
                                            </div>
                                            <div class="Rate " style="color:#000;">Rate</div>
                                            <div style="margin-top: 1%;" class="rating">
                                                <input type="radio" id="<?= $uniqueName ?>-1" name="<?= $uniqueName ?>" value="star-1">
                                                <label for="<?= $uniqueName ?>-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                                    </svg>
                                                </label>
                                                <input type="radio" id="<?= $uniqueName ?>-2" name="<?= $uniqueName ?>" value="star-2">
                                                <label for="<?= $uniqueName ?>-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                                    </svg>
                                                </label>
                                                <input type="radio" id="<?= $uniqueName ?>-3" name="<?= $uniqueName ?>" value="star-3">
                                                <label for="<?= $uniqueName ?>-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                                    </svg>
                                                </label>
                                                <input type="radio" id="<?= $uniqueName ?>-4" name="<?= $uniqueName ?>" value="star-4">
                                                <label for="<?= $uniqueName ?>-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                                    </svg>
                                                </label>
                                                <input type="radio" id="<?= $uniqueName ?>-5" name="<?= $uniqueName ?>" value="star-5">
                                                <label for="<?= $uniqueName ?>-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path>
                                                    </svg>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="color:#00000; font-size:larger; width: 95%; padding:2% 2%; margin: 4% auto;"><?php echo $carte['description']; ?></div>
                                </div>
                            <?php endforeach; ?>
                            

  
            <div class="changesize">
            <svg class="iconsize" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M544 416L32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l512 0c17.7 0 32-14.3 32-32s-14.3-32-32-32zm22.6-137.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L480 274.7 480 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 210.7-41.4-41.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96zm-320-45.3c-12.5-12.5-32.8-12.5-45.3 0L160 274.7 160 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 210.7L54.6 233.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96c12.5-12.5 12.5-32.8 0-45.3z"/></svg>
            </div>

        
    </div>
    <div class="wrapper">
        <ul class="pagination">
        <li class="pagination__item"><a href="#" onclick="hidecartes(0,5);" class="pagination__link is_active">1</a></li>
        <li class="pagination__item"><a href="#" onclick="hidecartes(5,10);" class="pagination__link ">2</a></li>
        <li class="pagination__item"><a href="#" onclick="hidecartes(10,15);" class="pagination__link">3</a></li>
            <li class="pagination__item"><a href="#" class="pagination__link">4</a></li>
            <li class="pagination__item"><a href="#" class="pagination__link">5</a></li>
            <li class="pagination__item"><a href="#" class="pagination__link">6</a></li>
        </ul>
    </div>
    <footer>
        <div class="footer">
            
            <img src="backimages/logo2.png" style=" height:80px;  margin-left:30%;" alt="">
            <div style=" width:50%;margin:auto; display: flex;">
                <i style="font-size: 50px; color:green;" class="fa-brands fa-facebook"></i>
                <i style="font-size: 50px; color:green;" class="fa-brands fa-discord"></i>
                <i style="font-size: 50px; color:green;" class="fa-brands fa-twitter"></i>
            </div>
        </div>
    </footer>
    <!-- account -->
    <div class="account">
        <h2>Welcome!</h2>
        <p>Please enter your email and password to log in:</p>
        <form>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required><br>
      
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required><br>
      
          <label for="avatar">Choose an avatar:</label>
          <div class="avatars">
            <img src="avatars/download.jpg" alt="">
            <img src="avatars/images.jpg" alt="">
            <img src="avatars/images.png" alt="">
          </div>
      
          <button type="submit">Log In</button>
        </form>
      </div>
</body>
</html>
<script src="index.js"></script>