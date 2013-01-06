<html>
<head>
	<title>Cookies Read</title>
</head>
<body>
<?php

if (isset($_COOKIE['wowza'])) {$var1 = $_COOKIE['wowza'];}
if (isset($_COOKIE['expired'])) {$var2 = $_COOKIE['expired'];}

if (isset($var1)) {
echo $var1 . " is still an active cookie <br />";
} else echo "the var1 cookie is gone! poof!";
echo "<br />";
if (isset($var2)) {
echo $var2;
} else echo "the var2 cookie is gone! poof!";

?>

</body>
</html>