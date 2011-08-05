<?php

$state = $_POST['state'];
$zip   = $_POST['zip'];


mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
mysql_select_db("thinkbingfbapp");

$query = "SELECT senat FROM senators WHERE state='".$state."' OR zip='".$zip."'";


$result = mysql_query($query) or die ('Error Updating DB'.mysql_error());

echo (' <html> 
<body>
<form method="post" action="mailsend.php">
<table cellpadding="1" border="0">
<tr>
<td>
Your Senator is '.mysql_result($result, 0).'</td></tr>
<tr><td>
<textarea name="message" rows="30" cols="50">
</textarea></tr></td>
<tr><td>
<form> <input type="submit" value="Send Mail" /> </form> 
</body></tr></td>
</table>
</form>
</html>');

?>