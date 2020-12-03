<!doctype html>
<html>
    <head>
        <title>log in</title>
        <meta charset = "UTF-8">
        <link rel = "stylesheet" href = "globalStyler.css">
    </head>
    <body>
        <?php
            session_start();

            if (isset($_POST["username"]) && isset($_POST["password"]))
            {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $password = sha1(sha1($password));
                $con = mysqli_connect("127.0.0.1", "wiktornowicki", "esdevlix", "Portal");

                $resolv = mysqli_query($con, "SELECT * FROM `Users` WHERE `login`='$login' AND `password`='$password'");

                if (mysqli_num_rows($resolv))
                {
                    $_SESSION["signedIn"] = "yes";
                    header("Location: panel.php");
                }
                else
                {
                    echo "invalid username or password";
                }

                mysqli_close($con);
            }
        ?>
        <div class = "logonPanel">
            <h1>sign in</h1>
            <form action = "login.php" method="post">
                <input type = "text" name = "username" placeholder = "enter username"><br>
                <input type = "password" name = "password" placeholder = "********"><br>
                <input type = "submit" value = "sign in">
            </form>
        </div>
    </body>
</html>