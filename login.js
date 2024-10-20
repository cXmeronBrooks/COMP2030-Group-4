// Function to toggle password visibility
function ShowPassword() {
    const passwordField = document.getElementById("password");
    if (document.getElementById("showPasswordCheckbox").checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

// Function to handle the form submission
function handleSubmit() {
    const password = document.getElementById("password").value;
    const username = document.getElementById("username").value;

    if (!username || !password) {
        alert("Please enter both username and password.");
        return;
    }

    const saltRounds = 10;

    // Hashing the password using bcrypt
    bcrypt.genSalt(saltRounds, function(err, salt) {
        bcrypt.hash(password, salt, function(err, hash) {
            if (err) {
                console.error("Error hashing password:", err);
                return;
            }

            // You can now send the hashed password to your server
            console.log("Hashed Password:", hash);
        });
    });
}
