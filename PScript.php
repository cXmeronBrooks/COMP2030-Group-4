<?php
// Get user input from form
$username = $_POST['username'];
$user_password = $_POST['password'];


$username = htmlspecialchars($username);

// Hash the password using the default algorithm (bcrypt)
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

// Database connection (replace with actual connection details)
$dsn = 'mysql:host=localhost;dbname=your_database';
$db_user = 'your_user';
$db_password = 'your_password';

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use prepared statements to insert data securely
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    
    // Execute the query
    $stmt->execute();
    
    echo "User registered successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
