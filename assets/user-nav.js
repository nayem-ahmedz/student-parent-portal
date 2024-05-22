let open = true;
function hideUserNav(){
    let heighT = document.getElementById('user-nav-x');
    if(!open){
        heighT.style.height = '0';
        open = true;
    } else{
        heighT.style.height = '110px';
        open = false;
    }
}