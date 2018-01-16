<?php
	var_dump($_POST);
	$blog_file=fopen("../blog_content.csv");
	fputcsv($blog_file,array($_POST["title"],$_POST["author"],time(),$_POST["content"]));
?>