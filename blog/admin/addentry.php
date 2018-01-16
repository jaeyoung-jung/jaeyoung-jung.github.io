<?php
	var_dump($_POST);
	$blog_file=fopen("../blog_content.csv","a");
	fputcsv($blog_file,array($_POST["title"],$_POST["author"],time(),$_POST["content"]));
	fclose($blog_file);
?>
