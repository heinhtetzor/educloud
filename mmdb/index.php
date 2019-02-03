<?php
    include("admin/dashboard/dbsystem/config.php");

    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page= 1; };
    $start_from = ($page-1) * $results_per_page;

    $reviews = "SELECT * FROM reviews ORDER BY ID DESC LIMIT $start_from, $results_per_page";
    $previews = "SELECT * FROM previews ORDER BY ID DESC";
    $dailynews = "SELECT * FROM `Daily_news_&_Updates` ORDER BY ID DESC";


    $result = mysqli_query($conn, $reviews);
    $lastres = mysqli_query($conn, $previews);
    $dailyres = mysqli_query($conn, $dailynews);
    // $rs_result = mysqli_query($conn, $result);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Movie Database | Showtime">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Movie Database | Cinema Land</title>

    <link rel="stylesheet" href="libs/css/blog.min.css">
    <link rel="stylesheet" type="text/css" href="libs/css/main.css"/>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <!--Myanmar Web font-->
    <link rel="stylesheet" href="https://mmwebfonts.comquas.com/fonts/?font=zawgyi" />
    <link rel="stylesheet" href="https://mmwebfonts.comquas.com/fonts/?font=unimon" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="shortcut icon" href="images/minilogo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    body{
        font-family: 'Zawgyi-One','Courier New', Courier, monospace,'Uni Mon';
    }

  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  #demo {
      height: 370px;
      padding: 20px;
  }
.carousel-inner {
        border-radius: 10px;
      box-shadow: 5px 5px 5px #555;
}
    </style>
