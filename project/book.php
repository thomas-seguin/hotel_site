<html>
    <body>
        
        
                 <?php // sqltest.php
                   require_once 'login.php'; 
 $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);
     
       if (isset($_POST['fname']) && isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
 $fname = get_post($conn, 'fname');
 $day = get_post($conn, 'day'); 
$month = get_post($conn, 'month'); 
$year = get_post($conn, 'year'); 
 $query    = "INSERT INTO booking VALUES"."('$fname', '$day', '$month', '$year')"; 
   $result   = $conn->query($query);
   header("location: logged.php");
 if (!$result) 
     echo "INSERT failed: $query<br>" .      $conn->error . "<br><br>";  
}

echo <<<_END
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
    <title>Make A Booking</title>
  </head>
  <body> 
      
    <nav class="navbar bg-dark">
      <h1>
        <a href="index.html"><i class="fas fa-code"></i>Hotel's R Us</a>
      </h1>
      <ul>
        <li>
          <a href="index.html" title="Home">
            <i class="fas fa-sign-out-alt"></i>
            <span class="hide-sm">Home</span></a
          >
        </li>
      </ul>
    </nav>
    <section class="container">
      <h1 class="large text-primary">
        Make A Booking
      </h1>
      <small>* = required field</small>
      <form class="form" action="book.php" method="post">
        <div class="form-group">
          <input
            type="text"
            placeholder="* First Name"
            name="fname"
            required
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="* Enter Month"
            name="month"
            required
          />
        </div>
        <div class="form-group">
          <input type="text" placeholder="* Enter Day" name="day" />
        </div>
          <div class="form-group">
          <input type="text" placeholder="* Enter Year" name="year" />
        </div>
        
        
        <input type="submit" class="btn btn-primary my-1" />
        <a class="btn btn-light my-1" href="index.html">Go Back</a>
      </form>
    </section>
  </body>
</html>
_END;

$result->close(); 
 $conn->close();
  function get_post($conn, $var)  {    
     return $conn->real_escape_string($_POST[$var]);  } 

         
         ?>
        </body>
        </html>
        
