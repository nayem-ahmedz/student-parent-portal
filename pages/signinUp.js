let signinEl = document.getElementById('signin-eq');
let signupEl = document.getElementById('signup-eq');
let btn1 = document.getElementById('signin-btn')
let btn2 = document.getElementById('signup-btn')
let backGround = 'linear-gradient(225deg, purple, rgb(245, 67, 155))'
function signupFun(){
    signinEl.style.display = 'none';
    signupEl.style.display = 'block';
    btn2.style.background = backGround;
    btn2.style.color = 'white';
    btn1.style.background = 'none';
    btn1.style.color = 'black';
}
function signinFun(){
    signupEl.style.display = 'none';
    signinEl.style.display = 'block';
    btn1.style.background = backGround;
    btn1.style.color = 'white';
    btn2.style.background = 'none';
    btn2.style.color = 'black';
}
//added using cG
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const signup = urlParams.get('signup');

    if (signup === 'true') {
        signupFun();
    }
}
