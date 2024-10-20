// Function to toggle password visibility
function ShowPassword() {
    const passwordField = document.getElementById("password");
    if (document.getElementById("showPasswordCheckbox").checked) {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

// Function to handle form submission
function handleSubmit() {
    const password = document.getElementById("password").value;
    const username = document.getElementById("username").value;

    if (!username || !password) {
        alert("Please enter both username and password.");
        return;
    }

    // Hashing the password using CryptoJS
    const hashedPassword = CryptoJS.SHA256(password).toString();

    // You can now send the hashed password to your server
    console.log("Hashed Password:", hashedPassword);
    alert("Password hashed successfully: " + hashedPassword);
}
