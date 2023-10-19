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