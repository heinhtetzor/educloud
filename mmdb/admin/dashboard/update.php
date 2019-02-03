<?php
    include("../confs/config.php");

    $id = $_POST["id"];

    $name = $_POST["name"];

    $message = $_POST["message"];

    //create post after update
    $template = "
<!DOCTYPE html>
    <html lang='en'>
        <head>
            <title>Movie Database | ". $name ."</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
            <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'> 
            <link rel='shortcut icon' href='../favicon.jpg'>

            <meta charset='utf-8'>
            <meta http-equiv='x-ua-compatible' content='ie=edge'>
            <meta name='description' content='Movie Database | ". $name ."'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
            <style>
            body {
                background-color: #ddd;
            }
            .blog-author h3 {
                font-family: 'Righteous', cursive;
            }
            .blog-post{
                margin-top: 80px;
                border: 2px solid rgb(238, 238, 238);
                background: #fff;
                border-radius: 5px;
                box-shadow: 0px 2px 2px #fafafa;
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
            @media (max-width: 700px) {
                .blog-post{
                    margin-top: 40px auto;
                    background: #fff;
                    padding: 0 !important;
                    border: 0;
                }
                .blog-image {
                    width: 100%;
                }
            }
            </style>
                </head>
                <body>
                    <nav class='navbar navbar-expand-sm bg-dark navbar-dark fixed-top'>
                        <a class='navbar-brand' href='../index.php'><i class='fas fa-chevron-left'></i> Back</a>
                    
                        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
                            <span class='navbar-toggler-icon'></span>
                        </button>
                    
                        <div class='collapse navbar-collapse justify-content-end' id='collapsibleNavbar'>
                            <ul class='navbar-nav'>
                                <li class='nav-item'>
                                    <a class='nav-link' href='../public/reviews.php'>REVIEWS</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='nav-link' href='../public/previews.php'>PREVIEWS</a>
                                </li> 
                            </ul>
                        </div>
                    </nav>
                    <div class='container blog-post'>
                            
                        <div class='blog-author'>
                            <div class='row'>
                                <div class='col-6 text-left'>
                                            <h3>Movie database</h3>
                                        </div>
                                        <div class='col-6 text-right'>
                                            <img src='../favicon.jpg' class='blog-img'>
                                        </div>   
                                    </div>        
                                </div>
                                <div class='blog-post-image'>
                                    <img src='../". $target_file ."' class='text-center blog-image' width='100%'>
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
        $create_file_name = fopen('../../posts/'. $title . '.html', 'w') or die('You are not allowed');

        $sql = "UPDATE movie SET name='$name', remark='$message' WHERE id=$id";

        echo fwrite($create_file_name, $template);

        mysqli_query($conn, $sql);

    // header("location: posts.php");

?>