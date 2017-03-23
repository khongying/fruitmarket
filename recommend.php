<?php
        require'condatabase/conDB.php';
        session_start();

?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fruit Market</title>
    <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>
body{
    font-family: 'Itim', cursive;
  }
#page{
  padding-top:100px;
}
#show{
    padding-top:50px;
}
</style>
<body>

  <div id="page">

      <?php include'navbar.php'; ?>


          <div class="container" id="show">
            <div class="row">
              <?php
                   include 'sidebar.php';
               ?>

                 <div class="col-md-10">
                    <?php
                         include'list_recommend.php';
                    ?>
                 </div>
             </div>
        </div>
</div>
<?php
include 'footer.php';
?>

<script>
$("#recommend").attr({
      "class" : "active"
  });
</script>
</body>
</html>
