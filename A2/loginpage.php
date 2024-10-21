<!DOCTYPE html>
<html>
    <head>
        <title>Login Page Manufacturing Dashboard</title>
        <meta name="author" content="Group 4: Broo0488, [add your FANS]">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="script.js" defer></script>
        </head>
    <body class="loginbody">
        <section class="login">
            <h2 class="deletelater">DELETE LATER: username1: 'admin' password1: 'banana' username2: 'worker' password2: 'ilikemoney' username3: 'manager' password3: apple</h2>
            <h1>Login</h1>
            <form action="loginpage.php" method="POST">
                <input type="text" name="username" id = "username" placeholder="Username">
                <input type="password" placeholder="Password" id = "password" name="password">
                <div class="show-password">
                    <input type="checkbox" id = "showPasswordCheckbox" onclick="ShowPassword()">
                    <label for="showPasswordCheckbox">Show Password</label>
                </div>
                <button class="SubmitLogin">Submit</button>
            </form>
        </section>

        <?php
            require_once "inc/dbconn.inc.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
                $password = trim($_POST['password']);
                $sql = "SELECT * FROM users WHERE UserName = ?";
                $statement = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($statement, $sql)) {
                    mysqli_stmt_bind_param($statement, 's', $username);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        if (password_verify($password, $hashed_password)) {
                            if($username == "manager"){
                                header("Location: ManufacturingDashboard.html");
                                exit();
                            }elseif($username == "worker"){
                                header("Location: workerdash.html");
                                exit();
                            }elseif($username == "admin"){
                                header("Location: index_admin.php");
                                exit();
                            }
                        } else {
                            header("Location: loginpage.php?error=Incorrect+password");
                            exit();
                        }
                    } else {
                        header("Location: loginpage.php?error=No+user+found+with+that+username");
                        exit();
                    }
                } else {
                    header("Location: loginpage.php?error=SQL+error");
                    exit();
                }
            }
        ?>
    </body>
</html>