<?php
    include("conexion.php");
    $con=conectar();

    if (isset($_POST['keyword'])) {
        $pcbcx = $_POST['keyword'];
    } else {
        $pcbcx = '';
    }

    //var_dump($pcbcx);// cbcxcx

    $sql="SELECT * FROM video 

    WHERE keyword_1 = '$pcbcx' OR keyword_2 = '$pcbcx' OR keyword_3 = '$pcbcx' OR keyword_4 = '$pcbcx' 
    ";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title> PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>

        <div id="my_video_environment" style="z-index: 1; position: absolute; width: 100%; height: 100%; background-color: black;">
            <video height="100%" muted='true' autoplay="true" controls loop>
                <source src="https://r6---sn-cvb7ln7e.googlevideo.com/videoplayback?expire=1657510922&ei=qkfLYtv9CLaHx_APkcCF2Ac&ip=49.12.104.180&id=o-AFMQS0xiX7ZQzxgtcBjOQ1Lo-qAQm6gkRY4QkiWhR70-&itag=22&source=youtube&requiressl=yes&vprv=1&mime=video%2Fmp4&ratebypass=yes&dur=180.024&lmt=1643839017546583&fexp=24001373%2C24007246&c=ANDROID&txp=4532434&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cvprv%2Cmime%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRQIgOKuVXWLR9O8fJrSfYzl0BastOn5ASpPHmxWYYYTeeFECIQCNu4d6ZByqzIp7XNXXSsecg9tEUj4AlHDQCGxglIMW_A%3D%3D&utmg=ytap1_UxxajLWwzqY&cms_redirect=yes&mh=S8&mip=2800:484:1a84:4a00:40d2:f246:b925:6d5b&mm=31&mn=sn-cvb7ln7e&ms=au&mt=1657497424&mv=m&mvi=6&pl=46&lsparams=mh,mip,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRQIgfS_tmENrF3UnyZtSu6esv1OvttwIAaUXWi62kc9IctMCIQCsaTT4bl7Eb6DqFoeLiB8TvWZoxOYX1b4EqmMHg8JV6w%3D%3D" type="video/mp4">
            </video> <!--videos/Luke1.mp4--> 
        </div>

        <div id="searchEngineMachine_environment" style="z-index: 2; position: relative;">
            <form action="" method="post"> <!--formget.php-->
                <input type="text" id="searchEngineMachine" placeholder="JBSB92" name="keyword"/>
                <input type="submit" value="OK">
            </form>
        </div>

        <div class="col-md-8" style="z-index: 2; position: relative; width: 100px; height: 400px; overflow-y: scroll;">
            <table class="table" >
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <th>
                            <div id="videoPortrait_div'<?php echo $row['video_id']?>'" 
                                style='
                                position: relative;
                                overflow:hidden;
                                height: 100px;
                                width: 100px;
                                text-align:center;
                                background-color: gray;
                                opacity: 1;
                                transition-property: all;
                                transition-duration: 0.5s;
                                '
                                    onclick="bcdcds_click(
                                        '<?php echo $row['video_id']?>',
                                        '<?php echo $row['video_content']?>'
                                    );">
                                <div 
                                    style='
                                    position: absolute;
                                    top: 0px;
                                    left: 0px;
                                    overflow:hidden;
                                    height: 100px;
                                    width: 100px;
                                    text-align:center;
                                    /*background-color: blueviolet;*/
                                    opacity: 1;
                                    transition-property: all;
                                    transition-duration: 0.5s;
                                    '
                                     >
                                    

                                    <img style='
                                    height:100%; cursor: pointer;
                                    z-index: 1;'
                                    src='<?php echo $row['video_image']?>'
                                    alt=''>

                                </div>
                                <div 
                                    style='
                                    position: absolute;
                                    top: 0px;
                                    left: 0px;
                                    opacity: 1;
                                    transition-property: all;
                                    transition-duration: 0.5s;
                                    height: 100px;
                                    width: 100px;
                                    color: white;
                                    '
                                     >
                                     <b><?php echo $row['video_name']?></b><br>
                                </div>
                            </div>

                            <!--<?php echo $row['video_name']?>-->
                        </th>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <script>
            function bcdcds_click(video_id, video_content)
            {
                var my_video = document.getElementById("my_video_environment");
                //alert("change 2"); videos/1/1/LukeHemmings.mp4
                // muted='true'
                my_video.innerHTML =
                    "<video width='100%' autoplay='true'>" +
                    "<source src='videos/" + video_content + "' type='video/mp4'> " +
                    "</video>";
            }
        </script>

    </body>
</html>