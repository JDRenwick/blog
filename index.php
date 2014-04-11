
<?php 
	include "heading.php";
?>
<div id="sort">
<p>Sort by:
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="sort" value="latest">
<input class="submit" type="submit" name="publish" value="Latest" />
</form>
<p>|</p>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="sort" value="alphabetical">
<input class="submit" type="submit" name="publish" value="Alphabetical" />
</form>
<div class="clear"></div>
</div>
<div id="articles">


<?php
if (!isset($_POST["sort"]) || $_POST["sort"] == "latest") {
$folders = array();
if ($handle = opendir('./blogs')) {
	$blacklist = array('.', '..', 'footer.php', 'heading.php', 'scripts.js', 'styles.css');
	while (false !== ($folder = readdir($handle))) {
		if (!in_array($folder, $blacklist)) {
        	$folders[filemtime("./blogs/".$folder."/main.php")] = $folder;
		}
	}
	closedir($handle);
}

// sort
ksort($folders);
// find the last modification
$reallyLastModified = end($folders);

while (count($folders) > 0)  {
	foreach($folders as $folder) {
		$lastModified = date('F d Y, H:i:s',filemtime("./blogs/".$folder."/main.php"));
		if ($folder == $reallyLastModified) {?><div class="article"><div class="image" style="background: url(blogs/<?php echo rawurlencode($folder); ?>/thumbnail.jpg) no-repeat center center; background-size:100%"></div><h3><a class="title" href="blog.php?title=<?php echo $folder; ?>"><?php echo $folder; ?></a></h3><?php include "blogs/".$folder."/summary.php"; ?><a class="boxLink" href='blog.php?title=<?php echo $folder; ?>'></a></div><?php 
			$key = array_search($reallyLastModified,$folders);
			unset($folders[$key]);
			$reallyLastModified = end($folders);
		}
	}
}
}

else if($_POST["sort"] == "alphabetical") {
	
	if ($handle = opendir('./blogs')) {
		$blacklist = array('.', '..', 'footer.php', 'heading.php', 'scripts.js', 'styles.css');
		while (false !== ($folder = readdir($handle))) {
			if (!in_array($folder, $blacklist)) {?><div class="article"><div class="image" style="background: url(blogs/<?php echo rawurlencode($folder); ?>/thumbnail.jpg) no-repeat center center; background-size:100%"></div><h3><a class="title" href="blog.php?title=<?php echo $folder; ?>"><?php echo $folder; ?></a></h3><?php include "blogs/".$folder."/summary.php"; ?><a class="boxLink" href='blog.php?title=<?php echo $folder; ?>'></a></div><?php }
		}
		closedir($handle);
	}
}
?>
</div>

<?php
	include "footer.php";
?>