<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);
$userId = $_GET['id'];


if(!userIdExists($userId)){
	header("Location: admin_users.php"); die();
}

$userdetails = fetchUserDetails(NULL, NULL, $userId); 

if(!empty($_POST))
{	

	if(!empty($_POST['delete'])){
		$deletions = $_POST['delete'];
		if ($deletion_count = deleteUsers($deletions)) {
			$successes[] = langu("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
		}
		else {
			$errors[] = langu("SQL_ERROR");
		}
	}
	else
	{
	
		if ($userdetails['display_name'] != $_POST['display']){
			$displayname = trim($_POST['display']);
			
	
			if(displayNameExists($displayname))
			{
				$errors[] = langu("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			}
			elseif(minMaxRange(5,25,$displayname))
			{
				$errors[] = langu("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
			}
			elseif(!ctype_alnum($displayname)){
				$errors[] = langu("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
			}
			else {
				if (updateDisplayName($userId, $displayname)){
					$successes[] = langu("ACCOUNT_DISPLAYNAME_UPDATED", array($displayname));
				}
				else {
					$errors[] = langu("SQL_ERROR");
				}
			}
			
		}
		else {
			$displayname = $userdetails['display_name'];
		}
		
		if(isset($_POST['activate']) && $_POST['activate'] == "activate"){
			if (setUserActive($userdetails['activation_token'])){
				$successes[] = langu("ACCOUNT_MANUALLY_ACTIVATED", array($displayname));
			}
			else {
				$errors[] = langu("SQL_ERROR");
			}
		}
		

		if ($userdetails['email'] != $_POST['email']){
			$email = trim($_POST["email"]);
			
	
			if(!isValidEmail($email))
			{
				$errors[] = langu("ACCOUNT_INVALID_EMAIL");
			}
			elseif(emailExists($email))
			{
				$errors[] = langu("ACCOUNT_EMAIL_IN_USE",array($email));
			}
			else {
				if (updateEmail($userId, $email)){
					$successes[] = langu("ACCOUNT_EMAIL_UPDATED");
				}
				else {
					$errors[] = langu("SQL_ERROR");
				}
			}
		}
		
		
		if ($userdetails['title'] != $_POST['title']){
			$title = trim($_POST['title']);
			
			
			if(minMaxRange(1,50,$title))
			{
				$errors[] = langu("ACCOUNT_TITLE_CHAR_LIMIT",array(1,50));
			}
			else {
				if (updateTitle($userId, $title)){
					$successes[] = langu("ACCOUNT_TITLE_UPDATED", array ($displayname, $title));
				}
				else {
					$errors[] = langu("SQL_ERROR");
				}
			}
		}
		

		if(!empty($_POST['removePermission'])){
			$remove = $_POST['removePermission'];
			if ($deletion_count = removePermission($remove, $userId)){
				$successes[] = langu("ACCOUNT_PERMISSION_REMOVED", array ($deletion_count));
			}
			else {
				$errors[] = langu("SQL_ERROR");
			}
		}
		
		if(!empty($_POST['addPermission'])){
			$add = $_POST['addPermission'];
			if ($addition_count = addPermission($add, $userId)){
				$successes[] = langu("ACCOUNT_PERMISSION_ADDED", array ($addition_count));
			}
			else {
				$errors[] = langu("SQL_ERROR");
			}
		}
		
		$userdetails = fetchUserDetails(NULL, NULL, $userId);
	}
}

$userPermission = fetchUserPermissions($userId);
$permissionData = fetchAllPermissions();

require_once("models/header.php");

echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>My Form</h1>
<h2>".$languas[] = langu('Admin_User')."</h2>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<form name='adminUser' action='".$_SERVER['PHP_SELF']."?id=".$userId."' method='post'>
<table class='admin'><tr><td>
<h3>".$languas[] = langu('User_information')."</h3>
<div id='regbox'>
<p>
<label>".$languas[] = langu('ID_:')."</label>
".$userdetails['id']."
</p>
<p>
<label>".$languas[] = langu('USERNAME_:')."</label>
".$userdetails['user_name']."
</p>
<p>
<label>".$languas[] = langu('Displayname_:')."</label>
<input type='text' name='display' value='".$userdetails['display_name']."' />
</p>
<p>
<label>".$languas[] = langu('email')."</label>
<input type='text' name='email' value='".$userdetails['email']."' />
</p>
<p>
<label>".$languas[] = langu('ACTIVE_:')."</label>";


if ($userdetails['active'] == '1'){
	echo "Yes";	
}
else{
	echo "No
	</p>
	<p>
	<label>".$languas[] = langu('ACTIVATE_:')."</label>
	<input type='checkbox' name='activate' id='activate' value='activate'>
	";
}

echo "
</p>
<p>
<label>".$languas[] = langu('TITLE_:')."</label>
<input type='text' name='title' value='".$userdetails['title']."' />
</p>
<p>
<label>".$languas[] = langu('sign_up_:')."</label>
".date("j M, Y", $userdetails['sign_up_stamp'])."
</p>
<p>
<label>".$languas[] = langu('Last_sign_in_:')."</label>";


if ($userdetails['last_sign_in_stamp'] == '0'){
	echo "Never";	
}
else {
	echo date("j M, Y", $userdetails['last_sign_in_stamp']);
}

echo "
</p>
<p>
<label>".$languas[] = langu('DELETE_:')."</label>
<input type='checkbox' name='delete[".$userdetails['id']."]' id='delete[".$userdetails['id']."]' value='".$userdetails['id']."'>
</p>
<p>
<label>&nbsp;</label>
<input type='submit' value='Update' class='submit' />
</p>
</div>
</td>
<td>
<h3>".$languas[] = langu('Permission_Membership')."</h3>
<div id='regbox'>
<p>".$languas[] = langu('Remove_perm')."";


foreach ($permissionData as $v1) {
	if(isset($userPermission[$v1['id']])){
		echo "<br><input type='checkbox' name='removePermission[".$v1['id']."]' id='removePermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['name'];
	}
}


echo "</p><p>".$languas[] = langu('add_perm')."";
foreach ($permissionData as $v1) {
	if(!isset($userPermission[$v1['id']])){
		echo "<br><input type='checkbox' name='addPermission[".$v1['id']."]' id='addPermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['name'];
	}
}

echo"
</p>
</div>
</td>
</tr>
</table>
</form>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
