<?php
	
	mysql_connect("localhost", "calebcom_root", "prince");
	mysql_select_db("calebcom_library");
		
//	$contents = file_get_contents("txt_files/Datad_2.txt");
//	$contents = file_get_contents("txt_files/Library School IT2010.txt");
//	$contents = file_get_contents("txt_files/Mudah IT.txt");
//	$contents = file_get_contents("txt_files/OAU Dissertation.txt");
//	$contents = file_get_contents("txt_files/OAU Theses 2.txt");
//	$contents = file_get_contents("txt_files/OAU Theses 4 -Osagiede.txt");
//	$contents = file_get_contents("txt_files/OAU Theses 84.txt");
//	$contents = file_get_contents("txt_files/OAU Theses.txt");
//	$contents = file_get_contents("txt_files/OAUdatad_set2.txt");
//	$contents = file_get_contents("txt_files/Oladipupo 1984 bkup.txt");
//	$contents = file_get_contents("txt_files/Osagiede.txt");
	
	$contents = explode("*", $contents);
	
	$new = array();
			
	$filename = "odd.doc";
	$fp = fopen($filename, "a") or die("Error opening file");
	
	for($i = 0; $i < sizeof($contents); $i++){
		$test = explode("|", $contents[$i]);
		
		if (sizeof($test) != 45){
			$fout = fwrite($fp, $contents[$i] . "\n");
			unset($contents[$i]);
		}
	}
	
	array_pop($contents);

	foreach($contents as $conts){
		$test = explode("|", $conts);
		
		if  (($test[7] == "M") || ($test[7] == "m"))
			$test[7] = 'male';
		else if (($test[7] == "F") || ($test[7] == "f"))
			$test[7] = 'female';
	
		for ($i = 0; $i < sizeof($test); $i++){
			if (!isset($test[$i]) || ($test[$i] == NULL)){
				if ($i == 7)
					$test[$i] = 0;
				else
					$test[$i] = "";
			}
		}
		
		$title = mysql_real_escape_string($test[8]);
		
		$query = "SELECT title from records where title = '$title'";
		$value = mysql_query($query);
		//var_dump($value);
		
		if ($value){
			if (mysql_num_rows($value) == 0){		
				$query_1 = "INSERT INTO records (author, role, title, edition, author_subsidiary, place_of_publication, publisher_name, date_of_publication, report_id, size, document_type, availability, location_url, notes, abstract, call_number, keywords) VALUES ('" .  mysql_real_escape_string($test[6]) . "', '$test[7]', '" .  mysql_real_escape_string($test[8]) . "', '". mysql_real_escape_string($test[14]) . "', '" . mysql_real_escape_string($test[15]) . "', '" . mysql_real_escape_string($test[17]) . "', '" . mysql_real_escape_string($test[18]) . "', $test[19], '" . mysql_real_escape_string($test[22]) . "', '" . mysql_real_escape_string($test[27]) . "', '" . mysql_real_escape_string($test[34]) . "', '" . mysql_real_escape_string($test[36]) . "', '" . mysql_real_escape_string($test[37]) . "', '" . mysql_real_escape_string($test[41]) . "', '" . mysql_real_escape_string($test[42]) . "', '" . mysql_real_escape_string($test[43]) . "', '" . mysql_real_escape_string($test[44]) . "')";
			
				$result_id = mysql_query($query_1);
				if (!$result_id){
					foreach ($test as $t){
						print ($t . "|");
					}
					print (var_dump($result_id));
					print ("<br> <p><br></p> <br>");
				}
			}
			else
				echo "shing <br>";
		}
		else
			echo mysql_error() . "<br>";
	}
?>