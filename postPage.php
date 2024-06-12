<?php
session_start();
date_default_timezone_set("Asia/Seoul");


//// The php below is used for the comment section to get the data into a database as well as extracting them /////
// As we did't learn how to insert and extraxt data from database via messages, I had had to look up through internet and finally was able to find it on a youtube video. The things below I learned from him. The link is here: https://www.youtube.com/watch?v=kWOuUkLtQZw&list=PLArhufGdZokAJAJ7PHVQMqaZDMyN80nLE&pp=iAQB 
function setComments() {
    if (isset($_POST['commentSubmit'])) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $infoItemNum = $_POST['infoItemNum'];

        $db = new mysqli('localhost', 'root', '', 'projectdb') or die('Connection Failed!');

        $query = "INSERT INTO usercomments (user_name, dateT, user_message, infoItemNum) VALUES ('$name', '$date', '$message', '$infoItemNum')";
        mysqli_query($db, $query) or die(mysqli_error($db));
    }
}


function getComments($infoItemNum){
    $db = new mysqli('localhost', 'root', '', 'projectdb') or die('Connection Failed!');

    $query = "SELECT * FROM usercomments WHERE infoItemNum = '$infoItemNum'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row['user_name'] . "<br/>";
        echo $row['dateT'] . "<br/>";
        echo nl2br($row['user_message'] . "</p><hr/>");     
    }
}

