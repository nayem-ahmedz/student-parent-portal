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

//Signup validation
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('signupForm');
    const eM1 = document.getElementById('errorMessage1');
    const mB = document.getElementById('messageBOX');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const name = document.getElementById('regi-name').value.trim();
        const studentId = document.getElementById('student-id').value.trim();
        const email = document.getElementById('regi-email').value.trim();
        const password = document.getElementById('regi-psw').value.trim();
        const passwordRepeat = document.getElementById('regi-psw-repeat').value.trim();
        

        // Clear previous error messages
        eM1.innerHTML = '';

        if (validateForm(name, studentId, email, password, passwordRepeat)) {
            const formData = new FormData();
            formData.append('regi-name', name);
            formData.append('student-id', studentId);
            formData.append('regi-email', email);
            formData.append('regi-psw', password);

            fetch('process-signup.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                //alert(data);
                mB.style.display = 'block';
                document.getElementById('mB-username').innerHTML = `Welcome, ${name}!`;
                document.querySelector('section').classList.add('blur');
                form.reset();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });

    function validateForm(name, studentId, email, password, passwordRepeat) {
        if (name === '' || studentId === '' || email === '' || password === '' || passwordRepeat === '') {
            showError('All fields are required.', eM1);
            return false;
        }

        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            showError('Please enter a valid email address.', eM1);
            return false;
        }

        if (password.length < 6) {
            showError('Password must be at least 6 characters long.', eM1);
            return false;
        }

        if (password !== passwordRepeat) {
            showError('Passwords do not match.', eM1);
            return false;
        }

        return true;
    }

    function showError(message, element) {
        element.innerHTML = message;
        element.classList.add('scale-up');
        setTimeout(() => {
            element.classList.remove('scale-up');
        }, 200); // Duration should match the CSS transition duration
    }
});


//validation signin
