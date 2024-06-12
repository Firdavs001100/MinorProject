<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating a post</title>
    <link rel="stylesheet" href="./style2.css">
    <style>
        .createPostSec {
            max-width: 800px;
            padding: 10px 50px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .createPostSec fieldset {
            border: none;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .descTitle {
            font-size: 1.2em;
            color: #333;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        .descInfo {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .postButton {
            background: green;
            border: 0;
            color: white;
            width: 100%;
            padding: 10px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <?php include 'header.php'?>
    
    <section class="createPostSec">
        <h2>Creating a Post</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <input class="uploadImg" type="file" name="uploadImg"/>
                <label class="descTitle" for="Description">Description:</label>
                <input class="descInfo" id="Description" class="Description" type="text" name="Description"/><br/>
                <input class="postButton" type="submit" name="makePost" value="Create"/>
            </fieldset>
        </form>
    </section>

    <?php include 'footer.php' ?>

    <?php 
    // I created it with the help of geeksforgeeks step by step guideline about uploading the img to the database. The link: https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/
    if (isset($_POST['makePost'])) {
        $directory = '/Applications/XAMPP/xamppfiles/htdocs/minorProject/images/';

        $filename = basename($_FILES["uploadImg"]["name"]);
        $tempname = $_FILES["uploadImg"]["tmp_name"];
        $postDesc = $_POST["Description"];
        $folder = $directory . $filename;
     
        $db = new mysqli('localhost', 'root', '', 'projectdb') or die('Connection Failed!');
     
        $query = "INSERT INTO postdata (post_img, post_description) VALUES ('$filename', '$postDesc')";
     
        if (move_uploaded_file($tempname, $folder)) {
            if (mysqli_query($db, $query)) {
                echo "<script>alert('Image uploaded and post created successfully!')</script>";
            } else {
                echo "<script>alert('Failed to insert post data into database!')</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image!')</script>";
        }
    }
    ?>
</body>
</html>