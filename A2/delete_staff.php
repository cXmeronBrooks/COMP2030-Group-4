<?php
require_once "inc/dbconn.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffID = $_POST['staffID'];

    // Prepare the delete query
    $sql = "DELETE FROM StaffLists WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $staffID);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Staff member deleted successfully.'); window.location.href = 'user.php';</script>";
        } else {
            echo "<script>alert('Error deleting staff member.'); window.location.href = 'user.php';</script>";
        }
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($conn);
?>
