<?php

if (isset($_POST["staffID"])) {
    $id = $_POST["staffID"];
    require_once "inc/dbconn.inc.php";

    $sql = "SELECT phone FROM StaffLists WHERE id = ?";
    $statement = mysqli_stmt_init($conn);
    
    if (mysqli_stmt_prepare($statement, $sql)) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
        mysqli_stmt_bind_result($statement, $currentNumber);
        mysqli_stmt_fetch($statement);
        mysqli_stmt_close($statement);
    }

    // Check if newNumber is provided; if not, use the current number
    $newNumber = !empty($_POST["newNumber"]) ? $_POST["newNumber"] : $currentNumber;

    // Use a prepared statement to prevent injection attacks
    $sql = "UPDATE StaffLists SET phone=? WHERE id=?;";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 'si', $newNumber, $id);

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

