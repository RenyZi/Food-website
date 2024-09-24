const swiper = new Swiper('#swiperone',{
    effect: 'fade',
    fadeEffect:{
        crossFade: true,
    },
    autoplay:{
        delay:5000,
        disableOnInteraction: false,
    },
    loop: true,
    lazyloading:true,
})

var swper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 150,
    modifier: 2,
    slideShadows: true,
  },
  lazyloading: true,
  autoplay:{
    delay:5000,
    disableOnInteraction: false,
},
loop: true,
});

//geting cartegoy divs

const divs = document.querySelectorAll(".cartegor");
const badge = document.querySelector(".badge");

function senddata(divid){

  var data = "div="+divid;
  const xhhtp = new XMLHttpRequest();
  xhhtp.open("POST","cart.php",true);
  xhhtp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xhhtp.send(data);

}

function badgval(infor){
    const xhp = new XMLHttpRequest();
    var infors = "data="+infor;
    xhp.open("POST","badge.php",true);
    xhp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhp.send(infors);
}

window.onload = function(){
  const xxxht = new XMLHttpRequest();
  xxxht.onreadystatechange= function(){
    if(this.status === 200 && this.readyState === 4){
      badge.innerHTML = this.responseText;
    }
  }
  xxxht.open("GET","badge.php");
  xxxht.send();

}



var x = 0;

for( let i=0; i<divs.length; i++){
  divs[i].addEventListener('click',()=>{
    var divid = divs[i].id;
    var datax = (x+=1);
    badgval(datax);
  const xxxht = new XMLHttpRequest();
  xxxht.onreadystatechange= function(){
    if(this.status === 200 && this.readyState === 4){
      badge.innerHTML = this.responseText;
    }
  }
  xxxht.open("GET","badge.php");
  xxxht.send();
    senddata(divid);
    alert("You have added one item to cart");  
    
  },{once:true})
}


//Scroll behavior
const smooth_scroll = document.querySelector(".smooth-scroll-wrapper");
const scroll_content = document.querySelector(".scroll-content");
let scrollpostion = 0;
let targetscrolpostion = 0;
const scrollspeed = 0.1;

function setwrapheight(){
  smooth_scroll.style.height = `${scroll_content.getBoundingClientRect().height}px`;
}

window.addEventListener("scroll", ()=>{
  targetscrolpostion = window.scrollY;
});

function smoothScroll(){
  scrollpostion += (targetscrolpostion - scrollpostion) * scrollspeed;
  scroll_content.style.transform = translate3d(0, 0, 0);

  requestAnimationFrame(smoothScroll);
}

setwrapheight();
smoothScroll();

window.addEventListener('resize',setwrapheight);


//message

const formsend = document.getElementById("formsend");
formsend.addEventListener("click",()=>{
  alert("We have received your older, after 2 hours of time your will get your product at your delivery. Thank you!");
})
  
  








