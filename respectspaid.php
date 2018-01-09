<?php
	$filename="respects.txt";
	$file=fopen($filename,"r");
	$filesize=filesize($filename);
	$filetext=fread($file,$filesize);
	echo $filetext;
	fclose($file);
	$number=(int)$filetext;
//	echo $number;
	$number+=1;
	$file=fopen($filename,"w");
	fwrite($file,(string)$number);
	fclose($file);
?>
