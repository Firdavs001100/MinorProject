<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up page</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>
    <?php include 'header.php'?>
    <section>
        <h2>Create a New Account</h2>
        <form action="" method="post" name="myForm" >
            <fieldset>
                <div>
                    <label for="firstName">First Name: <span>*</span></label>
                    <input id="firstName" class="firstName" type="text" name="firstName" required/>
                </div>
                <div>
                    <label for="lastName">Last Name: <span>*</span></label>
                    <input id="lastName" class="lastName" type="text" name="lastName" required/>
                </div>
                <div>
                    <label for="email">Email: <span>*</span></label>
                    <input id="email" class="email" type="email" name="email" required/>
                </div>
                <div>
                    <label for="password">Password: <span>*</span></label>
                    <input id="password" class="password" type="password" name="password" required/>
                </div>
                <input class="submit" type="submit" name="submit" value="Create a New Account" onclick="succesFunc()"></input>
            </fieldset>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            $firstname = $_POST['firstName'];
            $lastname = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = new mysqli('localhost', 'root', '', 'projectdb') or die('Connection Failed!');
            
            $query = "  INSERT INTO userinfo (user_firstname, user_lastname, user_email, user_password) 
                        VALUES ('$firstname', '$lastname', '$email', '$password')";
            mysqli_query($db, $query) or die(mysqli_error($db));
        } 
        ?>
    </section>
    <script>
        function succesFunc() {
            var emailID = document.myForm.email.value;
            atpos = emailID.indexOf("@");
            dotpos = emailID.lastIndexOf(".");

            if ((atpos < 1 ) || (dotpos - atpos < 2 )) {
                alert("Plese enter correct email ID in a format of '.....@gmail.com' !");
                document.myForm.email.focus();
                return false;
            } else {
                alert("Account has succesfully been created!");
                return true;
            }      
        }
    </script>
    <?php include 'footer.php' ?>
</body>
</html>