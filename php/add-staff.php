<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMD System: Add Staff</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Brett Wilkinson" />
    <script src="scripts/script.js" defer></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Add a new staff</h1>
    <form method="GET" action="insert-staff.php">
        <input type="text" name="staff-name" placeholder="Enter the staff name" required /> <br>
        <input type="submit" value="Add Staff">
    </form>
</body>
</html>