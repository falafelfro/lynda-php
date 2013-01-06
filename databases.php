<?php

$connection = mysql_connect ("localhost","root",""); //creates connection
if (!$connection){
	die("couldn't connect  " . mysql_error());
}
$select_database = mysql_select_db("widget_corp", $connection); // selects db
if (!$select_database) {
	die ("couldn't connect to the selected database" . mysql_error());
}

?>
<html>
<head>
	<title>Databases</title>
</head>
<body>
<?php
$result= mysql_query("select * from subjects", $connection );
if (!$result){
	die ("there's no result" . mysql_error());
}
while ($row = mysql_fetch_array($result)){    //grabs rows from the table!
	echo $row [1] . " " . $row[2] . "<br />";
}

?>
</body>
</html>
<?php
mysql_close($connection);
?>