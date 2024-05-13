function isValidLogin(form) {

    let email = form.email.value;
    let password = form.password.value;

    let flag = true;

    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter a password.<br>";
        flag = false;
    }

    return flag;

}

function isValidRegistration(form) {

    let fullname = form.fullname.value;
    let email = form.email.value;
    let username = form.username.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    let securityq = form.securityq.value;
    let securityqa = form.securityqa.value;
    let flag = true;

    document.getElementById("fullnameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("confirmPasswordError").innerHTML = "";
    document.getElementById("securityQuestionError").innerHTML = "";
    document.getElementById("securityQuestionAnswerError").innerHTML = "";

    if (fullname === "") {
        document.getElementById("fullnameError").innerHTML = "Please enter your full name.<br>";
        flag = false;
    }

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
        flag = false;
    }

    if (username === "") {
        document.getElementById("usernameError").innerHTML = "Please enter a username.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter a password.<br>";
        flag = false;
    } else if (password.length < 8) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 8 characters long.<br>";
        flag = false;
    }

    if (cpassword === "") {
        document.getElementById("confirmPasswordError").innerHTML = "Please confirm your password.<br>";
        flag = false;
    }

    if (password !== cpassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.<br>";
        flag = false;
    }

    if (securityq === "Not Selected") {
        document.getElementById("securityQuestionError").innerHTML = "Please enter a security question.<br>";
        flag = false;
    }

    if (securityqa === "") {
        document.getElementById("securityQuestionAnswerError").innerHTML = "Please enter an answer to the security question.<br>";
        flag = false;
    }

    return flag;

}

function isValidForgotPassword(form) {

    let email = form.email.value;
    let flag = true;

    document.getElementById("emailError").innerHTML = "";

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
        flag = false;
    }

    return flag;

}

