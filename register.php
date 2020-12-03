<!doctype html>

<html>
    <head>
        <title>register</title>
        <meta charset = "UTF-8">
        <link rel = "stylesheet" href = "globalStyler.css">
    </head>
    <body>
        <?php
            if (isset($_POST["username"]) && isset($_POST["password"]))
            {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $passrpt = $_POST["passrpt"];

                if ($password == $passrpt)
                {
                    $password = sha1(sha1($password));

                    $con = mysqli_connect("127.0.0.1", "wiktornowicki", "esdevlix", "Portal");
                    mysqli_query($con, "INSERT INTO `Users` VALUES('', '$username', '$password')");
                    mysqli_close($con);
                    header("Location: login.php");
                }
                else
                {
                    echo "passwords do not match";
                }
            }
        ?>

        <div class = "regPanel">
            <h1>sign in</h1>
            <form action = "register.php" method="post">
                <input type = "text" name = "username" placeholder = "enter username"><br>
                <input type = "password" name = "password" placeholder = "enter password"><br>
                <input type = "password" name = "passrpt" placeholder = "repeat password"><br>
                <input type = "submit" value = "sign up">
            </form>
        </div>
    </body>
</html>