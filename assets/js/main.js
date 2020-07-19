function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

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

/*timeVal = rand(4000, 7000);

if (typeof Cookies.get('loadpage') == 'undefined') {
    Cookies.set('loadpage', true);
}

if (Cookies.get('loadpage') == 'true') {
    console.log('Painful load is On');
} else if (Cookies.get('loadpage') == 'false') {
    console.log('Painful load is Off');
}

function changeCookie() {
    if (Cookies.get('loadpage') == 'true') {
        Cookies.set('loadpage', false);
        document.getElementById('loadpage').style.display = "none";
        document.querySelector('body').style.overflowY = "auto";
        console.log('Painful load is Off');
        down = 0;
        document.getElementById('loadpage').style.top = down + "vh";
    } else if (Cookies.get('loadpage') == 'false') {
        Cookies.set('loadpage', true);
        document.getElementById('loadpage').style.display = "block";
        document.querySelector('body').style.overflowY = "hidden";
        console.log('Painful load is On');
        down = 0;
        document.getElementById('loadpage').style.top = down + "vh";
    }
}
        
if (Cookies.get('loadpage') == 'false') {
    document.getElementById('loadpage').style.display = "none";
    document.querySelector('body').style.overflowY = "auto";
}


setInterval(function(){
    if (Cookies.get('loadpage') == 'true') {
    var downAdd = rand(0, 5);
    down = down + downAdd;
    document.getElementById('loadpage').style.display = "block";
    document.getElementById('loadpage').style.top = down + "vh";
    if (down < 100) {
        document.querySelector('body').style.overflowY = "hidden";
    } else {
        document.querySelector('body').style.overflowY = "auto";
    }
    timeVal = rand(4000, 7000);
    } else if (Cookies.get('loadpage') == 'false') {
        document.getElementById('loadpage').style.display = "none";
        document.querySelector('body').style.overflowY = "auto";
    }
}, timeVal);*/