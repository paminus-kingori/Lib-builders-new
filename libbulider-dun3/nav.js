const menu = document.querySelector(".menu-icon");
    const over = document.querySelector(".over");
    const links = document.querySelector(".links")
    const search = document.querySelector(".search-sect")
    const username = document.querySelector(".username")
    const logo = document.querySelector(".logo")

    menu.addEventListener("click", function(){
        over.classList.toggle("showHeight");
        links.classList.toggle("showGrid");
        search.classList.toggle("showFlex");
        username.classList.toggle("showFlex");
        logo.classList.toggle("disappear");
        
    })
    function changer(img){
        console.log(1)
        img.src = "icons/skype-svgrepo-com.svg"
      
    }