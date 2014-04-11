<?php 
	$title = $_GET["title"];
	if (file_exists ("blogs/".$title."/main.php") == false) {
		header('Location: http://localhost/WCMS%20project/');
		exit;
	}
	include "blogs/heading.php";
    ?>
    <div id="main"><?php 
	include "blogs/".$title."/title.php";
	include "blogs/".$title."/main.php";
	?></div>
    <?php 
	include "blogs/footer.php";
?>