<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manufacturing: Add new staff</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Group4" />
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <h1>Staff List</h1>
    <p><a href="update.php">Update information</a></p>
    <form method="post" action="index_admin.php">
        <label>Show the student who have not been role yet</label>
        <input type="submit" value="Hide job Status">
    </form>

    <?php
    require_once"inc/dbconn.inc.php";
    $sql = "SELECT id, name, phone, address, role FROM StaffLists WHERE completed = 0;";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["role"] == 'Waiting') {
                    $highlight = 'free';
                } else {
                    $highlight = 'busy';
                }
                echo "<li id=\"staff\" class='$highlight'><p>" . 
                $row["name"] . 
                ", Phone Number: " . 
                $row["phone"] . 
                ", Address: " . 
                $row["address"] . 
                ", role: " . 
                $row["role"] .
                "</p></li>";
            }
            echo "</ul>";
            // Free up memory consumed by the $result object
            mysqli_free_result($result);
        } else {
            echo "<p>No active staff members found.</p>";
        }
    }
    mysqli_close($conn);
    ?>
    <form method="post" action="add-staff.php">
            <input type="submit" value="Add New Staff"> 
    </form>
</body>

</html>