<?php
echo <<<_END
<html> <head> <link href="form.css" type="text/css" rel="stylesheet" /> </head> <body>
<form action="authenticate3.php" method="post">
  <label for="empID">Employee ID</label>
  <input type="text" name="empID" id="empID" />  <br />
  <label for="password">Password</label>
  <input type="password" name="password" id="password" />  <br />
  <input type="submit" name="submit" value="Submit" />
</form><body>
_END;
?>
