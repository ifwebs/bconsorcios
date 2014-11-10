<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '../img/banner/'; // Relative to the root
include_once '../conexao.php';

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		$sql = mysql_query("INSERT INTO banner (foto) VALUES('{$_FILES['Filedata']['name']}')");
		move_uploaded_file($tempFile,$targetFile);
		echo 'ok';
	} else {
		echo 'Invalid file type.';
	}
}
echo 'ok';
?>
