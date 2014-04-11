<?php  
if (isset($_GET["title"])) {
	$title = $_GET["title"];
	$background = "./blogs/".$title."/background.jpg";
	$backgroundBlur = "./blogs/".$title."/background-blur.jpg";
	$mainText = htmlentities(file_get_contents("./blogs/".$title."/main.php"));
	$summary = htmlentities(file_get_contents("./blogs/".$title."/summary.php"));
	$thumbnail = "./blogs/".$title."/thumbnail.jpg";
	$message = "Choose which files to amend";
	
}
else {
		header('Location: http://localhost/WCMS%20project/');
		exit;
}

function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if($_POST["action"] == "publish" && $_POST["approval"]) {
			if (!file_exists("../blogs/".$title)) {
				mkdir("../blogs/".$title);
			}
			copy("./blogs/".$title."/background.jpg", "../blogs/".$title."/background.jpg");
			copy("./blogs/".$title."/background-blur.jpg", "../blogs/".$title."/background-blur.jpg");
			copy("./blogs/".$title."/main.php", "../blogs/".$title."/main.php");
			copy("./blogs/".$title."/summary.php", "../blogs/".$title."/summary.php");
			copy("./blogs/".$title."/thumbnail.jpg", "../blogs/".$title."/thumbnail.jpg");
			$message = "All changes have been made live";
		}
		else if($_POST["action"] == "submit") {
			if($_FILES['background']['name'])
			{
				//if no errors...
				if(!$_FILES['background']['error'])
				{
					if (file_exists("./blogs/".$title."/background.jpg")) {
						unlink("./blogs/".$title."/background.jpg");
					}
					$filename = compress($_FILES['background']['tmp_name'],"./blogs/".$title."/background.jpg",75);
					$message = 'Congratulations!  Your file was accepted.';
				}
				//if there is an error...
				else
				{
					//set that to be the returned message
					$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['background']['error'];
				}
			}
			
			if($_FILES['background-blur']['name'])
			{
				//if no errors...
				if(!$_FILES['background-blur']['error'])
				{
					if (file_exists("./blogs/".$title."/background-blur.jpg")) {
						unlink("./blogs/".$title."/background-blur.jpg");
					}
					$filename = compress($_FILES['background-blur']['tmp_name'],"./blogs/".$title."/background-blur.jpg",75);
					$message = 'Congratulations!  Your file was accepted.';
				}
				//if there is an error...
				else
				{
					//set that to be the returned message
					$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['background-blur']['error'];
				}
			}
			
			if($_FILES['thumbnail']['name'])
			{
				//if no errors...
				if(!$_FILES['thumbnail']['error'])
				{
					if (file_exists("./blogs/".$title."/thumbnail.jpg")) {
						unlink("./blogs/".$title."/thumbnail.jpg");
					}
					$filename = compress($_FILES['thumbnail']['tmp_name'],"./blogs/".$title."/thumbnail.jpg",75);
					$message = 'Congratulations!  Your file was accepted.';
				}
				//if there is an error...
				else
				{
					//set that to be the returned message
					$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['thumbnail']['error'];
				}
			}
			
			$File = "./blogs/".$title."/main.php"; 
			$Handle = fopen($File, 'w');
			$Data = $_POST["main-text"];
			fwrite($Handle, $Data);
			fclose($Handle); 
			
			$File2 = "./blogs/".$title."/summary.php"; 
			$Handle2 = fopen($File2, 'w');
			$Data2 = $_POST["summary"];
			fwrite($Handle2, $Data2);
			fclose($Handle2); 
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit <?php echo $title; ?></title>
</head>

<body class="edit">
<div id="window">
<div id="editor">
    <p><a href="blog.php?title=<?php echo $title; ?>" target="_blank" style="
    text-decoration: none;
    text-shadow: none;
    color: green;
    border: 2px green solid;
    padding: 1% 2%;
    border-radius: 5px;
    display:block;
    text-align:center;
">Preview</a></p>
    <br />
    <p><strong><?php echo $message; ?></strong></p>
    <form action="edit-blog-test.php?title=<?php echo $title; ?>" method="post" enctype="multipart/form-data">
    <hr />
	<p>Change background:</p>
    <input type="file" name="background" size="50%" />
    <hr />
    <p>Change blurred background: </p>
    <input type="file" name="background-blur" size="50%" />
    <hr />
    <p>Edit text: </p>
    <textarea type="text" name="main-text" rows="10" cols="35" />
	<?php echo $mainText; ?>
    </textarea>
    <hr />
    <p>Edit summary: </p>
    <textarea type="text" name="summary" rows="10" cols="35" />
	<?php echo $summary; ?>
    </textarea>
    <hr />
    <p>Change thumbnail: </p>
    <input type="file" name="thumbnail" size="50%" />
    <hr />
    <input type='hidden' name='action' value='submit'>
	<input class="submit" type="submit" name="submit" value="Submit" />
</form>

    <form action="edit-blog-test.php?title=<?php echo $title; ?>" method="post" enctype="multipart/form-data">
    <hr class="thick" />
    <p>Check this box to make blog edits go live <input name="approval" type="checkbox" /></p>
    <input type='hidden' name='action' value='publish'>
	<input class="submit" type="submit" name="publish" value="Publish" />
    </form>
</div>
<div id="preview">
<?php include("blog.php") ?>
</div>
</div>
</body>
</html>