</head>
<body id="app">

    <?php include("libs/navbar.html"); ?>

    <div class="w3-content w3-display-container" style="min-width: 100%">
        <img class="mySlides" src="images/late-pyar-san-eain.jpg" style="width:100%">
        <img class="mySlides" src="images/the-possession-of-hannah-grace.jpg" style="width:100%">
        <img class="mySlides" src="images/adi-padi.jpg" style="width:100%">
        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
            <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
            <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
    </div>


    <!-- REVIEWS POSTS & PREVIEW POSTS -->

    <div class="content-wrapper">
        <div class="container public-container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-muted">Daily New & Updates</h3>

                    <div class="scrolling-wrapper-flexbox">
                        <?php while($dailyrow = mysqli_fetch_assoc($dailyres)) {?>
                        <div class="card" style="width: 80%;">
                          <img src="<?php echo $dailyrow['image']; ?>" class="card-img-top" width="100%">
                            <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text"><?php echo $dailyrow["remark"] ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="blog-field">
                        <section class="blog-section">

                        <?php while( $row = mysqli_fetch_assoc($result) ) { ?>
                            <div class="blog-post" id="<?php echo $row["id"]; ?>">
                                <div class="blog-post-init">
                                    <img src="favicon.jpg" class="logo-img">
                                    <div class="blog-author">
                                        <h5><?php echo $row["name"] ?>  <span class="text"><i>(review)</i>  <i class="fas fa-globe"></i></span></h5>
                                        <span>written By <a href="index.php">mmdb</a></span>
                                    </div>
                                </div>
                                <div class="blog-post-image">
                                    <?php
                                        $cut_dir = "admin/dashboard/photo/";
                                        if( $row["img_dir"] == $cut_dir ) {
                                            echo "<img src='#' style='display: none;'>";
                                        } else {
                                    ?>
                                    <img src="<?php echo $row['img_dir']; ?>" class="text-center" width="100%">
                                        <?php } ?>
                                </div>
                                <div class="blog-post-header">
                                    <div class="row">
                                        <div class="col-8">
                                            <a class="blog-post-title text-danger" href="<?php echo str_replace(" ", "-", "posts/" . $row["name"]. ".html")?>"> <?php echo $row["name"]; ?> </a>
                                        </div>
                                        <div class="col-4 text-right">
                                            <?php
                                                echo "<span class='blog-post-date'>" .$row["created_date"] ."</span>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <?php

                                        $string = "<p class='blog-post-content'>" .$row["remark"] . "</p>";
                                        $string = strip_tags($string);
                                        $link = str_replace(" ", "-", "posts/" . $row["name"]. ".html");
                                      if (strlen($string) > 500) {

                                          // truncate string
                                          $stringCut = substr($string, 0, 500);
                                          $endPoint = strrpos($stringCut, ' ');

                                          //if the string doesn't contain any space then it will cut without word basis.
                                          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                          $string .= ".... <br><br><a href=' ". $link ."' class='btn btn-success'> Read More </a>";
                                      }
                                      echo $string;
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </section>

                    <!-- Previews post !!! -->
                    <section class="blog-section">

                        <?php while( $last_row = mysqli_fetch_assoc($lastres) ) { ?>
                            <div class="blog-post" id="<?php echo $last_row["id"]; ?>">
                                <div class="blog-post-init">
                                    <img src="favicon.jpg" class="logo-img">
                                    <div class="blog-author">
                                        <h5><?php echo $last_row["name"] ?>  <span class="text"><i>(preview)</i>  <i class="fas fa-globe"></i></span></h5>
                                        <span>written By <a href="index.php">mmdb</a></span>
                                    </div>
                                </div>
                                <div class="blog-post-image">
                                    <?php
                                        $cut_dir = "admin/dashboard/photo/";
                                        if( $last_row["img_dir"] == $cut_dir ) {
                                            echo "<img src='#' style='display: none;'>";
                                        } else {
                                    ?>
                                    <img src="<?php echo $last_row['img_dir']; ?>" class="text-center" width="100%">
                                        <?php } ?>
                                </div>
                                <div class="blog-post-header">
                                    <div class="row">
                                        <div class="col-8">
                                            <a class="blog-post-title text-danger" href="<?php echo str_replace(" ", "-", "posts/" . $last_row["name"]. ".html")?>"> <?php echo $last_row["name"]; ?> </a>
                                        </div>
                                        <div class="col-4 text-right">
                                            <?php
                                                echo "<span class='blog-post-date'>" .$last_row["created_date"] ."</span>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-post-content">
                                    <?php

                                        $string = "<p class='blog-post-content'>" .$last_row["remark"] . "</p>";
                                        $string = strip_tags($string);
                                        $link = str_replace(" ", "-", "posts/" . $last_row["name"]. ".html");
                                      if (strlen($string) > 500) {

                                          // truncate string
                                          $stringCut = substr($string, 0, 500);
                                          $endPoint = strrpos($stringCut, ' ');

                                          //if the string doesn't contain any space then it will cut without word basis.
                                          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                          $string .= ".... <br><br><a href=' ". $link ."' class='btn btn-success'> Read More </a>";
                                      }
                                      echo $string;
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </section>

                    <?php

                           $sql = "SELECT COUNT(ID) AS total FROM reviews";
                           $result = $conn->query($sql);
                           $row = $result->fetch_assoc();
                           $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results


                           echo "<div class='container page-link-nav text-center'>";
                           for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages

                               echo "<a class='curPage' href='index.php?page=".$i."'";
                               if ($i==$page);
                               echo ">".$i."</a>";
                           };
                          echo "</div>";
                       ?>

                </div>

                </div>

                    <div class="col-md-4">
                    <div class="search-field">
                        <form action="search.php" method="get">
                            <div class="input-group mb-3">
                                <input type="search" class="form-control" name="query" placeholder="Search ..." id="search" required>
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <article class="movie-track">
                        <!---First row-->
                            <section class="theater">
                                <div class="row">
                                    <div class="col col-6 col-sm-6">
                                        <div class="movie">
                                        <img src="images/ye-sae.jpg" width="100%" class="image">
                                            <div class="middle">
                                                <a class="btn btn-info text" href="#">show more</a>
                                                <a class="btn btn-danger text">Review</a>
                                            </div>
                                            <div class="movieLabel">
                                            ရည္းစား တစ္ဝမ္းကြဲ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-6 col-sm-6">
                                        <div class="movie">
                                        <img src="images/viswasam.jpg" alt="Avatar" width="100%" class="image">
                                            <div class="middle">
                                                <a class="btn btn-info text">show more</a>
                                                <a class="btn btn-danger text">Review</a>
                                            </div>
                                            <div class="movieLabel">

                                            </div>
                                        </div>
                                    </div>
                            </section>

                            <section class="cinema">
                                <div class="row">
                                    <div class="col col-6 col-sm-6">
                                        <div class="movie">
                                            <img src="images/butterfly.jpg"  width="100%" class="image">
                                            <div class="middle">
                                                <a class="btn btn-info text">show more</a>
                                                <a class="btn btn-danger text">Review</a>
                                            </div>
                                            <div class="movieLabel">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-6 col-sm-6">
                                        <div class="movie">
                                            <img src="images/mortal-engine0.jpg" alt="Avatar" width="100%" class="image">
                                            <div class="middle">
                                                <a class="btn btn-info text">show more</a>
                                                <a class="btn btn-danger text">Review</a>
                                            </div>
                                            <div class="movieLabel">
                                                Coco
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </article>

                        <section class="popular">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#reviews">recent reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#previews">recent previews</a>
                                </li>
                            </ul>
                            <?php
                                $lists = mysqli_query($conn, "SELECT * FROM reviews ORDER BY ID DESC");
                            ?>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="reviews" class="container tab-pane active">
                                    <ul>
            <?php while( $row = mysqli_fetch_assoc($lists) ) { ?>
            <?php   $title = str_replace(" ", "-", $row['name'].'.html');?>
                <li><a href="posts/<?php echo $title; ?>"><?php echo $row["name"] ?></a></li>
            <?php } ?>
                        </ul>
                                </div>

                            <!-- preview posts list -->
                            <?php
                                $prelists = mysqli_query($conn, "SELECT * FROM previews ORDER BY ID DESC");
                            ?>

                            <div id="previews" class="container tab-pane">
                                    <ul>
            <?php while( $prerow = mysqli_fetch_assoc($prelists) ) { ?>
            <?php   $title = str_replace(" ", "-", $prerow['name'].'.html');?>
                <li><a href="posts/<?php echo $title; ?>"><?php echo $prerow["name"] ?></a></li>
            <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </section>

                        <!--Infomation-->
                        <div class="infomation">
                            <div class="author">
                                <img src="images/minilogo.png"> <h5>M-MDB</h5>
                            </div>
                            <div class="meta">
                                <section class="about">
                                    <div class="cont">About</div>
                                    <div class="ans">႐ုပ္ရွင္ဗဟုသုတ ဟင္းေလးအိုးႀကီး (သို႔) M-MDB</div>
                                </section>
                                <section class="impressum">
                                    <div class="cont">Impressum</div>
                                    <div class="ans">နိုင္ငံတကာမွ ရုပ္ရွင္ ျပန္လည္သုံးသပ္ခ်က္မ်ား
                                    ရုပ္ရွင္မ်ား၏ ဇာတ္လမ္း အက်ဥ္းခ်ဳပ္မ်ား...
                                    <a href="about/index.html">See More</a></div>
                                </section>
                                <section class="location">
                                    <div class="cont">Location</div>
                                    <div class="ans">No. (294/3),
                                    7th Floor (A), Shwe Gon Tine Road & Quarter, Bahan Tsp.,
                                    Yangon.Yangon</div>
                                </section>
                           </div>
                        </div>
                    </div> <!--col-md-4-->
                 </div>
            </div>
            </div>

        <?php include("libs/footer.html"); ?>


    <div class="up-key">
        <a href="#app" id="up-arrow" class="btn btn-success">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="libs/js/main.js">  </script>


</body>
</html>
