<?php // authenticate2.php
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);

  if ($connection->connect_error) die($connection->connect_error);

  $rec_un = $_REQUEST['email'];
  $rec_pw = $_REQUEST['password'];
if (isset($_REQUEST['email']) &&
      isset($_REQUEST['password']))
{  
    $un_temp = mysql_entities_fix_string($connection, $rec_un);
    $pw_temp = mysql_entities_fix_string($connection, $rec_pw);
    $query = "SELECT * FROM users WHERE email ='$un_temp'";
     $result = $connection->query($query);
     if (!$result) die($ection->error);
elseif ($result->num_rows)
	{
	    
	    
		$row = $result->fetch_array(MYSQLI_NUM); 
		$result->close();
		$salt1 = "qm&h*";
		$salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
		if ($pw_temp == $row[3]) 
		{
		    
		    
			session_start();
			$_SESSION['username'] = $un_temp;
			$_SESSION['password'] = $pw_temp;
			$_SESSION['fname'] = $row[0];
			
			$_SESSION['lname']  = $row[1];
			
            header('Location:logged.php');
		}
		else die("Invalid username/password combination");
	}
else die("Invalid username/password combination");
  
}
  else
  {
header('Location:form.php');    
  
  $connection->close();

}
 function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
?> /// Closing authenticate2.php