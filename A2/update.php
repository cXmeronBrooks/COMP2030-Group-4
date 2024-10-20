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

    <h1>Update staff status</h1>
    <main>
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

    </main>
</body>

</html>