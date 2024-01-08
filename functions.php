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

function upload_images($image,$dir='images',array $file_types = ['image/jpeg','image/png','image/gif','image/jpg','image/svg','image/webp']){
	if(in_array($image['type'], $file_types)){
		if($image['size'] < 2*1024*1024 || $image['size'] > 1){
			if(!($image['error'] >= 1)){
				$fileNameArr = explode('.', $image['name']);
				$fileName = $fileNameArr[0];
				$fileExt = $fileNameArr[count($fileNameArr) - 1];
				$uniqueName = uniqid($fileName) . $fileExt ;
				if(move_uploaded_file($image['tmp_name'], $dir.'/'.$uniqueName)){
					return 'uploaded';
				}else{
					return 'some_error';
				}
			}else{
				return 'some_error';
			}
		}else{
			return 'wrong_size';
		}
	}else{
		return 'wrong_ext';
	}
}