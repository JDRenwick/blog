<?php  
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$directory = $_POST["directory"];
	if (!file_exists("./blogs/".$directory)) {
		mkdir ("./blogs/".$directory ,0777);
		$File = "./blogs/".$directory."/title.php"; 
		$Handle = fopen($File, 'w');
		$Data = "<h2>LOREM IPSUM DOLOR</H2>";
		fwrite($Handle, $Data);
		fclose($Handle); 
		$File = "./blogs/".$directory."/main.php"; 
		$Handle = fopen($File, 'w');
		$Data = file_get_contents("lorem.php");
		fwrite($Handle, $Data);
		fclose($Handle); 
		$File = "./blogs/".$directory."/summary.php"; 
		$Handle = fopen($File, 'w');
		$Data = file_get_contents("lorem-summary.php");
		fwrite($Handle, $Data);
		fclose($Handle); 
		copy("background.jpg", "./blogs/".$directory."/background.jpg");
		copy("background-blur.jpg", "./blogs/".$directory."/background-blur.jpg");
		copy("thumbnail.jpg", "./blogs/".$directory."/thumbnail.jpg");
		
		header('Location: ./edit-blog.php?title='.$directory);
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Create blog</title>
<link rel="shortcut icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="../styles.css">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrap">

  <div id="header">
    <h1><a href="/" >James' Blog:</a> Create a blog</h1>
  </div>
  <?php if(!isset($directory)) { ?>
  <form action="add-blog.php" method="post" enctype="multipart/form-data">
	New blog title: <input type="text" name="directory" size="25" />
	<input type="submit" name="submit" value="Submit" />
</form>
<?php } else { ?>
	<h2><?php echo $directory; ?> already exists</h2>
  <form action="add-blog.php" method="post" enctype="multipart/form-data">
	New blog title: <input type="text" name="directory" size="25" />
	<input type="submit" name="submit" value="Submit" />
<?php } ?>
 </div>
</body>
</html>