window.onresize = () => {
    if(window.innerWidth < 992){
        document.querySelector("body > div.container.mt-5.pt-4 > div > div.col-lg-3").setAttribute("hidden","hidden");
    }
    else{
        document.querySelector("body > div.container.mt-5.pt-4 > div > div.col-lg-3").removeAttribute("hidden");
    }
};   