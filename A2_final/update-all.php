<?php
if (isset($_POST["staffID"])) {
    $id = $_POST["staffID"];
    require_once "inc/dbconn.inc.php";

    // Initialize variables with the current values from the database
    $sql = "SELECT userRole, phone, address FROM users WHERE id = ?";
    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $sql)) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
        mysqli_stmt_bind_result($statement, $currentRole, $currentNumber, $currentAddress);
        mysqli_stmt_fetch($statement);
        mysqli_stmt_close($statement);
    }

    // Update values only if new inputs are provided; otherwise, keep current values
    $newRole = !empty($_POST["newRole"]) ? $_POST["newRole"] : $currentRole;
    $newNumber = !empty($_POST["newNumber"]) ? $_POST["newNumber"] : $currentNumber;
    $newAddress = !empty($_POST["newAddress"]) ? $_POST["newAddress"] : $currentAddress;

    // Prepare the SQL statement for updating all three fields
    $sql = "UPDATE users SET userRole = ?, phone = ?, address = ? WHERE id = ?";
    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $sql)) {
        mysqli_stmt_bind_param($statement, 'sssi', $newRole, $newNumber, $newAddress, $id);
        
        if (mysqli_stmt_execute($statement)) {
            // Redirect on successful update
            header("Location: user.php?status=success");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}
?>
