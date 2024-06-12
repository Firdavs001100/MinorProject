<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Book Exchange</title>
    <!-- I used the "google fonts" for the fonts. So, the linkl below is to activate it-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
    <!-- The below link is for the search icon. Source: https://www.w3schools.com/howto/howto_css_search_button.asp#gsc.tab=0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        header {
            display: flex;
            flex-direction: row; 
            margin-top: 10px; 
        }
        .mainPartHeading {
            padding-top: 29px;
            margin-left: 250px;
        }
        #search {
            height: 30px;
            
        }
        .btn4 {
            height: 35px;
            margin-right: 68px;
        }
        .logo {
            width: 350px; 
            height: 90px;
            margin-right: 15px;
        }
        .btn1 {
            background-color: white;
            margin-right: 20px;
            height: 36px;
            width: 100px;
            border-radius: 15px;
        }
        .btn2 {
            background-color: green;
            color: white;
            height: 36px;
            width: 100px;
            border: none;
            border-radius: 15px;
        }
        h1 {
            width: 800px;
            font-size: 30px;
            line-height: 2.0;
            text-align: center;
            /* Google fonts' special font settings for the font style */
            font-family: "Inconsolata", monospace;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
            font-variation-settings: "wdth" 100;
        }
        footer {
            display: flex;
            margin-top: 50px;
        }
        footer > p {
            margin-right: 650px;
        }
        nav {
            display: flex;
        }
        .exploreButton {
            width: 130px;
            height: 41px;
            border-radius: 15px;
            border: none;
            background-color: rgb(40 116 181);
            color: white;
            font-size: medium;
            margin-top: 17px;
            margin-left: 170px;
        }
        .homePageButton {
            width: 100px;
            height: 50px;
            border-radius: 15px;
            border: none;
            background-color: rgb(134 172 206);
            color: white;
            font-size: medium;
            margin-top: 17px;
            margin-left: 20px;
            margin-right: 405px;
        }
        .createPageButton {
            width: 130px;
            height: 41px;
            border-radius: 15px;
            border: none;
            background-color: rgb(134 172 206);
            color: white;
            font-size: medium;
            margin-top: 17px;
            margin-left: 57px;
        }
        .profileButton {
            border-radius: 50%;
            height: 70px;
            width: 70px;
            border: none;
            background-image: url(./images/profileIcon.png);
            background-size: cover;
            opacity: 70%;
        }
        
    </style>
</head>
<body>
    <header>
        <img class="logo" src="./images/LogoMP.png"/>
        <div class="mainPartHeading">
            <input id="search" type="text" name="search" placeholder="Search for Books..."/>
            <button class="btn4" type="submit"><i class="fa fa-search"></i></button>
        
            <a href="./login.php"><button class="btn1">Login</button></a>
            <a href="./signUp.php"><button class="btn2">Sign Up</button></a>
        </div>
    </header>
    <nav>
        <a href="./userInfo.php"><button class="profileButton"></button></a>
        <a href="./mainPage.php"><button class="homePageButton">HomePage</button></a>
        <a href="./postPage.php"><button class="exploreButton">Start to Explore</button></a>
        <a href="./makingPostPage.php"><button class="createPageButton">Create a Post</button></a>
    </nav>
</body>
</html>