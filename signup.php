<?php
    include("classes/signup.php");

    $email = "";
    $username = "";
    $date_of_birth = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $signup = new Signup();
        $result = $signup->evaluate($_POST);

        if ($result != "") {
            echo "<script type='text/javascript'>alert('$result');</script>";
        } else {
            header("Location: login.php");
            die;
        }

        $email = $_POST["email"];
        $username = $_POST["username"];
        $date_of_birth = $_POST["date_of_birth"];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
    <div class="main">
            <form method="POST" action="">
                <h1>Under Construction</h1>

                <!-- Email and Username -->
                <div class="fields">
                    <input value="<?php echo $email ?>" name="email" type="text" placeholder="Email" required>
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="fields">
                    <input value="<?php echo $username ?>" name="username" type="text" placeholder="Username" required>
                    <i class='bx bxs-user' ></i>
                </div>

                <!-- DOB -->
                <div class="fields">
                    <input value="<?php echo $date_of_birth ?>" name="date_of_birth" type="date" placeholder="Date of Birth" required>
                </div>

                <!-- Password -->
                <div class="fields">
                    <input name="password" type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="fields">
                    <input type="password" placeholder="Retype Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>

                <!-- Gender -->
                <div style="text-align: center; font-size: 20px;">
                <b>Gender:</b>
                    <select name="gender" style="width: 100%">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <!-- Sign up Button -->
                <input type="submit" class="buttons" value="Sign up">
            </form>
            
                
            <!-- Login link -->
            <div class="small_link">
                <a href="login.php">Already have account? Login here</a>
            </div>
        </div>
    </body>
</html>
