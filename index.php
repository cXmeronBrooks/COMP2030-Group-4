<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMD: Add new staff</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Group 4" />
    <link rel="stylesheet" href="./styles/style.css">
    <script src="scripts/script.js" defer></script>
</head>

<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h1>Staff Status</h1>
    <!-- <p><a href="update.php">Update Roles</a></p> -->
    
    <!-- 2. set up a new button to show outstanding fees -->
     <form method = "post" action = "jobStatus.php">
        <label>Show the staff who have not been role yet</label>
        <input type="submit" value="Show Job Status">
     </form>
    
    <?php
    require_once "inc/dbconn.inc.php";

    $sql = "SELECT id, name, phone, address, role FROM StaffLists WHERE completed = 0;";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<ul><p>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href='complete.php?id=" . 
                $row["id"] .
                "' class='task-link'>" .
                $row["name"] . 
                ", Phone Number: " . 
                $row["phone"] . 
                ", Address: " . 
                $row["address"] . 
                ", role: " . 
                $row["role"] .
                "</a></li>";
            }
            echo "</ul></p>";
            // Free up memory consumed by the $result object
            mysqli_free_result($result);
        }
    }
    mysqli_close($conn);
    ?>

    <!-- 1. create a button to add a new student -->
    <form method="post" action = "add-staff.php">
        <input type="submit" value = "Add New Staff">
    </form>
</body>

</html>