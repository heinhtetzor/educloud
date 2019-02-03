<?php
    include("dbsystem/config.php");
    $result = mysqli_query($conn, "SELECT * FROM slider ORDER BY id DESC");
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

    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
    .blog-img {
          width: 50px;
          height: 50px;
          border-radius: 100%;
      }
      .size1 {
        border: 2px solid #ddd;
      }
      #myCarousel {
          width: 50%;
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
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="posts-uploader.php">
          <i class="fas fa-cloud-upload-alt"></i>
            <span>uploader</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="slider.php">
          <i class="fas fa-user-friends"></i>
            <span>Slide images</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="posts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Posts manager</span></a>
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
          </ol>
        
          <h2>Photo Home Page Slider</h2>

          <div id="myCarousel" class="carousel slide">
    
            <ul class="carousel-indicators">
                <li class="item1 active"></li>
                <li class="item2"></li>
                <li class="item3"></li>
            </ul>
            <div class="carousel-inner img-slide">
                <div class="carousel-item active">
                <img src="slide_photo/yeesar.jpg" width="100%">  
                    <div class="slide-caption">
                        <div class="container">
                            <div class="row slide-row">
                                <div class="col-8 slide-text">
                                    <h3 class="text-info">ရည္းစား တစ္ဝမ္းကြဲ</h3>
                                    <p class="text-white">သူငယ္ခ်င္းလည္းမက ရည္းစားလဲမက် တဲ့ ရည္းစားတစ္ဝမ္းကြဲ</p>  
                                </div>
                                <div class="col-4 text-center mv-trailer-btn">
                                    <button type="button" class="btn btn-outline-info">Watch Trailer</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="carousel-item">
                    <img src="slide_photo/mortal-engine.jpg" width="100%">
                    <div class="slide-caption">
                        <div class="container">
                            <div class="row slide-row">
                                <div class="col-8 slide-text">
                                    <h3 class="text-info">Los Angeles</h3>
                                    <p class="text-white">We had such a great time in LA!</p>
                                </div>
                                <div class="col-4 text-center mv-trailer-btn">
                                    <button type="button" class="btn btn-outline-info">Watch Trailer</button>
                                </div>
                            </div>
                        </div>       
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="slide_photo/index.jpg" width="100%">
                    <div class="slide-caption">
                        <div class="container">
                            <div class="row slide-row">
                                <div class="col-8 slide-text">
                                    <h3 class="text-info">Los Angeles</h3>
                                    <p class="text-white">We had such a great time in LA!</p>
                                </div>
                                <div class="col-4 text-center mv-trailer-btn">
                                    <button type="button" class="btn btn-outline-info">Watch Trailer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#myCarousel">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div> 
                </div>
            </div>
                       
 <!-- Sticky Footer -->
 <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © MMDB <?php echo Date("Y"); ?></span>
            </div>
          </div>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#count").html( $(".blog-post").length);
            $("btn .dropdown-toggle").on("click", function(){
              $(".dropdown").slideToggle();
            });
        });
        $("#myCarousel").carousel({interval: 2500});

            // Enable Carousel Indicators
            $(".item1").click(function(){
                $("#myCarousel").carousel(0);
            });
            $(".item2").click(function(){
                $("#myCarousel").carousel(1);
            });
            $(".item3").click(function(){
                $("#myCarousel").carousel(2);
            });
            // Enable Carousel Controls
            $(".carousel-control-prev").click(function(){
                $("#myCarousel").carousel("prev");
            });
            $(".carousel-control-next").click(function(){
                $("#myCarousel").carousel("next");
            });

            $(".dropdown-toggle").dropdown();

            $(".comment-area").on("click", function(){
                $(".submit_btn").slideToggle();
            });
        });
        </script>


  </body>

</html>
