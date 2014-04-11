<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link rel="shortcut icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="styles.css">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
#wrap.focus {
	background: fixed; 
background-image: url(blogs/<?php echo rawurlencode($title); ?>/background.jpg);
background-size:150%;
background-repeat:no-repeat;
background-position: top center; 
    -web-kit-transition: background-size 2s ease;  
    -moz-transition:  background-size 2s ease;  
    -o-transition:  background-size 2s ease;  
    transition:  background-size 2s ease; 
}
#wrap.blur {
background: url(blogs/<?php echo rawurlencode($title); ?>/background-blur.jpg) no-repeat top center fixed;
background-size:150%;
    -webkit-transition: background 1s ease;  
    -moz-transition: background 1s ease;  
    -o-transition: background 1s ease;  
    transition: background 1s ease; 
	
}
#wrap.small {
background: url(blogs/<?php echo rawurlencode($title); ?>/background.jpg);
background-repeat: no-repeat;
background-position: center 100px;
background-size:100%;
	
}
	</style>
    <script>		
	var blurImage = new Image()
	blurImage.src = "blogs/<?php echo $title; ?>/background-blur.jpg";
	
	//# sourceURL=dynamicScript.js 
	</script>
</head>
<body class="blog-body">
<div id="wrap" class="focus">

  <div id="header" class="blog-header">
    <h1><a href="http://localhost/WCMS%20project/">James' Blog:</a> <?php echo $title; ?></h1>
  </div>