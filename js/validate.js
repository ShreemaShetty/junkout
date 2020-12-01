function validateRegform() {
    var fname = document.myForm.fname;
    var lname = document.myForm.lname;
    var email = document.myForm.email;
    var phone = document.myForm.phone;
    var password = document.myForm.password;
    var checkPassword = document.myForm.checkPassword;

    var atpos = email.value.indexOf("@");
    var dotpos = email.value.lastIndexOf(".");
    var regex = /^[a-zA-Z]+$/;

    if (fname.value == null || fname.value == "") {
        alert("Enter First Name");
        return false;
    }
    else {
        if (lname.value == null || lname.value == "") {
            alert("Enter Last Name");
            return false;
        }
        else {

            if ((fname.value.match(regex)) && (lname.value.match(regex))) {
                if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.value.length) {
                    alert("Not a valid email.");
                    email.focus();
                    return false;
                }
                else {
                    var phoneno = /^\d{10}$/;
                    if ((phone.value.match(phoneno))) {

                        var passlength = /^\w{6,15}$/;
                        if (password.value.match(passlength)) {
                            if (password.value == checkPassword.value) {
                                return true; //proceed
                            }
                            else {
                                alert("Passwords don't match");
                                password.focus();
                                return false;
                            }
                        }
                        else {
                            alert("Password should 6 to 15 characters only");
                            password.focus();
                            return false;
                        }
                    }
                    else {
                        alert("Please enter 10 digit phone number only");
                        return false;
                    }
                }
            }
            else {
                alert("Enter only letters in Name");
                return false;
            }
        }
    }
}