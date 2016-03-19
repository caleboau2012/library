<?php
	if(!isset($_GET['search'],$_GET['search_type']))
	die("Error 404!");
	
	require_once("boye.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OAU Theses</title>
<link href="<?php echo PATH_BASE_URL; ?>css_files/layout.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="search">
	<img src="<?php echo PATH_BASE_URL; ?>images/hat.jpg" />
	<h1>ABU DLC e-Library</h1>
	<form action="<?php echo PATH_BASE_URL; ?>result.php">
        <input type="text" value="<?php echo $_GET['search']; ?>" name="search" class="input" required="required" placeholder="Enter your Search Query Here" />
        <input type="submit" value="GO!!!" class="submit"/><br />
        <div>
            <input type="radio" name="search_type" value="title" checked="checked">Title
            <input type="radio" name="search_type" value="author">Author
            <input type="radio" name="search_type" value="keywords">Keywords
        </div>
    </form>
</div>
<br />
<h2 id="result">The Results</h2>
	<?php
		$search = $_GET['search'];
		$field = $_GET['search_type'];
		
		mysql_connect("localhost", "root", "");
		mysql_select_db("library");
		
		$query = "SELECT author, title, abstract, ID FROM records WHERE $field LIKE '%$search%'";
		
		$result_id = mysql_query($query);
			
		print("<div class = 'result'>\n
				  <ol>\n");
		$result = mysql_fetch_row($result_id);
		if ($result){
			while ($result){
				$abstract = $result[2];
				if (strlen($abstract) > 200)
					$abstract = substr($abstract, 0, 200) . "...";
				print("<li><b>Author:</b> " . $result[0] . "<br>" . 
					"<b>Title:</b> <a target='_blank' href='".PATH_BASE_URL."detail/" . $result[3] ."/".createURL($result[1])."'>" . $result[1] . "</a><br>" . 
					"<b>Abstract:</b> " . $abstract . "</li>\n");

				$result = mysql_fetch_row($result_id);
			}
			
			print("</ol>\n
				  </div>");
		}
		else {
			print("<h3> Your query didn't find any results</h3>");
		}
		
		
		function createURL($m){
			$d = str_replace(" ","-",$m);
			return $d;
		}
	?>
</body>
</html>