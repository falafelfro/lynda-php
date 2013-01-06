<html>
<head>
	<title>Second Page</title>
</head>
<body>
<?php
$topping=$_GET['pizza'];
echo $topping . "<br />";
echo $_GET['type'] . "<br />";
if (isset($_GET['monkey'])){
	echo $_GET['monkey'] . "<br />";
} else echo "aint no monkeys <br />" ;
?>
<?php
echo "printing the get array:". "<br />";
print_r($_GET);
echo "<br />";

?>
</body>
</html>