function getPosts() {
    $db = new mysqli('localhost', 'root', '', 'projectdb') or die('Connection Failed!');

    $query = "SELECT * FROM postdata WHERE post_id >= 7";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    $posts = [];
    while($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
    return $posts;
}

// Solved the problem of reshreshing from w3schools. Link: https://www.w3schools.com/php/php_superglobals_server.asp
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['commentSubmit'])) {
    setComments();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php include "header.php" ?>
    <section class="userP">
        <div class="userDescription">
            <img src="./images/userPhoto.jpeg"/>
            <p>Owner: <span>PeterHomley</span></p>
            <hr/>
        </div>
        <div class="postInfo">
            <div class="infoItem">
                <img src="./images/book1.jpeg"/>
                <p class="descTitle">Description</p>
                <p class="descInfo">Nice book. I finished reading it in about 2 years. So as it no longer is needed for me. I want to exchange it with any book</p>
                <div class="likeAndCommentCont">
                <!-- As we did't learn how to insert and extraxt data from database via messages as well as creating the comment sections, I had had to look up through internet and finally was able to find it on a youtube video. The things below I learned from him. The link is here: https://www.youtube.com/watch?v=kWOuUkLtQZw&list=PLArhufGdZokAJAJ7PHVQMqaZDMyN80nLE&pp=iAQB  -->
                    <form class="commentSection" method="POST" action="">
                        <!-- in this one the name for the comment will be given after user logins to the web page. Otherwise if it's not logged in, for the name it will just automatically be given 'Anonymous' nickname -->
                        <input type="hidden" name="name" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous'; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="infoItemNum" value="1">
                        <textarea name="message"></textarea>
                        <button class="commentButton" type="submit" name="commentSubmit">Send</button> 
                    </form>
                    <div class="likeCont">
                        <button class="likeButton" onclick="likeCount(1)"></button>
                        <p id="countOfLikes1">1</p>
                    </div>
                </div>
                <div class="commentBox">
                    <h6 class="commentTitle">Comments:</h6>
                    <?php getComments(1);?>
                </div>
            </div>
            <div class="infoItem">
                <img src="./images/book2.png"/>
                <p class="descTitle">Description</p>
                <p class="descInfo">I found this book inside my old bookshelf standing on the corner. Written by Debbie Bern. I want to exchange it with sci-fi books</p>
                <div class="likeAndCommentCont">
                    <form class="commentSection" method="POST" action="">
                        <input type="hidden" name="name" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous'; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="infoItemNum" value="2">
                        <textarea name="message"></textarea>
                        <button class="commentButton" type="submit" name="commentSubmit">Send</button> 
                    </form>
                    <div class="likeCont">
                        <button class="likeButton" onclick="likeCount(2)"></button>
                        <p id="countOfLikes2">1</p>
                    </div>
                </div>
                <div class="commentBox">
                    <h6 class="commentTitle">Comments:</h6>
                    <?php getComments(2);?>
                </div>
            </div>
            <div class="infoItem">
                <img src="./images/book8.jpeg"/>
                <p class="descTitle">Description</p>
                <p class="descInfo">Finally I was able to finish this book. Now looking for the Harry Potter's book</p>
                <div class="likeAndCommentCont">
                    <form class="commentSection" method="POST" action="">
                        <input type="hidden" name="name" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous'; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="infoItemNum" value="3">
                        <textarea name="message"></textarea>
                        <button class="commentButton" type="submit" name="commentSubmit">Send</button> 
                    </form>
                    <div class="likeCont">
                        <button class="likeButton" onclick="likeCount(3)"></button>
                        <p id="countOfLikes3">1</p>
                    </div>
                </div>
                <div class="commentBox">
                    <h6 class="commentTitle">Comments:</h6>
                    <?php getComments(3);?>
                </div>
            </div>
            <div class="infoItem">
                <img src="./images/book9.jpg"/>
                <p class="descTitle">Description</p>
                <p class="descInfo">I'm giving away my daughter's book that she just finished. We are looking for another kids book in return</p>
                <div class="likeAndCommentCont">
                    <form class="commentSection" method="POST" action="">
                        <input type="hidden" name="name" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous'; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="infoItemNum" value="4">
                        <textarea name="message"></textarea>
                        <button class="commentButton" type="submit" name="commentSubmit">Send</button> 
                    </form>
                    <div class="likeCont">
                        <button class="likeButton" onclick="likeCount(4)"></button>
                        <p id="countOfLikes4">1</p>
                    </div>
                </div>
                <div class="commentBox">
                    <h6 class="commentTitle">Comments:</h6>
                    <?php getComments(4);?>
                </div>
            </div>
        </div>
    </section>
    <section class="userP">
        <div class="userDescription">
            <img src="./images/userPhoto4.png"/>
            <p>Owner: <span>TomasBegington</span></p>
            <hr/>
        </div>
        <div class="postInfo">
            <div class="infoItem">
                <img src="./images/book10.jpeg"/>
                <p class="descTitle">Description</p>
                <p class="descInfo">Absolutely amazing book. Unfortunetely I finished reading, so sad. If anyone wants it just contact me</p>
                <div class="likeAndCommentCont">
                    <form class="commentSection" method="POST" action="">
                        <input type="hidden" name="name" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous'; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="infoItemNum" value="5">
                        <textarea name="message"></textarea>
                        <button class="commentButton" type="submit" name="commentSubmit">Send</button> 
                    </form>
                    <div class="likeCont">
                        <button class="likeButton" onclick="likeCount(5)"></button>
                        <p id="countOfLikes5">1</p>
                    </div>
                </div>
                <div class="commentBox">
                    <h6 class="commentTitle">Comments:</h6>
                    <?php getComments(5);?>
                </div>
            </div>
            <div class="infoItem">
            <img src="./images/book6.jpeg"/>
                <p class="descTitle">Description</p>
                <p class="descInfo">It's a religious book. If anyone wants, I can give it away</p>
                <div class="likeAndCommentCont">
                    <form class="commentSection" method="POST" action="">
                        <input type="hidden" name="name" value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous'; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="infoItemNum" value="6">
                        <textarea name="message"></textarea>
                        <button class="commentButton" type="submit" name="commentSubmit">Send</button> 
                    </form>
                    <div class="likeCont">
                        <button class="likeButton" onclick="likeCount(6)"></button>
                        <p id="countOfLikes6">1</p>
                    </div>
                </div>
                <div class="commentBox">
                    <h6 class="commentTitle">Comments:</h6>
                    <?php getComments(6);?>
                </div>
            </div>
        </div>
    </section>

    <?php
    $posts = getPosts();
    foreach ($posts as $post) {
        echo '  <section class="userP">
                    <div class="userDescription">
                        <img src="./images/profileIcon.png"/>
                        <p>Owner: <span>'. (isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous') .'</span></p>
                        <hr/>
                    </div>
                    <div class="postInfo">
                        <div class="infoItem">
                            <img src="./images/'. $post["post_img"] .'"/>
                            <p class="descTitle">Description</p>
                            <p class="descInfo">'. $post['post_description'] .'</p>
                            <div class="likeAndCommentCont">
                                    <form class="commentSection" method="POST" action="">
                                    <input type="hidden" name="name" value="'. (isset($_SESSION['Name']) ? $_SESSION['Name'] : 'Anonymous') .'">
                                    <input type="hidden" name="date" value="'. date('Y-m-d H:i:s') .'">
                                    <input type="hidden" name="infoItemNum" value="' . $post['post_id'] . '">
                                    <textarea name="message"></textarea>
                                    <button class="commentButton" type="submit" name="commentSubmit">Send</button> 
                                </form>
                                <div class="likeCont">
                                    <button class="likeButton" onclick="likeCount(' . $post['post_id'] . ')"></button>
                                    <p id="countOfLikes' . $post['post_id'] . '">1</p>
                                </div>
                            </div>
                            <div class="commentBox">
                                <h6 class="commentTitle">Comments:</h6>';
                                getComments($post['post_id']);
        echo '              </div>
                        </div>
                    </div>
                </section>';

    }
    ?>
    <?php include "footer.php" ?>
    <script>
        function likeCount(infoItemNum) {
            var likeElement = document.getElementById("countOfLikes" + infoItemNum);
            var currentCount = parseInt(likeElement.innerHTML);
            currentCount++;
            likeElement.innerHTML = currentCount;
            // This if else if statements are needed to adjust the margin as the like count increases, to keep it at the middle and not overgo beyond it's supposed location
            if (currentCount === 10) {
                likeElement.style.marginLeft = "55px";
            } else if (currentCount === 100) {
                likeElement.style.marginLeft = "51px";
            } else if (currentCount === 1000) {
                likeElement.style.marginLeft = "48px";
            } else if (currentCount === 10000) {
                likeElement.style.marginLeft = "44px";
            } else if (currentCount === 100000) {
                likeElement.style.marginLeft = "41px";
            }
        }
    </script>
</body>
</html>