function reveal() {
    var x = document.getElementById("password");
    var y = document.getElementById("reveal-icon");
    if (x.type === "password") {
        x.type = "text";
        y.setAttribute("src", "/assets/png/visibility_off-black-18dp/1x/outline_visibility_off_black_18dp.png");
    } else {
        x.type = "password";
        y.setAttribute("src", "/assets/png/visibility-black-18dp/1x/outline_visibility_black_18dp.png");
    }
}

function removeSessionMessage() {
    document.getElementById("expireNot").remove();
    window.location.href = '/';
}

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}

var secondsCounter = 0;

function quizTimer(){
    secondsCounter++;
    if (secondsCounter >= 901) {
        document.getElementById('innerHere').innerHTML = "<div class='expire' id='expireNot'><h1 id='expireh1'>You have been logged out due to inactivity<button onclick='removeSessionMessage()'>Sign back in</button></h1></div>";
    }
}

sayori = document.querySelector('.otherinformation');
x = document.getElementById("myAudio"); 

function sayori(){
    sayori.style.opacity = "0";
    var show = Math.floor(Math.random() * 10);
    if (show <= 5) {
        sayori.style.opacity = "0";
    } else if (show > 5) {
        sayori.style.opacity = "1";
    }
}

setInterval(function(){
    var show = Math.floor(Math.random() * 101);
    if (show <= 90) {
        document.querySelector('.userinformation').style.opacity = "0";
    } else if (show > 90) {
        document.querySelector('.userinformation').style.opacity = "0.05";
    }
}, 20000);

down = 0;

function rand(min, max) {
  return Math.random() * (max - min) + min;
}

timeVal = rand(4000, 7000);

setInterval(function(){
    var downAdd = rand(0, 5);
    down = down + downAdd;
    document.querySelector('.loadpage').style.top = down + "vh";
    if (down < 100) {
        document.querySelector('body').style.overflow = "hidden";
    } else {
        document.querySelector('body').style.overflow = "auto";
    }
    timeVal = rand(4000, 7000);
    console.log(timeVal);
}, timeVal);