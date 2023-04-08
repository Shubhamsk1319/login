<?php
$login = "f";
include 'dbconn.php';
if (isset($_POST['submit'])) {
    // error_reporting(0);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $sql = "select * from registration where email='$email' and password='$password'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        // echo "login successful";
        header("location: dashboard.html");
    } else {
        $login = false;
        echo "not loggedin";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <h2>Log in</h2>
        <!-- <h4>Create an account <a href="index.html">register</a></h4> -->
        <h4 class="msg msg2">Welcome Back,</h4>
        <h4 class="msg">Sign in to continue</h4>
        <div class="main-items main-items2">
            <form action="" method="post">
                <div class="inputs">
                    <input type="email" placeholder=" " name="email" required>
                    <label for="Email">Email</label>
                </div>
                <div class="inputs">
                    <input type="password" placeholder=" " name="password" required>
                    <label for="Password">Password</label>
                </div>
                <button type="submit" name="submit">Log in</button>
                <a href="" class="fp">forgot password</a>
                <h5>not a user? <a href="index.php">sign up</a></h5>
            </form>
        </div>
    </div>
    <div class="animation">
		<ul class="box">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</body>

</html>
