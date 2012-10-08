<?php

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);
require_once("models/header.php");

echo "
<body>
<div id='wrapper'>
<div id='top'></div>
<div id='content'>
<h2>".$languas[] = langu("account")."</h2>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>
 
".$languas[] = langu("hi").", $loggedInUser->displayname. ".$languas[] = langu("you")." $loggedInUser->title, ".$languas[] = langu("not")."" . date("M d, Y", $loggedInUser->signupTimeStamp()) . ".
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>

