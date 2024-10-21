<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manufacturing: Jobs Status</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Fan: nguy1549" />
    <link rel="stylesheet" href="./styles/style_admin.css">
</head>

<body class="right">
    <nav class="nav main-nav">
        <ul>
            <li><a href="index_admin.php">Dashboard</a></li>       <!-- View the overall factory state. -->
            <li><a href="user.php">Manage Users</a></li>           <!-- Create, update, and delete user accounts -->
            <li><a href="history.php">History</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <h1>Roles Status</h1>
    <form method="post" action="user.php">
        <label>Show the staff who have not been role yet</label>
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