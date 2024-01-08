<?php

require_once 'functions.php';
$get_images = getImages('images');
if($get_images === false){
	die("There is No Directory");
}

if(isset($_POST['submit'])){
	if(isset($_FILES['image'])){
		if(!empty($_FILES['image'])){
			switch (upload_images($_FILES['image'],'images')) {
						case 'uploaded':
							echo 'image uploaded successuly!';
							break;
						case 'some_error':
							echo 'Image can not be uploaded due to some error';
							break;
						case 'wrong_size':
							echo 'Please Upload Image Between Range Of 1kb to 2mb';
							break;
						case 'wrong_ext':
							echo 'Image Type Not Supported!';
							break;
						
						default:
							// code...
							break;
					}		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP image gallery</title>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		.container{
			display: grid;
			grid-template-columns: 1fr 1fr 1fr;
			max-width: 90%;
			margin: auto;
			min-height: 100vh;
			min-height: 100lvh;
			place-items: center;
		}
		header{
			padding: 10px;
			margin: 10px;
			width: 95%;
			background: #0000f0;
			outline: 1px solid #fff;
			border-radius: 10px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.input input{
				padding: 10px;
				border:none;
				cursor: pointer;
		}
		.input input[type=submit]{
			background: #0f0;
			border-radius: 10px;
		}
	</style>
</head>
<body>
	<header>
		<div class="title">
			<h2>Kazi Mohammad Foysal</h2>
		</div>
		<div class="input">
			<form enctype="multipart/form-data" method="post">
				<input type="file" name="image">
				<input type="submit" name="submit">
			</form>
		</div>
	</header>
	<div class="container">
		<?php
		foreach($get_images as $image){
			echo '<img src="'.$image.'" alt="" width="200px">';
		}
		?>
	</div>
</body>
</html>