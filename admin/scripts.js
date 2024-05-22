// js for tab swithing
const welcomeMessage = document.querySelector('.welcome-message');
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    tabLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            welcomeMessage.style.display = 'none'; // Hide the welcome message
            const targetId = link.getAttribute('href').substring(1);
            tabContents.forEach((content) => {
                content.classList.remove('active');
            });
            document.getElementById(targetId).classList.add('active');
        });
    });

//add student form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('add-student');
    const errorMessages = document.getElementById('error-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting initially

        const studentId = document.getElementById('student_id').value.trim();
        const fullName = document.getElementById('full_name').value.trim();
        const dateOfBirth = document.getElementById('date_of_birth').value.trim();
        const fatherName = document.getElementById('father_name').value.trim();
        const motherName = document.getElementById('mother_name').value.trim();
        const address = document.getElementById('address').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const department = document.getElementById('department').value.trim();
        const section = document.getElementById('section').value.trim();
        const batch = document.getElementById('batch').value.trim();

        errorMessages.innerHTML = ''; // Clear previous error messages

        const errors = [];

        if (studentId === '' || fullName === '' || dateOfBirth === '' || fatherName === '' || motherName === '' || address === '' || phone === '' || department === '' || section === '' || batch === '') {
            errors.push('All fields are required.');
        }

        if (errors.length > 0) {
            errors.forEach(function(error) {
                const errorMessage = document.createElement('p');
                errorMessage.textContent = error;
                errorMessages.appendChild(errorMessage);
            });
        } else {
            form.submit(); // Submit the form if there are no errors
        }
    });
});


//delete student form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('remove-student');
    const errorMessage = document.getElementById('error-message2');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting initially

        const studentId = document.getElementById('student_id').value.trim();
        const fullName = document.getElementById('full_name').value.trim();

        errorMessage.textContent = ''; // Clear previous error message

        if (studentId === '' || fullName === '') {
            errorMessage.textContent = 'Please fill in all fields.';
        } else {
            form.submit(); // Submit the form if there are no errors
        }
    });
});