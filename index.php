<?php

require_once 'functions.php';
$get_images = getImages('images');
if($get_images === false){
	die("There is No Directory");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP image gallery</title>
</head>
<body>
	<div class="container">
		<?php
		foreach($get_images as $image){
			echo '<img src="'.$image.'" alt="" width="200px">';
		}
		?>
	</div>
</body>
</html>