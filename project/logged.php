<?php
 session_start();
  if (isset($_SESSION['username'])) // check whether logged-in/not
  {    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['fname'];
    $surname  = $_SESSION['lname'];
    
     }
  else // not logged-in
 echo "Please <a href='user_login.php'>click here</a> to log in.";
 function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 1, '/');
    session_destroy();
  }
?>

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
        <a href="index.html"><i class="fas fa-code"></i>Hotel Booking</a>
      </h1>
      <ul>
        <li><a href="mybook.php">See Bookings</a></li>
        <li><a href="book.php">Make A Booking</a></li>
      </ul>
    </nav>
    <section class="landing">
      <div class="dark-overlay">
        <div class="landing-inner">
          <h1 class="x-large">Hotel's R Us</h1>
          <p class="lead">
            Book a hotel room today in a simple and quick process.
          </p>
          <div class="buttons">
            <a href="user_login.php" class="btn btn-primary">Book Now</a>
            <a href="login.html" class="btn btn-light">Login To See Bookings</a>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>