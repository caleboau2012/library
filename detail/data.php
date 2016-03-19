<?php
	if(!isset($_GET['view']))
	die("Error 404!");
	
	require_once("../boye.php");
	
	$base_url_path = parse_url($_REQUEST["view"]);
	//($base_url_path["path"]);
	$frag = explode("/",$base_url_path["path"]);
//	var_dump($_REQUEST);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OAU Theses</title>
<link href="<?php echo PATH_BASE_URL; ?>css_files/layout.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center><a href="<?php echo PATH_BASE_URL; ?>">Search again</a></center><br /><br />

<?php

	$id = $frag[1];
	mysql_connect("localhost", "root", "");
	mysql_select_db("library");
		
	$query = "SELECT * FROM records WHERE ID = $id";
	

	
	$result_id = mysql_query($query);
	
	while($result = mysql_fetch_row($result_id)){
		print("<b>Author:</b> " . $result[1] . "<br>" .
			"<b>Sex:</b> " . $result[2] . "<br><br>" .
			"<b>Title:</b> " . $result[3] . "<br><br>" .
			"<b>Edition:</b> " . $result[4] . "<br>" .
			"<b>Subsidiary Authors:</b> " . $result[5] . "<br><br>" .
			"<b>Place of Publication:</b> " . $result[6] . "<br>" .
			"<b>Publisher Name:</b> " . $result[7] . "<br>" .
			"<b>Date of Publication:</b> " . $result[8] . "<br><br>" .
			"<b>Document Type:</b> " . $result[11] . "<br>" .
			"<b>Availability:</b> " . $result[12] . "<br>" .
			"<b>Location / URL:</b> " . $result[13] . "<br><br>" .
			"<b>Notes:</b> " . $result[14] . "<br><br>" .
			"<b>Abstract:</b> " . $result[15] . "<br><br>" .
			"<b>Keywords:</b> " . $result[17]);
	}
?>
</body>
</html>