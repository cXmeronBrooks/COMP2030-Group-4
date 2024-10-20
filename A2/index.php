<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="main-header">
        <nav class="nav main-nav">
            <ul>
                <li><a href="index_admin.html">Dashboard</a></li>       <!-- View the overall factory state. -->
                <li><a href="notification.html">Notification</a></li>
                <li><a href="user.html">Manage Users</a></li>           <!-- Create, update, and delete user accounts -->
                <li><a href="role.html">Roles</a></li>              <!-- Create, update, and delete user accounts -->
                <li><a href="logout.html">Log Out</a></li>
            </ul>
        </nav>
        <h1>Jobs As</h1>
        <section>
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

        <section>
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
        <section>
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
                        echo "<tr ' class='info'>
                            <td>{$row["timestamp"]}</td>
                            <td>{$row["machine_name"]}</td>
                            <td>{$row["temperature"]}</td>
                            <td>{$row["pressure"]}</td>
                            <td>{$row["vibration"]}</td>
                            <td>{$row["humidity"]}</td>
                            <td>{$row["power_consumption"]}</td>
                            <td>{$row["operational_status"]}</td>
                            <td>{$row["error_code"]}</td>
                            <td>{$row["production_count"]}</td>
                            <td>{$row["maintenance_log"]}</td>
                            <td>{$row["speed"]}</td>
                        </tr>";
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




