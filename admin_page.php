<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);
$pageId = $_GET['id'];

//Check if selected pages exist
if(!pageIdExists($pageId)){
	header("Location: admin_pages.php"); die();	
}

$pageDetails = fetchPageDetails($pageId); //Fetch information specific to page

//Forms posted
if(!empty($_POST)){
	$update = 0;
	
	if(!empty($_POST['private'])){ $private = $_POST['private']; }
	
	//Toggle private page setting
	if (isset($private) AND $private == 'Yes'){
		if ($pageDetails['private'] == 0){
			if (updatePrivate($pageId, 1)){
				$successes[] = langu("PAGE_PRIVATE_TOGGLED", array("private"));
			}
			else {
				$errors[] = langu("SQL_ERROR");
			}
		}
	}
	elseif ($pageDetails['private'] == 1){
		if (updatePrivate($pageId, 0)){
			$successes[] = langu("PAGE_PRIVATE_TOGGLED", array("public"));
		}
		else {
			$errors[] = langu("SQL_ERROR");	
		}
	}
	
	//Remove permission level(s) access to page
	if(!empty($_POST['removePermission'])){
		$remove = $_POST['removePermission'];
		if ($deletion_count = removePage($pageId, $remove)){
			$successes[] = langu("PAGE_ACCESS_REMOVED", array($deletion_count));
		}
		else {
			$errors[] = langu("SQL_ERROR");	
		}
		
	}
	
	//Add permission level(s) access to page
	if(!empty($_POST['addPermission'])){
		$add = $_POST['addPermission'];
		if ($addition_count = addPage($pageId, $add)){
			$successes[] = langu("PAGE_ACCESS_ADDED", array($addition_count));
		}
		else {
			$errors[] = langu("SQL_ERROR");	
		}
	}
	
	$pageDetails = fetchPageDetails($pageId);
}

$pagePermissions = fetchPagePermissions($pageId);
$permissionData = fetchAllPermissions();

require_once("models/header.php");

echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>My Form</h1>
<h2>".$languas[] = langu('admin_page')."</h2>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<form name='adminPage' action='".$_SERVER['PHP_SELF']."?id=".$pageId."' method='post'>
<input type='hidden' name='process' value='1'>
<table class='admin'>
<tr><td>
<h3>".$languas[] = langu('page_infirmation')."</h3>
<div id='regbox'>
<p>
<label>".$languas[] = langu('ID_:')."</label>
".$pageDetails['id']."
</p>
<p>
<label>".$languas[] = langu('NAME_:')."</label>
".$pageDetails['page']."
</p>
<p>
<label>".$languas[] = langu('PRIVATE_:')."</label>";

//Display private checkbox
if ($pageDetails['private'] == 1){
	echo "<input type='checkbox' name='private' id='private' value='Yes' checked>";
}
else {
	echo "<input type='checkbox' name='private' id='private' value='Yes'>";	
}

echo "
</p>
</div></td><td>
<h3>".$languas[] = langu('page_access')."</h3>
<div id='regbox'>
<p>
".$languas[] = langu('remove_access')."";

//Display list of permission levels with access
foreach ($permissionData as $v1) {
	if(isset($pagePermissions[$v1['id']])){
		echo "<br><input type='checkbox' name='removePermission[".$v1['id']."]' id='removePermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['name'];
	}
}

echo"
</p><p>".$languas[] = langu('add_access')."";

//Display list of permission levels without access
foreach ($permissionData as $v1) {
	if(!isset($pagePermissions[$v1['id']])){
		echo "<br><input type='checkbox' name='addPermission[".$v1['id']."]' id='addPermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['name'];
	}
}

echo"
</p>
</div>
</td>
</tr>
</table>
<p>
<label>&nbsp;</label>
<input type='submit' value='Update' class='submit' />
</p>
</form>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
