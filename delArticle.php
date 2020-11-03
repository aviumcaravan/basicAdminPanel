<?php
	$id = $_GET["id"];

	$con = mysqli_connect("127.0.0.1", "wiktornowicki", "esdevlix", "Portal");
	mysqli_query($con, "DELETE FROM `Articles` WHERE `id`=$id");
	mysqli_close($con);

	echo "article has been removed, redirecting back to the main page...";
	header("Location: ./panel.php");
?>