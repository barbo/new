<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);


if(!empty($_POST))
{
	$deletions = $_POST['delete'];
	if ($deletion_count = deleteUsers($deletions)){
		$successes[] = langu("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
	}
	else {
		$errors[] = langu("SQL_ERROR");
	}
}

$userData = fetchAllUsers(); 

require_once("models/header.php");
echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>My Form</h1>
<h2>".$languas[] = langu('Admin_Users')."</h2>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<form name='adminUsers' action='".$_SERVER['PHP_SELF']."' method='post'>
<table class='admin'>
<tr>
<th>".$languas[] = langu('DELETE_')."</th><th>".$languas[] = langu('USERNAME_')."</th><th>".$languas[] = langu('Displayname_')."</th><th>Title</th><th>".$languas[] = langu('Last_sign_in_')."</th>
</tr>";


foreach ($userData as $v1) {
	
	echo "
	<tr>
	<td><input type='checkbox' name='delete[".$v1['id']."]' id='delete[".$v1['id']."]' value='".$v1['id']."'></td>
	<td><a href='admin_user.php?id=".$v1['id']."'>".$v1['user_name']."</a></td>
	<td>".$v1['display_name']."</td>
	<td>".$v1['title']."</td>
	<td>
	";
	

	if ($v1['last_sign_in_stamp'] == '0'){
		echo "Never";	
	}
	else {
		echo date("j M, Y", $v1['last_sign_in_stamp']);
	}
	echo "
	</td>
	</tr>";
}

echo "
</table>
<input type='submit' name='Submit' value='Delete' />
</form>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
