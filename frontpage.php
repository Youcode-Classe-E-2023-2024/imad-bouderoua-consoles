<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HTML</title>

<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
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
    <div class="shortnews"></div>
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
</script>


