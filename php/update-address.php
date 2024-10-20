<?php

if (isset($_POST["staffID"])) {
    $id = $_POST["staffID"];
    require_once "inc/dbconn.inc.php";

    // First, fetch the current role of the staff member
    $sql = "SELECT address FROM StaffLists WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'is', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $currentAddress);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }else {
        echo mysqli_error($conn);
    }
    
    // Check if newRole is provided; if not, use the current role
    $newAddress = !empty($_POST["newAddress"]) ? $_POST["newAddress"] : $currentAddress;

    // Use a prepared statement to prevent injection attacks
    $sql = "UPDATE StaffLists SET address=? WHERE id=?;";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 'ss', $newAddress, $id);

    if (mysqli_stmt_execute($statement)) {
        // Task updated successfully. Return the user to the tasks page.
        header("location: update.php?status=success");
    }
    else {
        echo mysqli_error($conn);
    }
    // mysqli_stmt_close($statement);
    mysqli_close($conn);

}
?>