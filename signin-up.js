let logIn = document.getElementById("log");     
    let signupDiv1 = document.getElementById("sign"); 

let logInbtn1 = document.getElementById("loginButton1");     
    let signupDiv1btn = document.getElementById("signupButton"); 
    signupDiv1btn.addEventListener("click", function() { 
        logIn.style.display = "none"; 
        signupDiv1.style.display = "block"; 

         
    }); 
     logInbtn1.addEventListener("click", function() {
        signupDiv1.style.display = "none";    
        logIn.style.display = "block"; 
     });
   console.log("hello");
