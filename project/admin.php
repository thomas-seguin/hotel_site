
<?php // sqltest.php
  require_once 'login.php'; 
 $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);
     
      if (isset($_POST['delete']) && isset($_POST['fname']))  {   
 $isbn   = get_post($conn, 'fname');  
  $query  = "DELETE FROM booking WHERE fname='$isbn'";
   $result = $conn->query($query);  
  if (!$result) 
echo "DELETE failed: $query<br>" .      $conn->error . "<br><br>";
  }

     
    
 $query  = "SELECT * FROM booking ";
 $result = $conn->query($query);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)  {  
      $result->data_seek($j);    
$row = $result->fetch_array(MYSQLI_NUM);

echo <<<_END
<pre>
Name $row[0]
Day $row[1] 
Month $row[2]  
Year $row[3]    
</pre>  
<form action="admin.php" method="post">  <input type="hidden" name="delete" value="yes">  
<input type="hidden" name="fname" value="$row[0]"> 
 <input type="submit" value="DELETE BOOKING">
</form>

_END;

}
 $result->close();  
 $conn->close();
  function get_post($conn, $var)  {    
     return $conn->real_escape_string($_POST[$var]);  } 
     
?>