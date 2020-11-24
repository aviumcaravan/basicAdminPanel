<!doctype html>
<html>
	<head>
		<title>add an article</title>
		<link rel = "stylesheet" href = "./articleForm.css">
		<meta charset = "UTF-8">
	</head>
	<body>
		<div class = "theForm">
			<?php
				if (
					isset($_POST["status"]) &&
					isset($_POST["title"]) &&
					isset($_POST["slug"]) &&
					isset($_POST["cat"]) &&
					isset($_POST["tags"]) &&
					isset($_POST["content"])
					)
				{
					$status = $_POST["status"];
					$title = $_POST["title"];
					$slug = $_POST["slug"];
					$cat = $_POST["cat"];
					$tags = $_POST["tags"];
					$content = $_POST["content"];

					$con = mysqli_connect("127.0.0.1", "wiktornowicki", "esdevlix", "Portal");
					mysqli_query($con, "INSERT INTO `Articles`(`id`, `status`, `title`, `slug`, `cat`, `tags`, `content`) VALUES(null, $status, '$title', $cat, '$tags', '$content')");
					mysqli_close($con);
				}
			?>

			<h2 class = "sectionName">add an article</h2>
			<div class = "keys">
				make public: <br>
				title: <br>
				article of the day? <br>
				category: <br>
				tags: <br>
				content: <br>
			</div>
			<div class = "values">
				<form action = "articleForm.php" method = "post">
					yes <input type = "radio" value = "1" name = "status" checked>
					no  <input type = "radio" value = "0" name = "status">    <br>

					<input type = "text" name = "title">                      <br>

					yes   <input type = "radio" value = "1" name = "slug" checked>
					no    <input type = "radio" value = "0" name = "slug">    <br>

					<select name = "cat">
						<option value = "1">science</option>
						<option value = "2">technology</option>
						<option value = "3">psychology</option>
						<option value = "4">politics</option>
						<option value = "5">economy</option>
					</select>                                                 <br>

					<input type = "text" name = "tags">                       <br>
					<textarea name = "content"></textarea>                    <br>
					<input type = "submit" value = "submit">
				</form>
			</div>
		</div>
	</body>
</html>