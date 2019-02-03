<?php
    include('../admin/confs/config.php');
    $result = mysqli_query($conn, "SELECT * FROM weekly_box_office_news ORDER BY id DESC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily News and Updates</title>

    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../libs/css/categories.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  
    <style>
    .media {
        margin-bottom: 20px;
    }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-white fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="index.php"><img src="../images/minilogo.png" class="nav-logo"> M-MDB | Weekly Box Office News</a>
           
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link active-link" href="../index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/reviews.php"><i class="fas fa-th-list"></i> Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/previews.php"><i class="fas fa-tags"></i> Previews</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-box-open"></i>  Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                          
                          <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="text-uppercase text-light">Our services</span>
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="../Daily_News_&_Updates/index.php">Daily News, Updates</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="Weekly_Box/">Weekly Box office News</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="../Monthly_Upcoming_Movies/index.php">Monthly Upcoming Movies</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="../MMDB_Weekend/Happy_Birthday.php">M-MDB Happy Birthday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="../MMDB_Weekend/Men_Crush_Monday.php">Men Crush Monday</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.col-md-4  -->
                                    <div class="col-md-4" style="padding-top: 10px">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="../MMDB_Weekend/Edu_Tuesday.php">Edu Tuesday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="../MMDB_Weekend/Women_Crush_Wednesday.php">Women Crush Wednesday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="../MMDB_Weekend/Fan_Made_Friday.php">Fan Made Friday</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="../MMDB_Weekend/Weekend_Choice.php">Weekend Choice</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Funny or Educating Videos</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.col-md-4  -->
                                    <div class="col-md-4">
                                        <a href="">
                                            <img src="images/minilogo.png" alt="" width="50%" class="img-fluid">
                                        </a>
                                        <p class="text-white">Short image call to action</p>
                                    </div>
                              <!-- /.col-md-4  -->
                                </div>
                          </div>
                          <!--  /.container  -->
                
                        </div>
                    </li>
                </ul>
            </div>

                    
                
        </div>
    </nav>

    <div class="container">
        <div class="content">
            <h2>M-MDB </h2>
            <p>Weekly Box Office News</p>
            <?php while( $row = mysqli_fetch_assoc($result) ) { ?>
            <div class="media" id="<?php echo $row['id'] ?>">
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $row['name'] ?></h4>
                    <p class="text-muted"><?php echo $row['remark'] ?> </p>
                </div>
                <div class="media-right">
                    <img src="<?php echo $row['image'] ?>" class="media-object" style="width:60px">
                </div>
            </div>
        <? } ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="libs/js/main.js">  </script>


</body>
</html>