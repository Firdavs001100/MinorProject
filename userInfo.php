<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .userInfo > h2 {
            font-size: 40px;
            color: coral;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-shadow: #FC0 1px 0 10px;
        }
        .fixedP {
            font-size: 25px;
        }
        .userP {
            color: grey;
            font-size: 20px;
            margin-bottom: 5px;
        }
        hr {
            margin-bottom: 40px;  
        }
        .specSigns {
            margin-bottom: 210px;
            padding-left: 90px;
        }
        .updateRedirection {
            background: green;
            border: 0;
            color: white;
            width: 245px;
            padding: 10px;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
    <?php
    $getEmail = $_SESSION['Email'];

    $db = mysqli_connect('localhost', 'root', '') or die ("Unable to Connect.");

    mysqli_select_db($db, 'projectdb') or die(mysqli_error($db));

    $query = "  SELECT user_firstname, user_lastname, user_email
                FROM userinfo
                WHERE user_email = '$getEmail' ";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    ?>
    <?php include "header.php" ?>
    <section class="userInfo">
        <h2>User Profile</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                extract($row);
                echo '<p class="fixedP">First Name:</p>';
                echo '<p class="userP">' . $user_firstname . '</p>';
                echo '<hr/>';
                echo '<p class="fixedP">Last Name:</p>';
                echo '<p class="userP">' . $user_lastname . '</p>';
                echo '<hr/>';
                echo '<p class="fixedP">Email:</p>';
                echo '<p class="userP">' . $user_email . '</p>';
                echo '<hr/>';
                echo '<a href="./verifyingInfo.php"><button class="updateRedirection">Update Information</button></a>';
            }
        } else {
            echo '<a href="./login.php">Please Log-In first to see your profile</a>';
            echo '<p class="specSigns">⬆️⬆️⬆️</p>';
        }
        ?>
    </section>
    <?php include 'footer.php' ?>
</body>
</html>