//Geting the id 
const profilebutton = document.querySelector("#profbutt");
const profiledetails = document.querySelector(".info");
const closebutton = document.querySelector("#back");
const infordata = document.querySelector(".infordata");
const orderdfood = document.querySelector(".orderdfood");
const orders = document.getElementById("orders");
const locationDetails = document.querySelector(".locationDetails");



profilebutton.addEventListener('click',()=>{
    profiledetails.classList.add('display')?.classList.add('display');
    profiledetails.classList.remove('disaper');
    //fetching informatin ajax
    const xhtt = new XMLHttpRequest();
    xhtt.onreadystatechange = function(){
        if(this.status==200 && this.readyState == 4){
            infordata.innerHTML = this.responseText;  
        }
    }
    xhtt.open("GET","information.php");
    xhtt.send();
    
})

closebutton.addEventListener('click',()=>{
    profiledetails.classList.add('disaper')?.classList.add('disaper');
    profiledetails.classList.remove('display');
})


window.onload = function(){
    const xml = new XMLHttpRequest();
    xml.onload = function(){
        
        const divelement = document.createElement('div');
        divelement.innerHTML = this.responseText;
        divelement.style.display = 'flex';
        divelement.style.flexWrap = 'wrap';
        divelement.style.gap = '3rem';
        orderdfood.appendChild(divelement); 
    }
    xml.open("GET","retrive_data.php",true);
    xml.send();

    function loct(){
        const xhtp = new XMLHttpRequest();
        xhtp.onload = function(){
            locationDetails.innerHTML = this.responseText;
        }
        xhtp.open("GET","loct.php",true);
        xhtp.send();
    }
    loct();
}

const messcl = document.querySelector(".mes");
messcl.style.display = "block";

setInterval(()=>{
    messcl.style.display = "none";
},3000);


//Feedback
const feedback = document.querySelector(".feeds");
const feedsform = document.querySelector(".feedsform");
feedback.addEventListener("click",()=>{
    feedsform.style.opacity = "1";

})

const canclebuttfedds = document.getElementById("fedscancle");
canclebuttfedds.addEventListener("click",()=>{
    feedsform.style.opacity = "0";
    
})