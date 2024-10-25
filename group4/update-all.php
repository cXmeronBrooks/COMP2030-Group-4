<?php
if (isset($_POST["staffID"])) {
    $id = $_POST["staffID"];
    require_once "inc/dbconn.inc.php";

    $sql = "SELECT userRole, phone, address FROM users WHERE id = ?";
    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $sql)) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
        mysqli_stmt_bind_result($statement, $currentRole, $currentNumber, $currentAddress);
        mysqli_stmt_fetch($statement);
        mysqli_stmt_close($statement);
    }

    $newRole = !empty($_POST["newRole"]) ? $_POST["newRole"] : $currentRole;
    $newNumber = !empty($_POST["newNumber"]) ? $_POST["newNumber"] : $currentNumber;
    $newAddress = !empty($_POST["newAddress"]) ? $_POST["newAddress"] : $currentAddress;

    $sql = "UPDATE users SET userRole = ?, phone = ?, address = ? WHERE id = ?";
    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $sql)) {
        mysqli_stmt_bind_param($statement, 'sssi', $newRole, $newNumber, $newAddress, $id);
        
        if (mysqli_stmt_execute($statement)) {
            header("Location: user.php?status=success");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}
?>
