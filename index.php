﻿<?php
$tagid = urldecode($_GET["tagid"]);

if(isset($_POST["tagvalue"])) {
$tagvalue = $_POST["tagvalue"];
$file = fopen("tags.json","a+") or die ("file not found"); 
$json = file_get_contents('tags.json');
$data = json_decode($json, true);
$data[$tagid] = $tagvalue;
$newjson = json_encode($data);   
file_put_contents('tags.json', $newjson); 
fclose($file);
echo '<html><body><form action="index.php?tagid='.$tagid.'" method="post">edit scanned tag\'s value<input type="text" name="tagvalue" value="'.$tagvalue.'"><br><input type="submit"></form></body></html>';
}
else if(!isset($_POST["tagvalue"])) {
$file = fopen("tags.json","a+") or die ("file not found"); 
$json = file_get_contents('tags.json');
$data = json_decode($json, true);
@$output = $data["$tagid"];
echo '<html><body><form action="index.php?tagid='.$tagid.'" method="post">edit scanned tag\'s value<input type="text" name="tagvalue" value="'.$output.'"><br><input type="submit"></form></body></html>';
fclose($file);
}
?>
