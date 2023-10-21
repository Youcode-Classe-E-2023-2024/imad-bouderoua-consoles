const slides = document.querySelectorAll(".imgnews");
let left = document.getElementById("left");
let rigth = document.getElementById("right");
let i = 0;
function hideall(array,i){
    array.forEach(element => {
      if(element !== array[i] ){
        element.style.display = "none";}
    });
  }


slides[i].classList.add('imgnews');
hideall(slides,i);

left.addEventListener("click", function() {
    
    i++;
    if(i === slides.length){
      i = 0;}
    slides[i].style.display = "block";
    hideall(slides,i);
})

rigth.addEventListener("click", function() {
i--;
if(i === -1){
      i = slides.length -1;}
slides[i].style.display = "block";
hideall(slides,i);
})


function myFunction() {
  i++;
  if(i === slides.length){
    i = 0;}
    slides[i].style.display = "block";
  hideall(slides,i);
}

myFunction();


const interval = 5000;
setInterval(myFunction, interval);
// pagination
document.addEventListener('DOMContentLoaded', function() {
  var links = document.querySelectorAll('.pagination__link');

  links.forEach(function(link) {
      link.addEventListener('click', function(event) {
          event.preventDefault();

          links.forEach(function(link) {
              link.classList.remove('is_active');
          });

          this.classList.add('is_active');
      });
  });
});
// handling cartes
var size = 0;

var s = 0;
let t = 5;

const cartes = document.querySelectorAll('.cartes');
console.log(cartes.length)
function hidecartes(start,stop){

  s = start;
  t = stop;
  let c = 0;
  cartes.forEach(element => {
      if( c>= start && c < stop + size){
        element.style.display = "block";
      }else{
        element.style.display = "none";
      }
      c++;
    });
}
hidecartes(s,t);

const buttonsize = document.querySelector(".changesize");

buttonsize.addEventListener("click", function () {
  if (size === 0) {
      size = 5;
      hidecartes(s,t);
  } else {
      size = 0;
      hidecartes(s,t);
  }
});

// from the front page
function selectAvatar(avatarName) {
        
  document.getElementById('chosenAvatar').value = avatarName;
}

var accountElement = document.querySelector('.account');
document.querySelector('.exitbutton').addEventListener("click", function () {
console.log("dkhelt");

if (accountElement.style.display === "block" || accountElement.style.display === "") {
accountElement.style.display = "none";
return;
} else {
accountElement.style.display = "block";
return;
}
});

document.querySelector('.logininfo').addEventListener("click", function () {
if (accountElement.style.display === "none" || accountElement.style.display === "") {
accountElement.style.display = "block";
} else {
accountElement.style.display = "none";
}
})
// download and login
function handleCarteClick(carte) {
  var username = carte.getAttribute('data-username');
  
  if (username) {
      showDownloadDiv();
  } else {
      showAccountDiv();
  }
}

function showDownloadDiv() {
  var downloadDiv = document.querySelector('.download');
  if (downloadDiv) {
      downloadDiv.style.display = 'block';
  }
}

function showAccountDiv() {
  var accountDiv = document.querySelector('.account');
  if (accountDiv) {
      accountDiv.style.display = 'block';
  }
}
document.querySelector('.exitdownload').addEventListener("click", function () {
  console.log("dkhelt");
  
  if (document.querySelector('.download').style.display === "block" || document.querySelector('.download').style.display === "") {
  document.querySelector('.download').style.display = "none";
  return;
  } else {
  document.querySelector('.download').style.display = "block";
  return;
  }
  });
  // subscribe
  var premium = false;
  document.querySelector('.Btn').addEventListener("click", function () {
    if (document.querySelector('.premium').style.display === "none" || document.querySelector('.premium').style.display === "") {
        document.querySelector('.premium').style.display = "block";
    } else {
        document.querySelector('.premium').style.display = "none";
    }
});



document.querySelector('#premiumButton').addEventListener("click", function () {
console.log("dkhelt");
if (premium === false) {
    premium = true;
    document.querySelector('#premiumButton').textContent = "You are premium";
    document.querySelector('.redline').style.display = "none";
} else {
    premium = false;
    document.querySelector('#premiumButton').textContent = "Go Premium";console.log("fabor")
    document.querySelector('.redline').style.display = "block";
}
});
document.querySelector('.cssbuttons-io-button').addEventListener("click", function () {
  console.log("dkhelt");
  if (document.querySelector('.premium').style.display === "none" || document.querySelector('.premium').style.display === "") {
      document.querySelector('.premium').style.display = "block";
  } else {
      document.querySelector('.premium').style.display = "none";
  }
});
// user rating
function handleRatingSelection(selectedValue ,carterateid) {

  
  console.log('Selected rating:', selectedValue,"id",carterateid);
      // test ajax 
    console.log("wssssalajax");

    const productId = carterateid;
    const rating = selectedValue; 

    fetch('/brief3/rate_handler.php', { 
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ productId, rating }),
    })
      .then((response) => {
        if (response.ok) {
          console.log("ok");
        } else {
          console.log("no");
        }
      })
      .catch((error) => {
        console.error('Error:', error);
      });

}
// test styling star
