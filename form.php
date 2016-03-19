<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OAU Theses</title>
<link href="css_files/layout.css" rel="stylesheet" type="text/css" />
</head>

<body>
<section>
	<form action="adder.php" method="post">
    	Author:*<br />
        <input name="author" required="required"/><br /><br />
        Sex:<br />
        <select name="sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br /><br />
        Title:<br />
        <textarea name="title" required="required" rows="4" cols="70"></textarea><br /><br />
        Edition:<br />
        <input name="edition" /><br /><br />
        Subsidiary Author:<br />
        <input name="author_subsidiary" style="height: 2em"/><br /><br />
        Place of Publication:<br />
        <input name="place_of_publication" /><br /><br />
        Publisher Name:<br />
        <input name="publisher_name" /><br /><br />
        Date of Publication:<br />
        <select name="date_of_publication">
        	<?php
				for ($i = 1990; $i <= 2012; $i++)
					print("<option value=\"$i\">$i</option>");
			?>
		</select><br /><br />
        Report ID:<br />
        <input name="report_id" style="width: 10%"/><br /><br />
        Size:<br />
        <input name="size" style="width: 10%"/><br /><br />
        Document Language:<br />
        <input name="document_type" style="width: 20%"/><br /><br />
        Availablity: (Where it can be gotten)<br />
        <input name="availability" /><br /><br />
        Location or URL:<br />
        <input name="location_url" /><br /><br />
        Notes:<br />
        <textarea name="notes" rows="20" cols="70"></textarea><br /><br />
        Abstract:<br />
        <textarea name="abstract" rows="30" cols="70"></textarea><br /><br />
        Call Number:<br />
        <input name="call_number" /><br /><br />
        Keywords:*<br />
        <textarea name="keywords" required="required" rows="4" cols="70"></textarea><br /><br />
        <input type="submit" value="Submit" />
        </form>
</section>
</body>
</html>