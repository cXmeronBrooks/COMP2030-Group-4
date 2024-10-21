<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Fan: nguy1549" />
    <title>Dashboard Admin</title>
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
        <section class="list">
            <?php require_once "inc/menu.inc.php"; ?>
            <h1>Staff Status</h1>   
            <?php
            require_once "inc/dbconn.inc.php";

            $sql = "SELECT id, name, phone, address, role FROM StaffLists WHERE completed = 0;";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='info'>" .
                            "<td>" . $row["id"] . "</td>" . 
                            "<td>" . $row["name"] . "</td>" .
                            "<td>" . $row["phone"]. "</td>" .
                            "<td>" . $row["address"] . "</td>" .
                            "<td>" . $row["role"]. "</td>" .
                        "</tr>";
                    }
                    echo "</tbody></table>";
                    mysqli_free_result($result);
                }
            }
            ?>

            <form method="post" action = "add-staff.php">
                <input type="submit" value = "Add New Staff">
            </form>
        </section>

        <section class="list">
            <form method="POST" action="index_admin.php"> <!-- Added action attribute -->
                <p>Filter:</p>
                <label for="machine">Machine:</label>
                <select name="machine" id="machine">
                    <option value="">Select Machine</option>
                    <option value="CNC Machine">CNC Machine</option>
                    <option value="3D Printer">3D Printer</option>
                    <option value="Industrial Robot">Industrial Robot</option>
                    <option value="Automated Guided Vehicle (AGV)">Automated Guided Vehicle (AGV)</option>
                    <option value="Smart Conveyor System">Smart Conveyor System</option>
                    <option value="IoT Sensor Hub">IoT Sensor Hub</option>
                    <option value="Predictive Maintenance System">Predictive Maintenance System</option>
                    <option value="Automated Assembly Line">Automated Assembly Line</option>
                    <option value="Quality Control Scanner">Quality Control Scanner</option>
                    <option value="Energy Management System">Energy Management System</option>
                    <!-- Add more machines as needed -->
                </select>

                <label for="job_status">Job Status:</label>
                <select name="job_status" id="job_status">
                    <option value="">Select Job Status</option>
                    <option value="active">Active</option>
                    <option value="idle">Idle</option>
                    <option value="maintenance">Maintenance</option>
                    <!-- Add more job statuses as needed -->
                </select>

                <label for="date">Date:</label>
                <input type="date" name="date" id="date">

                <input type="submit" value="Apply">
            </form>
        </section>
        <section class="list">
            <?php
            require_once "inc/dbconn.inc.php";

            $sql = "SELECT timestamp, machine_name, temperature, pressure, vibration, humidity, power_consumption, operational_status, error_code, production_count, maintenance_log, speed FROM factory_logs;";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>
                    <thead>
                        <tr>
                            <th>Timestamp</th>
                            <th>Machine Name</th>
                            <th>Temperature</th>
                            <th>Pressure</th>
                            <th>Vibration</th>
                            <th>Humidity</th>
                            <th>Power Consumption</th>
                            <th>Operational Status</th>
                            <th>Error Code</th>
                            <th>Production Count</th>
                            <th>Maintenance Log</th>
                            <th>Speed</th>
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>". 
                            "<td>". $row["timestamp"] . "</td>" . 
                            "<td>" .$row["machine_name"] . "</td>" .
                            "<td>" .$row["temperature"]."</td>".
                            "<td>" .$row["pressure"] ."</td>".
                            "<td>". $row["vibration"] ."</td>" .
                            "<td>". $row["humidity"] ."</td>" .
                            "<td>" .$row["power_consumption"]. "</td>" .
                            "<td>" .$row["operational_status"] ."</td>" .
                            "<td>" .$row["error_code"]. "</td>" .
                            "<td>". $row["production_count"] ."</td>" .
                            "<td>" .$row["maintenance_log"] . "</td>" .
                            "<td>" .$row["speed"] . "</td>" .
                        "</tr>";
                    }
                    echo "</tbody></table>";
                    mysqli_free_result($result);
                } else {
                    echo "<p>No records found.</p>";
                }
            }
            mysqli_close($conn);
            ?>
        </section>

    </header>
</body>
</html>




