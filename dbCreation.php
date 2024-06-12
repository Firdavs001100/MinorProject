<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating a Database to store the user Information and Comment Information</title>
</head>
<body>
    <?php
    $db = mysqli_connect('localhost', 'root', '') or die ("Unable to Connect.");

    $query = 'CREATE DATABASE IF NOT EXISTS projectdb';
    mysqli_query($db, $query) or die(mysqli_error($db));

    mysqli_select_db($db, 'projectdb') or die(mysqli_error($db));

    $query = 'CREATE TABLE userinfo (
            user_id        INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            user_firstname VARCHAR(255)     NOT NULL,
            user_lastname  VARCHAR(255)     NOT NULL,
            user_email     VARCHAR(255)     NOT NULL,
            user_password  VARCHAR(255)     NOT NULL,

            PRIMARY KEY (user_id)
        )';
    mysqli_query($db, $query) or die(mysqli_error($db));

    $query = 'CREATE TABLE usercomments (
            comment_id   INTEGER UNSIGNED   NOT NULL AUTO_INCREMENT,
            user_name    VARCHAR(255)       NOT NULL,
            dateT        DATETIME           NOT NULL,
            user_message TEXT               NOT NULL,
            infoItemNum  INTEGER UNSIGNED,

            PRIMARY KEY (comment_id)
        )';
    mysqli_query($db, $query) or die(mysqli_error($db));

    $query = 'CREATE TABLE postdata (
        post_id             INTEGER UNSIGNED   NOT NULL AUTO_INCREMENT,
        post_img            VARCHAR(255)       NOT NULL,
        post_description    VARCHAR(255)       NOT NULL,

        PRIMARY KEY (post_id)
    )';
mysqli_query($db, $query) or die(mysqli_error($db));

    echo 'Database has successfully created!';
    ?>
</body>
</html>