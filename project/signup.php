<html>
    <body>
        
        <?php // sqltest.php
  require_once 'login.php'; 
 $conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) 
     die($conn->connect_error);
     
  
  if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])) {
 $fname = get_post($conn, 'fname');
 $lname = get_post($conn, 'lname'); 
$email = get_post($conn, 'email'); 
$password = get_post($conn, 'password'); 
 $query    = "INSERT INTO users VALUES"."('$fname', '$lname', '$email', '$password')"; 
   $result   = $conn->query($query);
   header("location: user_login.php");
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
    <title>Welcome To Hotel's R Us</title>
  </head>
  <body>
    <nav class="navbar bg-dark">
      <h1>
        <a href="index.html"><i class="fas fa-code"></i> Hotel's R Us</a>
      </h1>
    </nav>
    <section class="container">
      <h1 class="large text-primary">Sign Up</h1>
      <p class="lead"><i class="fas fa-user"></i> Create Your Account</p>
      <form class="form" action="signup.php" method="post">
        <div class="form-group">
          <input type="text" placeholder="First Name" name="fname" required />
        </div>
                <div class="form-group">
          <input type="text" placeholder="Last Name" name="lname" required />
        </div>
        <div class="form-group">
          <input type="email" placeholder="Email Address" name="email" />
        </div>
        <div class="form-group">
          <input
            type="password"
            placeholder="Password"
            name="password"
            minLength="6"
          />
        </div>
       
        <input type="submit" class="btn btn-primary" value="Register" />
      </form>
      <p class="my-1">
        Already have an account? <a href="user_login.php">Sign In</a>
      </p>
    </section>
  </body>
</html>
_END;



 $conn->close();
  function get_post($conn, $var)  {    
     return $conn->real_escape_string($_POST[$var]);  } 



?>

    </body>
</html>