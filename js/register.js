window.onload= function() {

    var registerForm = document.getElementById("registerForm");
    registerForm.addEventListener("submit", validateRegistration);

    function validateRegistration(event) {
        var form = event.target;
        var username = form['username'].value;
        var password = form['password'].value;
        var password2 = form['password2'].value;

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

        if (username === "") {
            errors["username"] = "Username cannot be empty\n";
        }
        if (password === "") {
            errors["password"] = "Password cannot be empty\n";
        }
        else if (password.length < 6) {
            errors["password"] = "Password must be at least six characters\n";
        }
        if (password2 === "") {
            errors["password2"] = "Confirm Password cannot be empty\n";
        }
        else if (password2.length < 6) {
            errors["password2"] = "Confirm Password must be at least six characters\n";
            form["password2"].value = "";
        }
        else if (password !== password2) {
            errors["password2"] = "Passwords must match\n";
            form["password2"].value = "";
        }
        
        var valid = true;
        for (var index in errors) {
            valid = false;
            var errorMessage = errors[index];
            var spanElement = document.getElementById(index + "Error");
            spanElement.innerHTML = errorMessage;

            form["password"].value = "";
            form["password2"].value = "";
        }
        if (!valid) {
            event.preventDefault();
        }
    }

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validateURL(url) {
        var re = /^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/i;
        return re.test(url);
    }
};