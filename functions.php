<?php

function getImages($dir,array $explode = array('.','..')){
	$files = [] ;
	if(is_dir($dir) && $open_dir = opendir($dir)){
		while ($read_dir = readdir($open_dir)) {
			if(in_array($read_dir, $explode)){
				continue;
			}

		$files[] = $dir.'/'.$read_dir ;
			}
	}else{
		return false;
	}

	return $files ;
	closedir($open_dir);
	}

