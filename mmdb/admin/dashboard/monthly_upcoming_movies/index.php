<?php
    include("../dbsystem/config.php");
    $result = mysqli_query($conn, "SELECT * FROM `Monthly_upcoming_movies` ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>movie database admin | posts panel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
     <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


    <style>
    textarea {
      padding: 20px;
    }
    .inputFile {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
  }
    .inputFile + label {
        color: white;
        background-color: #fff;
        color: #000;
        border: 1px solid #ddd;
        border-radius: 5px;
        display: inline-block;
        padding: 5px;
    }

    .inputFile:focus + label,
    .inputFile + label:hover {
        background-color: #f1f1f1;
        color: #000;
    }
    .inputFile + label {
      cursor: pointer; /* "hand" cursor */
    }
    #mceu_31 {
      display: none;
    }
    .date {
        font-family:'Slabo 27px', serif ;
    }
    </style>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Posts Panel</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="reviews/reviews.php">
          <i class="fas fa-cloud-upload-alt"></i>
            <span>Reviews</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../previews/previews.php">
          <i class="fas fa-cloud-upload-alt"></i>
            <span>Previews</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="slider.php">
          <i class="fas fa-user-friends"></i>
            <span>Slide images</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reviews/reviews-list.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>reviews posts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../previews/previews-list.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>previews posts</span></a>
        </li>
        <li class="nav-item logout-section">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>
      </ul>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Reviews</li>
          </ol>

        <div class="container content">
            <form action="monthly_upcoming_movies.php" method="post" enctype="multipart/form-data">

                <div class="form-group green-border-focus">
                    <label for="mname">Post Content:</label>
                    <input type="text" name="name" class="form-control" id="mname" placeholder="movie name" required>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <input type="file" class="form-control-file border inputFile" name="photo" id="file">
                      <label for="file"><i class="fas fa-images"></i>  Add Media</label>
                    </div>
                  </div>
                  <div class="col-6 text-right">
                    <div class="date">
                      <?php echo Date("d, M, Y"); ?>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                    <textarea rows="20" cols="40" name="message" class="form-control-file" placholder="Add Review" id="message"></textarea>
                </div>

   
                <input type="submit" name="submit" class="btn btn-success" value="Upload"> 

            </form><br>
        </div>
        
 <!-- Sticky Footer -->
 <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © movie database 2018</span>
            </div>
          </div>
        </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


  </body>

</html>
