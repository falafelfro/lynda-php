<?php
require_once ('includes/connection.php');
require_once ('includes/functions.php');
?>
<?php find_selected_page(); // defines the $sel_subject and $sel_page variables  ?>

<?php include ('includes/header.php');  ?>
	<table id="structure">
		<tr>
			<td id="navigation">
			<?php echo navigation(); ?>
		 <br />
		 <a href="new_subject.php">+ Add a new subject</a>
			</td>
			<td id="page">
				

					<?php if(($sel_subject['id']) != null) {  //subject selected ?>
				       <h2> <?php echo $sel_subject['menu_name'];    ?> </h2>
						<?php } elseif ($sel_page['id'] != null) { // page selected ?>
							<h2><?php echo $sel_page['menu_name']; ?> </h2>
						<div class="page-content"> <?php  echo $sel_page['content']  ?> </div>
							<?php	} else echo "<h2> select a subject or 
												page to get started! </h2>";
					?>
				
				<br />

<?php if (($sel_page != null) || ($sel_subject != null)) {
	echo "<a href=\"content.php\">back to main</a><br />";
}

?>
				

			<?php 
			// echo $sel_page;
			// echo $sel_subject;  // echoeing the $_GET variables that are set.
			 ?>



			</td>
		</tr>
	</table>


<?php include ('includes/footer.php'); ?>
