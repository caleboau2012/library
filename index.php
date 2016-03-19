<?php
	session_start();
	if (isset($_SESSION['success']))
		print("<script>
			  	alert(\"Success\");
				</script>");
	session_destroy();
	
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
    <div class="searchbar">
    	<img src="<?php echo PATH_BASE_URL; ?>images/hat.jpg" />
    	<h1>ABU DLC e-Library</h1>
        <form action="<?php echo PATH_BASE_URL; ?>result.php">
        <input type="text" name="search" class="input" placeholder="Enter your Search Query Here" />
        <input type="submit" value="GO!!!" class="button"/><br />
        <div>
            <input type="radio" name="search_type" value="title" checked="checked" >Title
            <input type="radio" name="search_type" value="author" >Author
            <input type="radio" name="search_type" value="keywords">Keywords
        </div>
        </form>
</body>
</html>