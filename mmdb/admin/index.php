<?php

session_start();
$auth = isset($_SESSION['auth']);

?>

<!DOCTYPE html>
<?php error_reporting(0); ?>
<html lang="en">
  <head>
    <title>Secure contact form</title>
    <meta charset="utf-8">
    <style>
        body {
            background-image: url('mmdb.jpg');
            background-size: cover;
        }
      p {
        margin: 0;
        color: red;
      }
      nav {
          background-color: rgba(0, 0, 0, 0.8);
      }
      nav a.nav-link {
          color: #fff !important;
      }
      .size0 {
          margin-top: 80px;
          background-color: #fff;
          padding: 50px;
          border-radius: 10px;
      }
    </style>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>
  <body>

  <?php 
    if($auth) {
        header("location: dashboard/index.php");
    } else {
  ?>

    
    <?php
      if(isset($_POST['submit'])){
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $password = htmlspecialchars(stripslashes(trim($_POST['password'])));
   
        
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'Invalid email';
        }
  
      }
      if($email == "admin@gmail.com" && $password == "2468") {
        $_SESSION["auth"] = true;
    
        header("location: dashboard/index.php");
    }
    
    ?>
    <nav class="navbar navbar-expand-sm navbar-light fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="index.php"><i class="fas fa-film"></i>  M-MDB</a>
           
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container size0">
        <h4 class="text-info">Login</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-info">
        </form>
</div>

    <?php } ?>
  </body>
</html>