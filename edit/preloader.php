<script language="JavaScript">


function preloader() 

{
var toComplete = [];

<?php 
if ($handle = opendir('./blogs')) {
	$count = 0;
	$blacklist = array('.', '..', 'footer.php', 'heading.php', 'scripts.js', 'styles.css','main.php','summary.php');
	while (false !== ($file = readdir($handle))) {?>
	
		<?php if (!in_array($file, $blacklist)) {
			$title = str_replace(' ', '', $file);
			$title = str_replace('-', '', $title);
			?>
			
			
			<?php echo $title."Background"; ?> = new Image()
			
			<?php echo $title."Background.src"; ?>="blogs/<?php echo $file; ?>/background.jpg";
			
			toComplete.push(<?php echo $title."Background"; ?>)
			
			<?php $count += 1; ?>
			
		<?php }
	 }
	closedir($handle);

}
?>
	
	var tried = 0;
	while (images != loaded) {	
		for (i=0; i < toComplete.length; i++) {
			if (toComplete[i].complete) {
				console.log(toComplete[i].src+" has been cached")
				loaded += 1;
				var index = toComplete.indexOf(toComplete[i]);
				if (index > -1) {
					toComplete.splice(index, 1);
				}
			}
		}
		
		tried += 1
		if (tried == 1000 || toComplete.length == 0) {
			break
		}
	}

} 
var loaded = 0;
var images = <?php echo $count; ?>;



</script>
