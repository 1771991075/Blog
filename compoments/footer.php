<link rel="stylesheet" href="../static/css/style-an.css" />

<!-- 页脚 -->
<script>
  window.onscroll = function(){
    var btn_top = document.getElementById("scroll2Top");
    if(window.scrollY > 400){
        btn_top.removeAttribute("hidden");
    }
    else{
        btn_top.setAttribute("hidden","hidden");
    }
  }
</script>

<footer class="mt-3 p-4" style="background-color: whitesmoke;">
  <div class="container mt-4 ps-5 pe-5">
    <div class="row">
      <div class="col">
        <h6 class="text-secondary mb-2">FriendLinks</h6>
        <p><a class="link_1" href="https://www.lllxy.net/">lllxy</a></p>
        <p><a class="link_1" href="https://www.conchbrain.club/#home">ConchBrainClub</a></p>
      </div>

      <div class="col">
        <h6 class="text-secondary mb-2">Tool</h6>
        <p><a class="link_1" href="https://www.conchbrain.club/#cloudshell">linux</a></p>
        <p><a class="link_1" href="http://www.redis.cn/">redis</a></p>
        <p><a class="link_1" href="https://www.jetbrains.com/phpstorm/">phpstorm</a></p>
      </div>

      <div class="col">
        <h6 class="text-secondary mb-2">Other</h6>
        <p><a class="link_1" href="https://github.com/">Github</a></p>
        <p><a class="link_1" href="https://ckeditor.com/ckeditor-4/demo/">CKEditor</a></p>
        <p><a class="link_1" href="https://v5.bootcss.com/">Bootstrap</a></p>
      </div>

      <div class="col">
        <h6 class="text-secondary mb-2">About</h6>
        <div class="row mt-4 mb-3">
          <div class="col">
            <a href="https://v5.bootcss.com/" style="color:gray;">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bootstrap-fill" viewBox="0 0 16 16">
                <path d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z" />
                <path d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z" />
              </svg>
            </a>
          </div>
          <div class="col">
            <a href="https://www.facebook.com//" style="color:gray;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
            </a>
          </div>
          <div class="col">
            <a href="https://twitter.com///" style="color:gray;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg>
            </a>
          </div>
          <div class="col">
            <a href="https://github.com/" style="color:gray;">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
              </svg>
            </a>
          </div>
          <div class="col">
            <a href="/" style="color:gray;">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row pt-4">
      <div class="col text-center">
        <p class="mx-auto">&copy; 2021-Navbar</p>
      </div>
    </div>
  </div>
</footer>

<div id="scroll2Top" hidden="hidden" class="scrollto" onclick="window.scrollTo(0,0)">
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
  </svg>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" ></script>
<script src="https://myhkw.cn/api/player/demo" id="myhk" key="demo" skin="player" lr="l" m="1"></script>