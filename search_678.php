<?php
    include("conexion.php");
    $con=conectar();

    if (isset($_POST['keyword'])) {
        $pcbcx = $_POST['keyword'];
    } else {
        $pcbcx = '';
    }


    $sql="SELECT * FROM video 

    ";
    $query=mysqli_query($con,$sql);

    //WHERE keyword_1 = '$pcbcx' OR keyword_2 = '$pcbcx' OR keyword_3 = '$pcbcx' OR keyword_4 = '$pcbcx' 
    $row=mysqli_fetch_array($query);

    while($row=mysqli_fetch_array($query)) {
        echo $row['video_name'] . "<br>";
    }
?>