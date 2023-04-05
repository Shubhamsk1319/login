<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">
</head>

<body>
<?php
include 'dbconn.php';
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $emailquery = "select * from registration where email='$email'";
    $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount > 0) {
        echo "Email already exists!!!";
    } else {
        if($password==$cpassword){
        $insertquery = "insert into registration(username, email, phone, password, cpassword, dt) values('$username', '$email', '$phone', '$password', '$cpassword', current_timestamp())";
        $iquery = mysqli_query($con, $insertquery);
        if ($iquery) {
            // echo "Inserted Successfully";
            header("location: login.php");
            ?>
    <script>
        alert("Registered Sucessfully");
    </script>
    <?php
        }
    }else{
        echo "Passwords are not matching!!!";
    }
}
}
?>
    <div class="main">
        <h2>Sign Up</h2>
        <h4>Already have account <a href="login.php">sign in</a></h4>
        <div class="main-items">
            <form action="" method="post">
                <div class="inputs">
                    <input type="text" placeholder=" " name="username" required>
                    <label for="Name">Name</label>
                </div>
                <div class="inputs">
                    <input type="email" placeholder=" " name="email" required>
                    <label for="Email">Email</label>
                </div>
                <div class="inputs">
                    <input type="text" placeholder=" " name="phone" required>
                    <label for="Phone">Phone</label>
                </div>
                <div class="inputs">
                    <input type="password" placeholder=" " name="password" required>
                    <label for="Password">Password</label>
                </div>
                <div class="inputs">
                    <input type="password" placeholder=" " name="cpassword" required>
                    <label for="Confirm_Password">Confirm Password</label>
                </div>
                <div class="buttons">
                    <button type="submit" name="submit">Register</button>
                    <!-- <button type="submit">Sign in</button> -->
                </div>
            </form>
        </div>
        <!-- <div class="main-items"></div> -->
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