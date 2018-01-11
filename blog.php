<?php
define("FILENAME","blog_content.csv");
define("PREVIEW_LENGTH",15);
$blog_file=fopen(FILENAME,"r") or die("Unable to open file!");
$blog_content_array=array();
while(($line=fgetcsv($blog_file))!==false){
	if (array(null)!==$line){
       		$blog_content_array[]=$line;
	}
}
fclose($blog_file);
$is_entry=false;
if(isset($blog_content_array[$_GET["id"]])){
	$is_entry=true;
	$id=$_GET["id"];
}

?>

<!doctype html>
<html>
	<head>
		<title><?php if($is_entry){echo $blog_content_array[$id][0]." - ";}?>Weblog</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="header">
			<h1>Weblog</h1>
			<p><a href="index.php">Return to Index</a>
			<?php if($is_entry){?> | <a href="blog.php">Return to Blog</a><?php;}?></p>
		</div>
		<?php
			if($is_entry){
			        echo "<p><h2>".$blog_content_array[$id][0]."</h2>\n";
                    echo "<i>by ".$blog_content_array[$id][1]."<br>\n";
                    echo "Posted on ".date("Y-m-d G:i",$blog_content_array[$id][2])."<br></i></p>\n";
                    echo "<p>".$blog_content_array[$id][3]."<br></p>\n";

			}else{
				$index=count($blog_content_array);
				while($index){
						$index--;
				        echo "<p><h3><a href=\"blog.php?id=$index\">".$blog_content_array[$index][0]."</a></h3>\n";
				        echo "<i>by ".$blog_content_array[$index][1]."<br>\n";
				        echo "Posted on ".date("Y-m-d G:i",$blog_content_array[$index][2])."<br></i></p>\n";
				        $words=explode(" ",$blog_content_array[$index][3]);
					if(sizeof($words)>PREVIEW_LENGTH){
						echo "<p>".implode(" ",array_slice($words,0,PREVIEW_LENGTH))." [...]<br></p>\n";
					}else{
						echo "<p>".$blog_content_array[$index][3]."<br></p>\n";
					}
				}
			}
		?>
<?php
include "footer.php";
?>
