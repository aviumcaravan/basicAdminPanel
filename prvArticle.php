<!doctype html>
<html>
    <head>
        <title>article preview</title>
        <link rel = "stylesheet" href = "style.css">
        <meta charset = "UTF-8">
        <?php
            if (isset($_GET["id"]))
            {
                $id = $_GET["id"];
                $con = mysqli_connect("127.0.0.1", "wiktornowicki", "esdevlix", "Portal");
                $result = mysqli_query($con, "SELECT * FROM `Articles` WHERE id=$id");
                $_POST = mysqli_fetch_assoc($result);

                $status = $row["status"];
                $title = $row["title"];
                $slug = $row["slug"];
                $cat = $row["cat"];
                $tags = $row["tags"];
                $content = $row["content"];

                mysqli_close($con);
                echo "<title>", $title,"</title>";
            }
            else
                header("Location: panel.php");
        ?>
        <div class = "artDisp">
            <?php
                if ($status == 1)
                    $status = "published";
                else
                    $status = "draft";

                if ($slug == 1)
                    $slug = "top article of the day";
                else
                    $slug = "undefined";

                switch($cat)
                {
                    case 1:
                        $category = "science";
                        break;
                    case 2:
                        $category = "technology";
                        break;
                    case 3:
                        $category = "psychology";
                        break;
                    case 4:
                        $category = "politics";
                        break;
                    case 5:
                        $category = "economy";
                        break;
                }

                echo
                "<table class = 'info'>
                    <tr><th>title</th><td>", $title,"</td></tr>
                    <tr><th>status</th><td>", $status,"</td></tr>
                    <tr><th>slug</th><td>", $slug,"</td></tr>
                    <tr><th>category</th><td>", $cat,"</td></tr>
                    <tr><th>tags</th><td>", $tags,"</td></tr>
                    <tr><th>content</th><td>", $content,"</td></tr>
                </table>";
            ?>
        </div>
    </head>
</html>