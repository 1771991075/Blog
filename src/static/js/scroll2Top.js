window.onscroll = function(){
    var btn_top = document.getElementById("scroll2Top");
    if(window.scrollY > 400){
        btn_top.removeAttribute("hidden");
    }
    else{
        btn_top.setAttribute("hidden","hidden");
    }
  }