<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);

 
if(isset($_GET["token"]))
{	
	$token = $_GET["token"];	
	if(!isset($token))
	{
		$errors[] = langu("FORGOTPASS_INVALID_TOKEN");
	}
	else if(!validateActivationToken($token))
	{
		$errors[] = langu("ACCOUNT_TOKEN_NOT_FOUND");
	}
	else
	{
	 
		if(!setUserActive($token))
		{
			$errors[] = langu("SQL_ERROR");
		}
	}
}
else
{
	$errors[] = langu("FORGOTPASS_INVALID_TOKEN");
}

if(count($errors) == 0) {
	$successes[] = langu("ACCOUNT_ACTIVATION_COMPLETE");
}

require_once("models/header.php");

echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>My Form</h1>
<h2>".$languas[] = langu('activateaccount')."</h2>

<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
