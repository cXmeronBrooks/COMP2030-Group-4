<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Fan: nguy1549" />
    <title>History: </title>
    <link rel="stylesheet" href="./styles/style_admin.css">
    <script src="scripts/script.js" defer></script>

</head>
<body>
    <header class="main-header">
        <nav class="nav main-nav">
            <ul>
                <li><a href="index_admin.php">Dashboard</a></li>       <!-- View the overall factory state. -->
                <li><a href="user.php">Manage Users</a></li>           <!-- Create, update, and delete user accounts -->
                <li><a href="history.php">History</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>


    <section class="list">
        <?php require_once "inc/menu.inc.php"; ?>
        <h1>Staff Status</h1>   
        <?php
        require_once "inc/dbconn.inc.php";

        $sql = "SELECT id, username, phone, address, dob, userRole, updated FROM users WHERE deleted = 1;";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Role</th>
                        <th>Time</th>

                    </tr>
                </thead>
                <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>" .
                        "<td>" . $row["id"] . "</td>" . 
                        "<td>" . $row["username"] . "</td>" .
                        "<td>" . $row["phone"]. "</td>" .
                        "<td>" . $row["address"] . "</td>" .
                        "<td>" . $row["dob"]. "</td>" .
                        "<td>" . $row["userRole"]. "</td>" .
                        "<td>" . $row["updated"]. "</td>" .

                    "</tr>";
                }
                echo "</tbody></table>";
                mysqli_free_result($result);
            }
            mysqli_close($conn);

        }

        ?>
    </section>

</body>
</html>










