let logIn = document.getElementById("log");     
    let signupDiv1 = document.getElementById("sign"); 

let logInbtn = document.getElementById("loginButton");     
    let signupDiv1btn = document.getElementById("signupButton");
    signupDiv1btn.addEventListener("click", function() { 
        logIn.style.display = "none"; 
        signupDiv1.style.display = "block"; 
        signupDiv1btn.classList.add("abcde"); 
    }); 
    logInbtn.addEventListener("click", function() {
        signupDiv1.style.display = "none"; 
      
        logIn.style.display = "block"; 
    });
   