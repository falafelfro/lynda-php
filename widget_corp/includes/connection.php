<?php require_once ('constants.php') ?>
<?php $connection = mysql_connect (HOSTNAME,USERNAME,PASSWORD);
if (!$connection) {
	die ("couldn't connect to mysql" . mysql_error());
}
$db_select= mysql_select_db('widget_corp',$connection);
if (!$db_select) {
	die ("couldn't select the DB" . mysql_error());
}
?>

