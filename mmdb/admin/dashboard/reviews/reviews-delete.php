<?php

    include("../confs/config.php");

    $id = $_GET["id"];
    $sql = "DELETE FROM reviews WHERE id = $id";
    mysqli_query($conn, $sql);
  

    header("location: reviews-list.php");
?>