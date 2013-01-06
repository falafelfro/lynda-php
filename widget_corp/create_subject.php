<?php
require_once ('includes/connection.php');
require_once ('includes/functions.php');
?>


<?php 
		$errors = array();

      // Form Validation
      if (!isset($_POST['menu_name']) || empty($_POST['menu_name'])) {

      $errors [] = "problem with menu_name";

      }

      if (!empty($errors)) {
      	redirect_to('new_subject.php');
      }

 ?>
	<?php  // $_POST['menu_name'] this is the new subject;
	$added_subject = mysql_prep($_POST['menu_name']);
	$added_position = mysql_prep($_POST['position']);
	$added_visibility = mysql_prep($_POST['visible']);

	$query = " insert into subjects 
				 (menu_name, position, visible) 
				values 
				('$added_subject', $added_position, $added_visibility)";
	if ($result = mysql_query($query, $connection)) {
		header("location: content.php");
		exit;
	} else {
		// display error
		echo "subject creation failed" . mysql_error();
	}
 ?>


<?php mysql_close($connection) ?>

