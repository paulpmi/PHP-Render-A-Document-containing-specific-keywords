<?php

session_start();

$name = $_GET['name'];

$databaseCon = new mysqli("localhost", "root", "", "examen");
$templates = $databaseCon->query("SELECT listOfTemplates FROM `Document` WHERE title = '$name'")->fetch_object()->listOfTemplates;
$templates = explode(",",$templates);

$keywords = $databaseCon->query("SELECT key0 FROM Keyword");


//echo $templates;
foreach ($templates as $template){
		$texts = $databaseCon->query("SELECT textContent FROM `Template` WHERE id = '$template'")->fetch_object()->textContent;
		$arrayOfText = str_split($texts);
		$i = 0;
		foreach ($arrayOfText as $value){
			if ($i < count($arrayOfText)-1){
				if ($arrayOfText[$i] == '{' and $arrayOfText[$i+1] == '{'){
					$j = $i+2;
					$newString = array();
					while ($arrayOfText[$j] != '}'){
						array_push($newString, $arrayOfText[$j]);
						$j++;
					}
					
					$newString2 = implode("", $newString);
					foreach($keywords as $keyword)
						foreach ($keyword as $key) {
							if ($key == $newString2){
								$value = $databaseCon->query("SELECT value FROM Keyword where key0='$key'")->fetch_object()->value;
								echo " ", $value, " ";
							}
					
				}
				$i = $j+2;
			}
			else
				echo $arrayOfText[$i];
				$i++;
			}
		}
	}
?>