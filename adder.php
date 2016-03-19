<?php
	session_start();
	$test = array();
	array_push($test, $_POST['author'], $_POST['sex'], $_POST['title'], $_POST['edition'], $_POST['author_subsidiary'], $_POST['place_of_publication'], $_POST['publisher_name'], $_POST['date_of_publication'], $_POST['report_id'], $_POST['size'], $_POST['document_type'], $_POST['availability'], $_POST['location_url'], $_POST['notes'], $_POST['abstract'], $_POST['call_number'], $_POST['keywords']);
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("library");
	
	$query = "INSERT INTO records (author, role, title, edition, author_subsidiary, place_of_publication, publisher_name, date_of_publication, report_id, size, document_type, availability, location_url, notes, abstract, call_number, keywords) VALUES ('" .  mysql_real_escape_string($test[0]) . "', '$test[1]', '" .  mysql_real_escape_string($test[2]) . "', '". mysql_real_escape_string($test[3]) . "', '" . mysql_real_escape_string($test[4]) . "', '" . mysql_real_escape_string($test[5]) . "', '" . mysql_real_escape_string($test[6]) . "', $test[7], '" . mysql_real_escape_string($test[8]) . "', '" . mysql_real_escape_string($test[9]) . "', '" . mysql_real_escape_string($test[10]) . "', '" . mysql_real_escape_string($test[11]) . "', '" . mysql_real_escape_string($test[12]) . "', '" . mysql_real_escape_string($test[13]) . "', '" . mysql_real_escape_string($test[14]) . "', '" . mysql_real_escape_string($test[15]) . "', '" . mysql_real_escape_string($test[16]) . "')";

	$result_id = mysql_query($query);
	if (!$result_id){
		foreach ($test as $t){
			print ($t . "|");
		}
		print (var_dump($result_id));
	}
	else{
		print("<script>
			  alert(\"Successful\");
			  </script>");
		$_SESSION['success'] = true;
		header("Location: index.php");
	}		
?>