<?php 

require_once("models/config.php");
securePage($_SERVER['PHP_SELF']);
require_once("models/header.php");


echo "
<body>
<div id='wrapper'>
<div id='top'></div></div>
<div id='content'>
<h1>My Form</h1>
<div id='left-nav'>";
include("left-nav.php");

echo "
</div>
<div id='main'>
<p>Main Page</p>
<p>Please Login!</p>

</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
