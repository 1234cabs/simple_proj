<?php

require('db.php');

session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status']) ) {
    
    $_SESSION['status'] = 'invalid';
}

if ($_SESSION['status'] == 'valid') {
    echo "<script>window.location.href = 'index.php'</script>";
}

if (isset($_POST['login'])) {
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Please fill up all fields";
    }else {
        $querylogin = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
        $sqllogin = mysqli_query($conn, $querylogin);
        if (mysqli_num_rows($sqllogin) > 0) {
            $_SESSION['status'] = 'valid';

            echo "<script>alert('WELCOME TO HOME PAGE!!!!!!')</script>";
            echo "<script>window.location.href = '/LEARCRUD/index.php'</script>";
        }else {
            $_SESSION['status'] = 'invalid';

            // echo "invalid accounts!!";
            echo "<script>alert('Invalid Account. Please try Again!!')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login page</title>
</head>
<body>
    <form action="/LEARCRUD/login.php" method="post">
        <!-- <input type="text" name="username" placeholder="Enter username"/>
        <input type="password" name="password" placeholder="Enter password"/> -->

        <h1>Login</h1>
    <label>User Name</label>
    <input type="text" value="" name="username" placeholder="username"/>

    <label>Password</label>
    <input type="text" value="" name="password" placeholder="password"/>

    <button type="submit" name="login">Login</button>

    <!-- <input type="submit" name="login" value="LOGIN"/> -->
    </form>
</body>
</html>