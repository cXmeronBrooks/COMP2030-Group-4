<?php
// Check if 'id' is present in the URL query string
if (isset($_GET['id'])) {
    require_once "inc/dbconn.inc.php";

    // Prepare the SQL query to mark the task as completed
    $sql = "UPDATE StaffLists SET completed=1, updated=now() WHERE id=?";

    // Initialize and prepare the statement
    $statement = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($statement, $sql)) {
        mysqli_stmt_bind_param($statement, 'i', $_GET['id']);

        if (mysqli_stmt_execute($statement)) {
            header("Location: user.php");
        }
    } else {
        mysqli_error($conn);
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}
?>
