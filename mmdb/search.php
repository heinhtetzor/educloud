<?php    
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'mmdb';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($conn, $dbname);
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://mmwebfonts.comquas.com/fonts/?font=zawgyi" />
    <link rel="stylesheet" href="https://mmwebfonts.comquas.com/fonts/?font=unimon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <style>
      
        </style>
</head>
<body>
   
    <nav class="navbar navbar-expand-sm navbar-light bg-dark fixed-top">
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
                    <li class="nav-item">
                        <a class="nav-link" href="public/reviews.php"><i class="fas fa-th-list"></i> Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="public/previews.php">Previews</a>
                    </li>
                    <li class="nav-item dropdown nav-item-drag">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Categories
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="public/previews.php"><i class="fab fa-facebook-f"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <?php
     //$query = $_GET['query']; 
    ?>
 <div class="container search-result">
        <!-- <p>Search Results for: <?php //echo $query; ?></p>
            <form action="search.php" method="get">
                <input type="text" class="form-control" name="query" value="<?php //echo $query?>">
                <button type="submit" class="btn btn-success">Search again</button>
            </form> -->
        
        <?php

            $query = $_GET["query"];
            $min_length = 30;
            
            if(strlen($query) >= $min_length){ 
                
                $query = htmlspecialchars($query); 

                $query = mysqli_real_escape_string($conn, $query);

                if(preg_match("/[A-Z  | a-z]+/", $query)) {
                $raw_results = mysqli_query($conn, "SELECT * FROM reviews
                                            WHERE (name LIKE '%".$query."%') OR (remark LIKE '%".$query."%')") or die(mysql_error());
                }
                if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
                    
                    while($results = mysqli_fetch_array($raw_results)){
                    
                        echo "<div class='container'>";
                        echo "<div class='blog'>";
                        echo "<p><h3>".$results['name']."</h3>". $results['remark']."</p>";
                        echo "</div>";
                        echo "</div>";
                    
                    }
                    
                }
                else{ // if there is no matching rows do following
                    echo "No results";
                }
                
            }
            else{ // if query length is less than minimum
                echo "Not Found :(";
            }
        ?>

        
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            var value = $("#search-key").val();
            
            if(!value) return false;

            $("#search-key").keydown(function(e) {
                if(e.which == 13) 
                    $("#button").click();
                });
        }); 
    </script>
</body>
</html>