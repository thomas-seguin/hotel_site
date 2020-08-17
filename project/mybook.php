<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/style.css" />
    <title>My Bookings</title>
  </head>
  <body>
    <nav class="navbar bg-dark">
      <h1>
        <a href="index.html"><i class="fas fa-code"></i>Hotel's R US</a>
      </h1>
    </nav>
    <section class="container">
      <h1 class="large text-primary">
        My Bookings
      </h1>

    </section>
  </body>
</html>






<?php // sqltest.php
 session_start();
  if (isset($_SESSION['username'])) // check whether logged-in/not
  {    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['fname'];
    $surname  = $_SESSION['lname'];

    
    
     }


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
     
    
 $query  = "SELECT * FROM booking where fname = '$forename' ";
 $result = $conn->query($query);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)  {  
      $result->data_seek($j);    
$row = $result->fetch_array(MYSQLI_NUM);

echo <<<_END
      <div class="posts">
           

            
      
<pre>
Day $row[1] 
Month $row[2]  
Year $row[3]    
</pre>  
<form action="mybook.php" method="post">  <input type="hidden" name="delete" value="yes">  
<input type="hidden" name="fname" value="$row[0]"> 
 <input type="submit" value="DELETE RECORD">
</form>
</div>

_END;

}
 $result->close();  
 $conn->close();
  function get_post($conn, $var)  {    
     return $conn->real_escape_string($_POST[$var]);  } 
     
?>