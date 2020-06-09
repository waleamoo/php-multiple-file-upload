<!DOCTYPE html>
<html>
<head>
	<title>JQuery Calendar</title>
	<meta charset="utf-8" />
</head>
<body>
	<br />
	<h2 align="center"><a href="#">Mulitple file upload</a></h2>
	<br />
	<form action="index.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file_array[]"><br><br>
		<input type="file" name="file_array[]"><br><br>
		<input type="file" name="file_array[]"><br><br>
		<input type="submit" name="upload" value="Upload">
	</form>
	
</body>
</html>

<?php 
$upload_files = array();
if(isset($_FILES['file_array'])){
	$name_array = time() . $_FILES['file_array']['name'];
	$tmp_name_array = $_FILES['file_array']['tmp_name'];
	$type_array = $_FILES['file_array']['type'];
	$size_array = $_FILES['file_array']['size'];
	$error_array = $_FILES['file_array']['error'];
	
	for($i = 0; $i < count($tmp_name_array); $i++){
		// temporary location, final location
		if(move_uploaded_file($tmp_name_array[$i], "upload/" . $name_array[$i])){
			$upload_files[$i] = $name_array[$i] . "upload<br>";
		}else{
			echo "error uploading " . $name_array[$i] . "<br>";
		}
	}
}

echo @$name_array[0] . " " . @$name_array[1] . " " . @$name_array[2];



/*
if(is_array($_FILES)){
	foreach(@$_FILES['files']['name'] as $name => $value){
		$file_name = explode(".", $_FILES['files']['name'][$name]);
		$allowed_ext = array("jpg", "jpeg", "png", "gif");
		if(in_array($file_name[1], $allowed_ext)){
			$new_name = md5(rand()) . '-' . $file_name[1];
			$source_path = $_FILES['files']['tmp_name'][$name];
			$target_path = "upload/" . $new_name;
			
			move_uploaded_file($source_path, $target_path);
			
			// store array in an array
			$upload_files = $new_name[$value];
			
		}
	}
}

for($i = 0; $i < count($upload_files); $i++){
	echo $upload_files[$i] . "<br />";
}


*/

?>