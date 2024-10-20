<?php

if (isset($_POST["staffID"])) {
    $id = $_POST["staffID"];
    require_once "inc/dbconn.inc.php";

    // First, fetch the current role of the staff member
    $sql = "SELECT address FROM StaffLists WHERE id = ?";
    $statement = mysqli_stmt_init($conn);
    
    if (mysqli_stmt_prepare($statement, $sql)) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
        mysqli_stmt_bind_result($statement, $currentAddress);
        mysqli_stmt_fetch($statement);
        mysqli_stmt_close($statement);
    }

    // Check if newNumber is provided; if not, use the current number
    $newAddress = !empty($_POST["newAddress"]) ? $_POST["newAddress"] : $currentAddress;

    // Use a prepared statement to prevent injection attacks
    $sql = "UPDATE StaffLists SET address=? WHERE id=?;";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 'si', $newAddress, $id);

    if (mysqli_stmt_execute($statement)) {
        // Task updated successfully. Return the user to the tasks page.
        header("location: user.php?status=success");
    }
    else {
        echo mysqli_error($conn);
    }
    // mysqli_stmt_close($statement);
    mysqli_close($conn);

}
?>



