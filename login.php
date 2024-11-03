<?php
session_start();

    include("classes/connect.php");
    include("classes/login.php");

    $email = "";
    $password = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = new Login();
        $result = $login->evaluate($_POST);

        if ($result != "") {
            echo "<script type='text/javascript'>alert('$result');</script>";
        } else {
            header("Location: main.php");
            die;
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
    }
?>

<!DOCTYPE HTML>
<html lang = "en">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <div class="main">
            <form action="" method="POST">
                <h1>Under Construction</h1>

                <div class="fields">
                    <input name="email" value="<?php echo $email ?>" type="text" placeholder="Email/Username" required>
                    <i class='bx bxs-user' ></i>
                </div>

                <div class="fields">
                    <input name="password" value="<?php echo $password ?>" type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
            
                <input type="submit" class="buttons" value="Log in">
            </form>
                
            <!-- Sign up link -->
            <div class="small_link">
                <a href="signup.php">Don't have account? Sign up here</a>
            </div>
        </div>
    </body>
</html>