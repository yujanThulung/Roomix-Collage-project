//For Sell and Rent condition
document.addEventListener("DOMContentLoaded", function () {
    var statusElements = document.querySelectorAll(".status");

    statusElements.forEach(function (element) {
        if (element.textContent.toLowerCase() === "sell") {
            element.style.backgroundColor = "red";
        } else if (element.textContent.toLowerCase() === "rent") {
            element.style.backgroundColor = "green";
        }
    });
});

//for navigation slide in responsive
$("#menu-btn").click(function () {
    $("nav .navigation ul").addClass("active");
});
$("#menu-close").click(function () {
    $("nav .navigation ul").removeClass("active");
});

//Form

const registerForm = document.getElementById("form-container-r");
const loginForm = document.getElementById("form-container-l");
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
    }

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




// this code is for redirecting to another page onlick on card  work on this letter

// //For card property detail
// document.querySelectorAll(".card").forEach(function (card) {
//     card.addEventListener("click", function () {
//         const id = card.getAttribute("data-id");
//         window.location.href = "p-detail.php" + id;
//     });
// });

