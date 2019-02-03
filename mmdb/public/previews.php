<?php
    include("../admin/dashboard/dbsystem/config.php");
    $result = mysqli_query($conn, "SELECT * FROM previews ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Movie Database | Showtime">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Movie Database | Cinema Land</title>

    <link rel="stylesheet" href="css/public.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!--Myanmar Web font-->
    <link rel="stylesheet" href="https://mmwebfonts.comquas.com/fonts/?font=zawgyi" />
    <link rel="stylesheet" href="https://mmwebfonts.comquas.com/fonts/?font=unimon" />
    <link rel="shortcut icon" href="favicon.jpg">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans|Chakra+Petch" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Slabo+27px+Montserrat" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-white fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="../index.php"><img src="../images/minilogo.png" class="nav-logo"> M-MDB</a>
           
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active-link" href="../index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reviews.php"><i class="fas fa-th-list"></i> Reviews</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="previews.php"><i class="fas fa-tags"></i> Previews</a>
                    </li>
                    <li class="nav-item dropdown nav-item-drag">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Categories
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
        <div class="public-sub-posts">
        <div class="container">
            <div class="row">
        
        <?php while( $row = mysqli_fetch_assoc($result) ) { ?>
            <div class="col-md-3">
            <div class="card" style="width:100%" id="<?php echo $row["id"]; ?>">
                <img class="card-img-top" src="../<?php echo $row["img_dir"]; ?>" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row["name"]; ?></h4>
                    <p class="card-text"><?php echo $row["remark"]; ?></p>
        
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
</div>

    
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="libs/js/app.js"></script> 
    <script>
    $(function () {
  $(document).scroll(function () {
	  var $nav = $(".fixed-top");
	  $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});
});
</script>
</body>
</html>