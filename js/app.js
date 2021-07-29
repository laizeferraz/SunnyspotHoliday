"use strict";

/*
 * Contact Page
 */

//Get reference to the form
const contForm = document.getElementById("contact-form");

// check that the form exists (before you start using it.)
if (contForm) {
  // Disable HTML5 validation - NOTE: "novalidate" is a boolean attribute
  contForm.setAttribute("novalidate", "");

  // Add an event listener to the form's "submit" event (not the "click" event of the submit button...)
  contForm.addEventListener("submit", event => {
    // Error message list
    let errorMessages = [];

    // Get reference to the error area
    const errorArea = document.getElementById("error-area");

    // Clear previuos error messages
    errorArea.innerHTML = "";

    // Get references to the form fields
    let firstNameValue = contForm.elements["firstName"].value.trim();
    let lastNameValue = contForm.elements["lastName"].value.trim();
    let phoneValue = contForm.elements["phone"].value.trim();
    let mobileValue = contForm.elements["mobile"].value.trim();
    let emailValue = contForm.elements["email"].value.trim();
    let commentValue = contForm.elements["txtComment"].value.trim();

    // Start checking the validation rules (always check for INVALID data NOT valid!)

    // Check all required fields
    if (
      firstNameValue === "" ||
      lastNameValue === "" ||
      emailValue === "" ||
      commentValue === ""
    ) {
      // Cancel the submit event (stop the form from submitting)
      event.preventDefault();

      // Display an error message
      errorArea.innerHTML = `<p>Enter all required fields (first name, last name, email and comment).</p>`;

      // Stop the function (don't continue checking validation rules).
      return;
    }

    // Check first name
    if (firstNameValue.length < 2) {
      // Add error message
      errorMessages.push("First name must be 2 or more characters.");
    }

    // Check last name
    if (lastNameValue.length < 2) {
      errorMessages.push("Last name must be 2 or more characters.");
    }

    // Check email
    const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (emailValue !== "" && !emailRegex.test(emailValue)) {
      errorMessages.push("Email does not appear to be valid.");
    }

    /*
     *Check phone and mobile
     */
    const phoneRegex = /^(\+?\(61\)|\(\+?61\)|\+?61|\(0[1-9]\)|0[1-9])?( ?-?[0-9]){8,15}$/;
    const mobileRegex = /^(\+?\(61\)|\(\+?61\)|\+?61|\(0[1-9]\)|0[1-9])?( ?-?[0-9]){10,12}$/;

    //Check if at least one number was typed.
    if (mobileValue == "" && phoneValue == "") {
      errorMessages.push(
        "Enter at least one contact number (mobile or phone)."
      );
    } else {
      // Check if phone number is between 8 and 15 characters when not empty.
      if (phoneValue !== "" && !phoneRegex.test(phoneValue)) {
        errorMessages.push("The phone number must be between 8 and 15 digits.");
      }
      // Check if mobile number is between 10 and 12 characters when not empty.
      if (mobileValue !== "" && !mobileRegex.test(mobileValue)) {
        errorMessages.push(
          "The mobile number must be between 10 and 12 digits."
        );
      }
    }

    // Check if comments section has less than 10 characters.
    if (commentValue.length < 10) {
      errorMessages.push("Comment section must have at least 10 characters.");
    }

    /*
     * Check age and gender.
     */
    //  Define a counter for the age and gender radios.
    let checkCount = 0;

    // Find all the ages radios.
    const ageValue = contForm.elements["age"];

    // Loop through the radios
    ageValue.forEach(age => {
      // Check if the radio has been checked (add +1 if it is).
      if (age.checked) {
        checkCount++;
      }
    });

    // Check how many age radios have been checked (display error).
    if (checkCount < 1) {
      errorMessages.push("Choose your age range.");
    }

    // Find all the gender radios.
    const genderValue = contForm.elements["gender"];

    // Loop through the radios.
    genderValue.forEach(gender => {
      // Check if the radio has been checked (add +1 if it is).
      if (gender.checked) {
        checkCount++;
      }
    });

    // Check how many gender radios have been checked (display error).
    if (checkCount < 1) {
      errorMessages.push("Choose your gender.");
    }

    // Check for error.
    if (errorMessages.length > 0) {
      // Cancel the submit event (stop the for from submitting).
      event.preventDefault();

      // Display all error messages.
      errorArea.innerHTML += `<ul><li>${errorMessages.join(
        "</li><li>"
      )}</li></ul>`;
    }
  });
}

/*
 * Login-page
 */
const logForm = document.getElementById("login-form");

if (logForm) {
  // Disable HTML5 validation - NOTE: "novalidate" is a boolean attribute
  logForm.setAttribute("novalidate", "");

  // Add an event listener to the form's "submit" event (not the "click" event of the submit button...)
  logForm.addEventListener("submit", event => {
    // Error message list
    let errorMessages = [];

    // Get reference to the error area
    const errorArea = document.getElementById("error-area");

    // Clear previuos error messages
    errorArea.innerHTML = "";

    // Get references to the form fields
    let usernameValue = logForm.elements["userName"].value.trim();
    let passValue = logForm.elements["passWord"].value;

    // Start checking the validation rules (always check for INVALID data NOT valid!)

    // Check all required fields
    if (usernameValue === "" || passValue === "") {
      // Cancel the submit event (stop the form from submitting)
      event.preventDefault();

      // Display an error message
      errorArea.innerHTML = `<p>Enter all required fields (Username and Password).</p>`;

      // Stop the function (don't continue checking validation rules)
      return;
    }

    // Check Username Length
    if (usernameValue.length < 5 || usernameValue.length > 30) {
      // Add error message
      errorMessages.push("Username must be between 5 and 30 characters.");
    }

    // Check password length.
    if (passValue.length < 8) {
      // Add error message
      errorMessages.push("Password must be at least 8 characters longer.");
    }

    // Check Password rules
    const passRegex = /^(?=.*[a-z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

    if (
      (passValue !== "" && !passRegex.test(passValue)) ||
      (passValue.length > 8 && !passRegex.test(passValue))
    ) {
      errorMessages.push(
        "Password must contain at least 1 letter, 1 digit and 1 symbol (*,%,$,@...)."
      );
    }

    // Check for error
    if (errorMessages.length > 0) {
      // Cancel the submit event (stop the for from submitting)
      event.preventDefault();

      // Display all error messages
      errorArea.innerHTML += `<ul><li>${errorMessages.join(
        "</li><li>"
      )}</li></ul>`;
    }
  });
}

// Slick Slider
const slideShow = document.getElementById("slideshow");
if (slideShow) {
  $(document).ready(function() {
    // Initialise/activate the Slick plugin on the slideshow HTML
    $(".slick-plugin").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
      infinite: true,
      speed: 500,
      fade: true,
      pauseOnHover: true,
      pauseOnFocus: true,
      cssEase: "linear"
    });
  });
}
