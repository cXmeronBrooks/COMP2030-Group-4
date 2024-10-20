<!-- check student name passed in url -->
<!-- connect to db -->
<!-- update db with new student -->
<!-- reload the index.php -->

<?php 
    // echo "<pre>";
    // print_r($_GET);      # see the process of adding new Student (dont need)
    // echo "</pre>";
    if(isset($_GET["staff-name"])){
        require_once("inc/dbconn.inc.php");
        //Use a prepared statement to prevent injection attacks
        $sql = "INSERT INTO StaffLists(name) VALUE(?);";
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);
        mysqli_stmt_bind_param($statement, 's', $_GET["staff-name"]);

        if(mysqli_stmt_execute($statement)){
            #Task updated successfully. return the user to index.php
            header("Location: index.php");
        }else{
            echo mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>