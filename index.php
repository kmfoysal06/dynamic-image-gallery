<?php

$openDir = opendir('images');
while($img = readdir($opendir)){
	echo var_dump($img);
}

closedir($opendir);