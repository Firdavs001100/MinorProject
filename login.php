<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./style2.css">
    <style>
        .submit {
            margin-bottom: 60px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'?>
    <section>
        <h2>Log-In to the Account</h2>
        <form action="" method="post">
            <fieldset>
                <div>
                    <label for="email">Email: </label>
                    <input id="email" class="email" type="email" name="email" required/>
                </div>
                <div>
                    <label for="password">Password: </label>
                    <input id="password" class="password" type="password" name="password" required/>
                </div>
                <input class="submit" type="submit" value="Login" name="submit"></input>
            </fieldset>
        </form>
    </section>
    <?php include 'footer.php' ?>
    <?php 
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = mysqli_connect('localhost', 'root', '') or die ("Unable to Connect.");

        mysqli_select_db($db, 'projectdb') or die(mysqli_error($db));

        $query = "  SELECT *
                    FROM userinfo
                    WHERE user_email = '$email' AND user_password = '$password' ";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            extract($row);
            // This sessions will be necessary for us later in pages for authentication
            $_SESSION['Email'] = $email;
            $_SESSION['Name'] = $row['user_firstname'];
            $_SESSION['Password'] = $row['user_password'];
            // The user first gets alert and then get redirected to the UserInfo.page 
            // Source: https://www.w3schools.com/js/js_window_location.asp
            echo "<script>
                    alert('Successfully logged In');
                    window.location.href = 'userInfo.php';
                  </script>";
        } else {
            echo "<script>alert('The Email or Password is INCORRECT!');</script>";
        }
    }
    ?>
</body>
</html>