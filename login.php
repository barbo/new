<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: account.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$languas=array();
	$username = sanitize(trim($_POST["username"]));
	$password = trim($_POST["password"]);
	
	//Perform some validation
	//Feel free to edit / change as required
	if($username == "")
	{
		$errors[] = langu("ACCOUNT_SPECIFY_USERNAME");
	}
	if($password == "")
	{
		$errors[] = langu("ACCOUNT_SPECIFY_PASSWORD");
	}

	if(count($errors) == 0)
	{
		//A security note here, never tell the user which credential was incorrect
		if(!usernameExists($username))
		{
			$errors[] = langu("ACCOUNT_USER_OR_PASS_INVALID");
		}
		else
		{
			$userdetails = fetchUserDetails($username);
			//See if the user's account is activated
			if($userdetails["active"]==0)
			{
				$errors[] = langu("ACCOUNT_INACTIVE");
			}
			else
			{
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["password"]);
				
				if($entered_pass != $userdetails["password"])
				{
					//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
					$errors[] = langu("ACCOUNT_USER_OR_PASS_INVALID");
				}
				else
				{
					//Passwords match! we're good to go'
					
					//Construct a new logged in user object
					//Transfer some db data to the session object
					$loggedInUser = new loggedInUser();
					$loggedInUser->email = $userdetails["email"];
					$loggedInUser->user_id = $userdetails["id"];
					$loggedInUser->hash_pw = $userdetails["password"];
					$loggedInUser->title = $userdetails["title"];
					$loggedInUser->displayname = $userdetails["display_name"];
					$loggedInUser->username = $userdetails["user_name"];
					$loggedInUser->avatar = $userdetails["Avatar_URL"];
					
					//Update last sign in
					$loggedInUser->updateLastSignIn();
					$_SESSION["bkuser"] = $loggedInUser;
					
					//Redirect to user account page
					header("Location: account.php");
					die();
				}
			}
		}
	}
}

require_once("models/header.php");

echo "
<body>
<div id='wrapper'>
<div id='top'></div>
<div id='content'>
<h2>".$languas[] = langu('LOGIN_')."</h2>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<div id='regbox'>
<form name='login' action='".$_SERVER['PHP_SELF']."' method='post'>
<table width='300' border='0' cellpadding='1' cellspacing='1'>
  <tr>
    <td>".$languas[] = langu('USERNAME_:')."</td>
	  <td align='center'></td>
    <td><input type='text' name='username' /> *</td>
  </tr>
  <tr>
    <td>".$languas[] = langu('PASSWORD_:')."</td>
	  <td align='center'></td>
    <td><input type='password' name='password'/> *</td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
	  <td align='center'></td>
    <td><input type='submit' value='Login' /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
</form>
</div>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
