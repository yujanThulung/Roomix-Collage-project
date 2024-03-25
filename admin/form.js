let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form');
let formClose = document.querySelector('#form-close');
let form1Btn = document.querySelector('#register-btn');
let registerForm = document.querySelector('.registration-form');
let form1Close = document.querySelector('#form1-close');
const register1Form = document.getElementById("#registration-form");
const login1Form = document.getElementById("#login-form");
document.addEventListener("DOMContentLoaded", function () {
    const firstNameInput = document.getElementById("fname");
    const lastNameInput = document.getElementById("lname");
    const emailInput = document.getElementById("r-email");
    const passwordInput = document.getElementById("r-password");
    const confirmPasswordInput = document.getElementById("c-password");
    const passwordChecklist = document.getElementById("password-checklist");
    const checklistItems = {
        uppercase: document.getElementById("uppercase-check"),
        lowercase: document.getElementById("lowercase-check"),
        number: document.getElementById("number-check"),
        symbol: document.getElementById("symbol-check"),
        length: document.getElementById("length-check"),
    };

    firstNameInput.addEventListener("input", function () {
        validateName(firstNameInput);
    });

    lastNameInput.addEventListener("input", function () {
        validateName(lastNameInput);
    });

    emailInput.addEventListener("input", function () {
        validateEmail(emailInput);
    });

    passwordInput.addEventListener("input", function () {
        showPasswordChecklist();
        validatePassword();
        clearErrorMessages();
    });

    confirmPasswordInput.addEventListener("input", function () {
        validateConfirmPassword();
    });

    function showPasswordChecklist() {
        passwordChecklist.style.display = "block";
    }

    function validatePassword() {
        const password = passwordInput.value;

        checklistItems.uppercase.classList.toggle("success", /[A-Z]/.test(password));
        checklistItems.lowercase.classList.toggle("success", /[a-z]/.test(password));
        checklistItems.number.classList.toggle("success", /\d/.test(password));
        checklistItems.symbol.classList.toggle("success", /[$@$!%*?&]/.test(password));
        checklistItems.length.classList.toggle("success", password.length >= 6);
    }

    function validateConfirmPassword() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        clearErrorMessages();
        // Display an error if passwords do not match
        if (password !== confirmPassword) {
            showError("c-password", "Passwords do not match.");
        } else {
            clearErrorMessages();
        }
    }

    function validateName(inputElement) {
        const name = inputElement.value.trim();
        clearErrorMessages();
        const isValid = /^[a-zA-Z]+$/u.test(name);

        if (name.length === 0) {
            showError(inputElement.id, "This field cannot be empty");
        } else if (name.length < 3) {
            showError(inputElement.id, "Enter valid name");
        } else if (!isValid) {
            showError(
                inputElement.id,
                "Invalid characters in name. Please use only alphabetic characters."
            );
        } else {
            clearErrorMessagesExcept(inputElement.id);
        }
    }h

    function validateEmail(inputElement) {
        const email = inputElement.value.trim();
        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        clearErrorMessages();
        if (!isValid) {
            function validateEmail(inputElement) {
                const email = inputElement.value.trim();
                const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

                if (!isValid) {
                    showError(inputElement.id, "Invalid email format.");
                } else {
                    clearErrorMessages();
                }
            }
            showError(inputElement.id, "Invalid email format.");
        } else {
            clearErrorMessages();
        }
    }

    function showError(elementId, errorMessage) {
        const errorDiv = document.createElement("div");
        errorDiv.textContent = errorMessage;
        errorDiv.classList.add("error-message");
        document.getElementById(elementId).insertAdjacentElement("afterend", errorDiv);
    }

    function clearErrorMessages() {
        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(function (element) {
            element.remove();
        });
    }
});


window.onscroll = () =>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
    registerForm.classList.remove('active');
}

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

searchBtn.addEventListener('click', () =>{
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

formBtn.addEventListener('click', () =>{
    loginForm.classList.add('active');
});

formClose.addEventListener('click', () =>{
    loginForm.classList.remove('active');
});

form1Btn.addEventListener('click', () =>{
    registerForm.classList.add('active');
});

form1Close.addEventListener('click', () =>{
    registerForm.classList.remove('active');
});

