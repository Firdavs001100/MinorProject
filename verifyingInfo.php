<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating User Information</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>
    <section>
        <?php include 'header.php'?>
        <h2>Change Profile Information</h2>
        <form action="" method="post">
            <fieldset>
                <div>
                    <label for="firstName1">Enter Your New "First Name": <span>*</span></label>
                    <input id="firstName1" class="firstName" type="text" name="firstName1" required/>
                </div>
                <div>
                    <label for="lastName1">Enter Your New "Last Name": <span>*</span></label>
                    <input id="lastName1" class="lastName" type="text" name="lastName1" required/>
                </div>
                <div>
                    <label for="email1">Enter Your New "Email": <span>*</span></label>
                    <input id="email1" class="email" type="email" name="email1" required/>
                </div>
                <div>
                    <label for="password1">Enter Your New "Password": <span>*</span></label>
                    <input id="password1" class="password" type="password" name="password1" required/>
                </div>
                <input class="submit" type="submit" name="submit1" value="Check and Verify" onclick="succesFunc1()"></input>
            </fieldset>
        </form>
        <?php
        if(isset($_POST['submit1'])) {
            $firstname1 = $_POST['firstName1'];
            $lastname1 = $_POST['lastName1'];
            $email1 = $_POST['email1'];
            $password1 = $_POST['password1'];

            $checkedEmail = $_SESSION['Email'];
            $checkedPassword = $_SESSION['Password'];

            $db = new mysqli('localhost', 'root', '', 'projectdb') or die('Connection Failed!');
            
            $query = "  UPDATE userinfo 
                        SET user_firstname = '$firstname1', user_lastname = '$lastname1', user_email = '$email1', user_password = '$password1'
                        WHERE user_email = '$checkedEmail' AND user_password = '$checkedPassword'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));

            if ($result) {
                echo "<script>
                        alert('Successfully logged In');
                        window.location.href = 'login.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Couldn't validate the user. Please, go to login page and resubmit your information one more time!');
                      </script>";
            }   
        }
        ?>
    </section>
    <script>
        function succesFunc1() {
            var emailID = document.myForm1.email1.value;
            atpos = emailID.indexOf("@");
            dotpos = emailID.lastIndexOf(".");

            if ((atpos < 1 ) || (dotpos - atpos < 2 )) {
                alert("Plese enter correct email ID in a format of '.....@gmail.com' !");
                document.myForm1.email1.focus();
                return false;
            } else {
                return true;
            }      
        }
    </script>
    <?php include 'footer.php' ?>
</body>
</html>