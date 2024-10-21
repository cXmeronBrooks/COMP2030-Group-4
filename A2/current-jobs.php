<!DOCTYPE html>
<html lang="en">
<head>
    <title>Current Jobs</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Group 4"/>
    <script src="scripts/script.js" defer></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="add_staff_body">
    <section class = "joblisting"><h1>Current Jobs</h1>
        <?php
            $servername = "localhost";
            $username = "dbadmin";
            $password = "";
            $dbname = "Manufacturing";

            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT jobID, name FROM jobs";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                echo "<ul style='list-style-type: none;'>";
                while($row = $result->fetch_assoc()){
                    echo "<li><a href='current-jobs.php?delete_job=" . $row["jobID"] . "' onclick='return confirm(\"Are you sure you want to delete this job?\")'>" . $row["name"] . "</a></li>";

                }
                echo "</ul>";
            }else{
                echo "No jobs found";
            }
            if(isset($_GET['delete_job'])){
                $jobID = $_GET['delete_job'];
                $delete_sql="DELETE FROM jobs WHERE jobID=?";
                $stmt = $conn->prepare($delete_sql);
                $stmt->bind_param("i",$jobID);
                if($stmt->execute()){
                    echo "Finished job";
                }else{
                    echo "Error deleting job".$conn->error;
                }
                header("Location: current-jobs.php");
                exit;
            }
            $conn->close();
        ?>
        <form method="GET" action="workerdash.html">
            <input type="submit" value="HomePage" class = "bigfatbutton" style="width: 100%;">
        </form>
    </section>
</body>
</html>
