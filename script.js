// default script file
function regiFun(){
    document.location = '/re-nayem/signin-up.html?signup=true';
}
let navOpen = false;
function myFunction(x) {
    x.classList.toggle("change");
    let a = document.getElementById('nav-contents');
    if(navOpen==false){
        a.style.height = 'auto';
        navOpen = true;
    } else{
        a.style.height = 0;
        navOpen = false;
    }
  }
