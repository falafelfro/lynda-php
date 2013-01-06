<?php 


function mysql_prep ($value) {  // this sanitizes special chars for sql queries.
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists("mysql_real_escape_string"); // php >= 4.3.0
	if ($new_enough_php) { // php v. 4.30 or higher under any magic quote effects
							// so mysql_real_escape_string can do the work
		if ($magic_quotes_active) { $value = stripslashes($value); }
			$value = mysql_real_escape_string($value);
	} else { // before PHP v 4.3.0
		// if magic uotes aren't already on then add slashes manually
		if (!magic_quotes_active) { $value = addslashes($value); }
		// if magic quotes are active, then the slashes already exist

	}
	return $value;
	}

function redirect_to ($location = null) {
	if ($location != null) { header("location: {$location}");
      		exit;
      	}
    }
 
function confirm_query ($result_set) {
	if (!$result_set) {
		die ("this query failed" . mysql_error());
		}
	}

function get_all_subjects () {
	global $connection;
	$subj_query = "select * 
						   from subjects 
						   order by position asc";
			$subject_set = mysql_query($subj_query, $connection);
			confirm_query ($subject_set); // function
	return $subject_set;
}




function get_pages_for_subject ($subject_id) {
	global $connection;
	$page_query="select * from pages
				where subject_id = $subject_id 
				order by position asc";
	$page_set = mysql_query($page_query
							, $connection);
 	confirm_query ($page_set);  // function
 	return $page_set;
}


function get_subject_by_id($subject_id) {
		global $connection;
		$query = "select * ";
		$query .= "from subjects ";
		$query .= "where id=" .$subject_id . " ";
		$query .= "limit 1";
		$result_set = mysql_query($query, $connection);
		confirm_query ($result_set);
		// REMEMBER:
		// if no rows are returned, fetch array will return false
		if ($subject = mysql_fetch_array($result_set)) {
			return $subject;
		} else {
			return NULL;
		}
	}

function get_page_by_id($page_id) {
		global $connection;
		$query = "select * ";
		$query .= "from pages ";
		$query .= "where id=" .$page_id . " ";
		$query .= "limit 1";
		$result_set = mysql_query($query, $connection);
		confirm_query ($result_set);
		// REMEMBER:
		// if no rows are returned, fetch array will return false
		if ($subject = mysql_fetch_array($result_set)) {
			return $subject;
		} else {
			return NULL;
		}
	}

function find_selected_page() {
		global $sel_subject;
		global $sel_page;
	if  (isset($_GET['subj'])) {
		$sel_subject = get_subject_by_id($_GET['subj']);
		$sel_page=0;
			} elseif (isset($_GET['page'])) {
				$sel_subj="";
				// $sel_page=$_GET['page'];
				$sel_subject = 0;
				$sel_page = get_page_by_id($_GET['page']);
				} else {
					// $sel_subj="";  
					// $sel_page="";  
					$sel_subject = 0;
					$sel_page = 0;
				}			
}


function navigation() {
		global $sel_page;
		global $sel_subject;
		$output = "<ul class=\"subjects\">";
			// get subjects query
			$subject_set = get_all_subjects ();  // assigning variable to function that 										returns value for $subject_set
												// use returned subjects data
			
			while ($subject = mysql_fetch_array($subject_set)) {
				$output .= "<li";
				if ($subject['id'] == $sel_subject['id']) { $output .= " class=\"selected\""; }
				$output .= "><a href=\"content.php?subj=" . 
				urlencode($subject['id']) . 
				     "\"> {$subject['menu_name']} </a></li>"; // subject echoed
						// get pages query
						$page_set = get_pages_for_subject ($subject['id']); 

						// use returned pages data
						$output .= "<ul class=\"pages\">";
						while ($page = mysql_fetch_array($page_set)) {
							$output .= "<li";
							if ($page['id'] == $sel_page['id']) {$output .= " class=\"selected\"";}
							$output .= "><a href=\"content.php?page=" . 
							urlencode($page['id']) . 
							"\"> {$page['menu_name']} </a></li>";  // pages echod
						}
						$output .= "</ul>";
			}
		 $output .= "</ul>";
		 return $output;
}

?>


