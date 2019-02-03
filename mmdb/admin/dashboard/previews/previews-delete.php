<?php

    include("../confs/config.php");

    $id = $_GET["id"];
    $sql = "DELETE FROM previews WHERE id = $id";
    mysqli_query($conn, $sql);
  

    header("location: previews-list.php");
?>