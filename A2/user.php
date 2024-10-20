<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Fan: nguy1549" />
    <title>Users</title>
    <link rel="stylesheet" href="./styles/style.css">
    <script src="scripts/script.js" defer></script>


</head>
<body>
    <header class="main-header">
        <nav class="nav main-nav">
            <ul>
                <li><a href="index_admin.php">Dashboard</a></li>       <!-- View the overall factory state. -->
                <li><a href="user.php">Manage Users</a></li>           <!-- Create, update, and delete user accounts -->
                <li><a href="history.php">History</a></li>
            </ul>
        </nav>
        
        <section class="list">
            <?php require_once "inc/menu.inc.php"; ?>
            <h1>Staff Status</h1>    
            <!--  set up a new button to show job status -->
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
                        "Staff ID: " .
                        $row["id"] .
                        " " .
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
            ?>

            <form method="post" action = "add-staff.php">
                <input type="submit" value = "Add New Staff">
            </form>
        </section>

        <section class="right">
            <form method="post" action="update-role.php">
                <label>Update role (Select a staff from the drop-down list):</label>
                <select id="staffID" name="staffID">
                    <?php
                    require_once "inc/dbconn.inc.php";

                    $sql = "SELECT id, name FROM StaffLists WHERE completed = 0;";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=\"" . $row["id"] . "\" name=\"" . $row["name"] . "\">" . $row["name"] . "</option>";
                            }
                            // Free up memory consumed by the $result object
                            mysqli_free_result($result);
                        }
                    }
                    ?>
                </select>
                <input type="text" name="newRole" placeholder="Enter a role" />            
                <input type="submit" value="Submit">
            </form>

            <form method="post" action="update-number.php">
                <label>Update number (Select a staff from the drop-down list):</label>
                <select id="staffID" name="staffID">
                    <?php
                    require_once "inc/dbconn.inc.php";

                    $sql = "SELECT id, name FROM StaffLists WHERE completed = 0;";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=\"" . $row["id"] . "\" name=\"" . $row["name"] . "\">" . $row["name"] . "</option>";
                            }
                            // Free up memory consumed by the $result object
                            mysqli_free_result($result);
                        }
                    }
                    ?>
                </select>
                <input type="text" name="newNumber" placeholder="Enter a phone number" />            
                <input type="submit" value="Submit">
            </form>

            <form method="post" action="update-address.php">
                <label>Update address (Select a staff from the drop-down list):</label>
                <select id="staffID" name="staffID">
                    <?php
                    require_once "inc/dbconn.inc.php";

                    $sql = "SELECT id, name FROM StaffLists WHERE completed = 0;";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=\"" . $row["id"] . "\" name=\"" . $row["name"] . "\">" . $row["name"] . "</option>";
                            }
                            // Free up memory consumed by the $result object
                            mysqli_free_result($result);
                        }
                    }
                    mysqli_close($conn);
                    ?>
                </select>
                <input type="text" name="newAddress" placeholder="Enter a address" />            
                <input type="submit" value="Submit">
            </form>

            <form method="post" action="index_admin.php">
                <input type="submit" value="Back Home Page">
            </form>
        </section>

    </header>
</body>
</html>




