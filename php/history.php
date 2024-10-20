<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practical 3: Task History</title>
    <meta charset="UTF-8" />
    <meta name="author" content="<replace with your name>" />
    <link rel="stylesheet" href="./styles/style.css">
    <script src="scripts/script.js" defer></script>
</head>
<body>
    <?php require_once "inc/menu.inc.php"; ?>
    <h1>History</h1>
    <?php
    require_once "inc/dbconn.inc.php";

    $sql = "SELECT name FROM StaffLists WHERE completed=1 ORDER BY updated DESC;";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                // echo "<li class='history'>" . htmlspecialchars($row['name']) . "</li>";
                echo "<li class='history'><a href='backup-staff.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></li>";
            }
            echo "</ul>";
        }
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>
</body>
</html>


