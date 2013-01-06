<?php
require_once ('includes/connection.php');
require_once ('includes/functions.php');
?>
<?php find_selected_page(); // defines the $sel_subject and $sel_page variables ?>

<?php include ('includes/header.php');  ?>
	<table id="structure">
		<tr>
			<td id="navigation">
			<?php echo navigation(); // function for all the navigation code ?> 
			</td>
			<td id="page">
				
<h2>Add Subject</h2>

<form action="create_subject.php"  method="post">
	<p>Subject name:
      <input type="text" name="menu_name" value="" id="menu_name" /></p>
    <p>Position:
    	<select name="position">
         <?php 
         $subject_set = get_all_subjects();
         for ($count=1; $count <= mysql_num_rows($subject_set)+1; $count++) {      
         	echo "<option value=\"$count\">$count</option>";
         }

          ?>
    	   </p>
    	</select>
    </p>
    <p>Visible:
    	<input type="radio" name="visible" value="0" /> NO
   		&nbsp; 
   	    <input type="radio" name="visible" value="1" /> Yes
   	</p>
   	<input type="submit" value="Add Subject" />
   </form>
<br />

<a href="content.php">Cancel</a>

			</td>
		</tr>
	</table>


<?php include ('includes/footer.php'); ?>
