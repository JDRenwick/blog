<?php 
	if (isset($_GET["title"])) {
		$title = $_GET["title"];
		if (file_exists ("blogs/".$title."/main.php") == false) {
			header('Location: http://www.aimee-farndale.com/');
			exit;
		}
	}
	else 
	{
		header('Location: http://www.aimee-farndale.com/');
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit <?php echo $title; ?></title>
<link rel="shortcut icon" href="../img/favicon.ico">
</head>

<body><?php
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if($_POST["action"] == "remove") {
			unlink("../blogs/".$title."/background.jpg");
			unlink("../blogs/".$title."/background-blur.jpg");
			unlink("../blogs/".$title."/title.php");
			unlink("../blogs/".$title."/main.php");
			unlink("../blogs/".$title."/summary.php");
			unlink("../blogs/".$title."/thumbnail.jpg");
			rmdir("../blogs/".$title);
			?>
            	<h3><?php echo $title; ?> has been successfully removed from the web page</h3>
       			 <p><a href="/edit">Go back</a></p>
            
            
            <?php
		}
		elseif($_POST["action"] == "delete") {
			unlink("../blogs/".$title."/background.jpg");
			unlink("../blogs/".$title."/background-blur.jpg");
			unlink("../blogs/".$title."/title.php");
			unlink("../blogs/".$title."/main.php");
			unlink("../blogs/".$title."/summary.php");
			unlink("../blogs/".$title."/thumbnail.jpg");
			rmdir("../blogs/".$title);
			unlink("./blogs/".$title."/background.jpg");
			unlink("./blogs/".$title."/background-blur.jpg");
			unlink("./blogs/".$title."/title.php");
			unlink("./blogs/".$title."/main.php");
			unlink("./blogs/".$title."/summary.php");
			unlink("./blogs/".$title."/thumbnail.jpg");
			rmdir("./blogs/".$title);
			?>
            	<h3><?php echo $title; ?> has been successfully deleted</h3>
       			 <p><a href="/edit.php">Go back</a></p>
            
            <?php
		}
		
	}
	else {
	?>
		<h3>Delete <?php echo $title; ?>?</h3>
        <p><a href="/edit.php">Go back</a></p>
        <form action="delete.php?title=<?php echo $title; ?>" method="post" enctype="multipart/form-data">
        <input type='hidden' name='action' value='remove'>
		<input class="submit" type="submit" name="submit" value="Remove from live" />
        </form>
        <form action="delete.php?title=<?php echo $title; ?>" method="post" enctype="multipart/form-data">
        <input type='hidden' name='action' value='delete'>
		<input class="submit" type="submit" name="submit" value="Delete all" />
        </form>
    <?php 
	}
	?>
    </body>
</html>