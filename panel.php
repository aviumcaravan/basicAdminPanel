<!doctype html>

<html>
	<head>
		<title>article manager</title>
		<meta charset = "UTF-8">
		<link rel = "stylesheet" href = "./panel.css">
		<?php
			$iS = false;
			
			if (isset($_POST["search"]))
			{
				$iS = true;
				$search = $_POST["search"];
			}
		?>
	</head>
	<body>
		<h1 class = "banner">administrator panel</h1>
		<h2 class = "sectionName">articles</h2>
		<div class = "topBar">
			<h2 class = "artCount">
				<?php
					$con = mysqli_connect("127.0.0.1", "wiktornowicki", "esdevlix", "Portal");

					$r = mysqli_query($con, "SELECT COUNT(id) AS number FROM `Articles`");
					$cnt = (mysqli_fetch_assoc($r)["number"]);
					echo "total entries: ", $cnt;
				?>
			</h2>
			<div class = "searchBar">
				<form action = "panel.php" method = "get">
					<input type = "text" name = "search" class = "sBox"></input>
					<input type = "submit" value = "go"></input>
				</form>
			</div>
		</div>
		<table class = "artList">
			<tr>
				<td class = "status">status</td>
				<td class = "title">title</td>
				<td class = "slug">top daily?</td>
				<td class = "content">content</td>
				<td class = "cat">category</td>
				<td class = "tags">tags</td>
				<td class = "actions">actions</td>
			</tr>
			<?php
				$con = mysqli_connect("127.0.0.1", "wiktornowicki", "esdevlix", "Portal");

				if (isset($_GET["search"]))
				{
					$str = $_GET["search"];
					$v = mysqli_query($con, "SELECT * FROM `articles` WHERE `title` LIKE '%$str%'");
				}
				else
					$v = mysqli_query($con, "SELECT * FROM `articles`");

				while ($_POST = mysqli_fetch_assoc($v))
				{
					$status = $_POST["status"];
					$title = $_POST["title"];
					$slug = $_POST["slug"];
					$content = $_POST["content"];
					$cat = $_POST["cat"];
					$tags = $_POST["tags"];

					if ($slug == 1)
						$slug = "article of the day";
					else
						$slug = "";

					switch ($cat)
					{
						case 1:
							$cat = "science";
							break;
						case 2:
							$cat = "technology";
							break;
						case 3:
							$cat = "psychology";
							break;
						case 4:
							$cat = "politics";
							break;
						case 5:
							$cat = "economy";
							break;
					}

					echo
					"<tr>
						<td>", $status,"</td>
						<td>", $title,"</td>
						<td>", $slug,"</td>
						<td>", $content,"</td>
						<td>", $cat,"</td>
						<td>", $tags,"</td>
						<td>
							<a href = 'editArticle.php?id=", $id,"'><button class = 'edit'><img src='edit.svg' width = '16' height = '16'></img></button></a>
							<a href = 'prvArticle.php?id=", $id,"'><button class = 'prev'><img src='preview.svg' width = '16' height = '16'></img></button></a>
							<a href = 'delArticle.php?id=", $id,"'><button class = 'del'><img src='delete.svg' width = '16' height = '16'></img></button></a>
						</td>
					</tr>";
				}

				mysqli_close($con);
			?>
		</table>
	</body>
</html>