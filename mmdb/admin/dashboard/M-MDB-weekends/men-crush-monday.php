<?php
    include("../dbsystem/config.php");

        $name = $_POST["name"];
        
        $message = $_POST["message"];

        $file_tmp = $_FILES["photo"]["tmp_name"];
        $type = $_FILES["photo"]["type"]; 
        $file_name = $_FILES["photo"]["name"];

        $target_dir = "admin/dashboard/photo/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]); //echo

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif") {
                move_uploaded_file($file_tmp,"photo/$file_name");
        }


        // if($target_file == "") {
        //     echo "<img src='' style='display: none;'>";
        // }
        //create post
$template = "
<!DOCTYPE html>
    <html lang='en'>
        <head>
            <title>Movie Database | ". $name ."</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
            <link rel='shortcut icon' href='../minilogo.png'>

            <meta charset='utf-8'>
            <meta http-equiv='x-ua-compatible' content='ie=edge'>
            <meta name='description' content='Movie Database | ". $name ."'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
            <style>
            body {
                background-color: #fafafa;
            }          
            .blog-post{
                margin: 80px auto;
                border: 2px solid #fafafa;
                background: #fff;
                width: 50%;
            }
            .blog-post-image img {
                width: 100%;
                height: 400px;
            }
            .blog-img {
                width: 50px;
                height: 50px;
                border-radius: 100%;
            }
            .blog-author, .blog-post-header, .blog-post-content {
                padding: 10px;
            }
            .blog-author h4 {
                padding: 10px;
            }
            .footer {
                padding: 50px;
                background-color: rgb(15, 15, 15) !important;
            }
            .fixed-top.scrolled {
                background-color: rgba(0, 0, 0, 0.8) !important;
                transition: background-color 200ms linear;
              }
              
              .fixed-top.scrolled .nav-link, .fixed-top.scrolled .navbar-brand{
                color:#fff !important;
              }
              
              .nav-logo {
                  width: 35px;
                  height: 35px;
              }
            @media (max-width: 700px) {
                .container {
                    padding:0 !important;
                }
                .blog-post{
                    margin-top: 100px;
                    background: #fff;
                    border: 0;
                    width: 100%;
                }
                .blog-image {
                    width: 100%;
                }
            }
            </style>
                </head>
                <body>
                <nav class='navbar navbar-expand-sm navbar-light bg-white fixed-top'>
                <div class='container'>
                    <!-- Brand -->
                    <a class='navbar-brand' href='../index.php'><img src='../images/minilogo.png' class='nav-logo'> M-MDB</a>
                   
                    <!-- Toggler/collapsibe Button -->
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
        
                    <!-- Navbar links -->
                    <div class='collapse navbar-collapse justify-content-end' id='collapsibleNavbar'>
                    
                        <ul class='navbar-nav'>
                            <li class='nav-item'>
                                <a class='nav-link active-link' href='../index.php'><i class='fas fa-home'></i> Home</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='../public/reviews.php'><i class='fas fa-th-list'></i> Reviews</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='../public/previews.php'><i class='fas fa-tags'></i> Previews</a>
                            </li>
                            <li class='nav-item dropdown nav-item-drag'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
                                    Categories
                                </a>
                                
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='public/previews.php'><i class='fab fa-facebook-f'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
                    <div class='container'>
                            <div class='blog-post'>
                                <div class='blog-author'>
                                    <div class='row'>
                                        <div class='col-8 text-left'>
                                                <h3>Movie database</h3>
                                            </div>
                                            <div class='col-4 text-right'>
                                                <img src='../favicon.jpg' class='blog-img'>
                                            </div>   
                                        </div>        
                                    </div>
                                        <div class='blog-post-image'>
                                            <img src='../".$target_file."' class='text-center blog-image' width='100%'>
                                        </div>
                                        <div class='blog-post-header'>
                                            <div class='row'>
                                                <div class='col-8'>
                                                    <h3 class='blog-post-title text-danger'>". $name ."</h3>
                                                </div>
                                                <div class='col-4 text-right'>
                                                    <span class='blog-post-date'></span>                  
                                                </div>
                                            </div>
                                        </div>   
                                        <div class='blog-post-content'>
                                            ". $message ."
                                        </div>   
                                </div>        
                        
                            </div>
                        
                        <div class='footer text-center'>
                                <div class='container'>
                                    <section class='social-navbar'>
                                        <a class='navbar-brand' href='#'>Movie DATABSE</a>
                                        <div class='row'>
                                            <div class='col-12 social-links'>
                                                <a href='https://www.facebook.com/MMoviedatabase/' class=''>  <i class='fab fa-facebook-f'></i></a>
                                                <a href='#' class=''>  <i class='fab fa-instagram'></i></a>
                                                <a href='#' class=''><i class='fab fa-youtube'></i></a>
                                            </div>
                                        </div>
                                    </section>
                                    <section class='contact-navbar'>
                                        <div class='row'>
                                            <div class='col-12 contact-links'>
                                                <a href='about/index.html'>About Us</a>
                                                <a href='#'>Team & policy</a>
                                                <a href='#'>Service</a>
                                                <a href='#'>UPdates</a>
                                                <a href='#'>Contact US</a>
                                            </div>
                                        </div>
                                    </section>
                                    <section class='text-white'>". date('Y').", &copy; copyright & Theme , All rights reserved. </section>
                                </div>
                            </div>
                        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
                        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
                        <script>
                        $(document).ready(function(){
                            $('.navbar-toggler').on('click',function(){
                                $('#collapsibleNavbar').slideToggle();
                                if( $('a.nav-link').on('click',function(){
                                    $('#collapsibleNavbar').slideUp();
                                }));
                            });
                        </script>
                    </body>
                </html>   
        ";
        $title = str_replace(" ", "-", $name);
        $create_file_name = fopen('../../../M-MDB_Weekend_posts/'. $title . '.html', 'w') or die('You are not allowed');

        echo fwrite($create_file_name, $template);
        fclose('$page_name');
         
    
        $sql = "INSERT INTO `Men Crush Monday`(name, remark, created_date)
        VALUES('$name', '$message', now())";
    
        mysqli_query($conn, $sql);
        header("location: Happy_Birthday.php");
?>