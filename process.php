<html>
<head>
	<title>Process the Form</title>
</head>
<body>
<?php
$username=$_POST['username'];
$password=$_POST['password'];
$numeral=$_POST['numeral'];
$numeral2=$_POST['numeral2'];
$processed=$numeral * $numeral2;
echo "the username is $username <br />";
echo "the password is $password <br />";
echo "<b>$numeral2</b> times <b>$numeral</b> equals <b>$processed</b> ";
if ($processed>=21){
	echo " which is a huge number equal to or over <b>15</b>";
} else echo "which is a small number under <b>21</b> which is the legal drinking age. ";
?>
</body>
</html>