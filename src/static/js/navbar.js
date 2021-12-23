function changeDisplayState(){
    if(window.innerWidth > 992){
        document.getElementById("cebianlan").removeAttribute("hidden");
        document.getElementById('navbar1').setAttribute("hidden","hidden");
        document.querySelector('body > div').style = "padding-left: 280px;";
        document.querySelector("body > div > div > div.col-3-lg").removeAttribute("hidden");
    }
    else{
        document.getElementById('navbar1').removeAttribute("hidden");
        document.getElementById('cebianlan').setAttribute("hidden","hidden");
        document.querySelector('body > div').style = "padding-top: 70px !important;";
        document.querySelector("body > div > div > div.col-3-lg").setAttribute("hidden","hidden");
    }
}

window.onresize = changeDisplayState;
window.onload = changeDisplayState;
