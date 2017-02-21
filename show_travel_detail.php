<?php
require'condatabase/conDB.php';

$t_id = $_GET['t_id'];

$sql="SELECT * FROM `travel` WHERE `id`='$t_id' AND `status`='A'";
$result=getpdo($con,$sql,1);
    foreach ($result as $row) {
    	$name   = $row['name'];
    	$detail   = $row['detail'];
    	$img1  = $row['img_pro'];
    	$img2  = $row['img_1'];
    	$img3  = $row['img_2'];
    	$img4  = $row['img_3'];
    	$img5 = $row['img_4'];

    }
?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Market | <?=$name?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/travel.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
      body{
        font-family: 'Itim', cursive;
        }
    	#page{
    		padding-top:100px;
    	}
    	#line{
    		line-height : 1.5;
    		text-indent:50px;
    	}
      #map {
        height: 250px;
        width: 900px;
       }
	</style>
</head>


<body>
	<div id="page">
		<?php include'navbar.php'; ?>

			<div class="container">
				<div class="row" align="left">
				<div class="col-md-7">
					<div class="carousel slide article-slide" id="article-photo-carousel">
						<div class="carousel-inner cont-slider">
							<div class="item active">
								<img alt="" title="" src="backend/travel/<?php echo $img1;?>" style="width:600px; height:400px;">
							</div>
							<div class="item">
								<img alt="" title="" src="backend/travel/<?php echo $img2;?>" style="width:600px; height:400px;">
							</div>
							<div class="item">
								<img alt="" title="" src="backend/travel/<?php echo $img3;?>" style="width:600px; height:400px;">
							</div>
							<div class="item">
								<img alt="" title="" src="backend/travel/<?php echo $img4;?>" style="width:600px; height:400px;">
							</div>
							<div class="item">
								<img alt="" title="" src="backend/travel/<?php echo $img5;?>" style="width:600px; height:400px;">
							</div>
						</div>
						<ol class="carousel-indicators">
							<li class="active" data-slide-to="0" data-target="#article-photo-carousel">
								<img src="backend/travel/<?php echo $img1;?>">
							</li>
							<li class="" data-slide-to="1" data-target="#article-photo-carousel">
								<img src="backend/travel/<?php echo $img2;?>">
							</li>
							<li class="" data-slide-to="2" data-target="#article-photo-carousel">
								<img src="backend/travel/<?php echo $img3;?>">
							</li>
							<li class="" data-slide-to="3" data-target="#article-photo-carousel">
								<img src="backend/travel/<?php echo $img4;?>">
							</li>
							<li class="" data-slide-to="4" data-target="#article-photo-carousel">
								<img src="backend/travel/<?php echo $img5;?>">
							</li>
						</ol>
					</div>
				</div>
				<div class="col-md-5">
				<h2 align="center"><font color="#228B22"><?php echo $name;?></font></h2><hr/>
				<h4><p id="line"><font color="330066"><?php echo $detail;?></font></p></h4>
				</div>
				</div>
			</div>
	</div> <br/><br/><br/>

  <center>
    <div id="map"></div>
  </center>
    <script>
      function initMap() {
        var uluru = {lat: <?=$row['lat']?> , lng: <?=$row['lng']?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
          var marker = new google.maps.Marker({
          position: uluru,
          map: map,

        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk8hXfb10orcATx1g2cvRT3V0s5mIc01o&callback=initMap">
    </script>
    <?php
    require'footer.php';
    ?>
</body>
</html>
