<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>กระทู้ถามขตอบ | Fruit Market</title>
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
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
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                    <a href="webboard.php" class="btn btn-primary">กระทู้คำถาม</a>
                    <hr/>
                  </div>
                </div>
          </div>

          <div class="container">
              <div class="row">
              <div class="col-md-3"></div>
                  <div class="col-md-6"> <br />
                      <h4 align="center"> ตั้งกระทู้คำถาม </h4>
                  <hr />

                  <form action="add_ask.php" method="POST" class="form-horizontal" enctype="multipart/form-data" onSubmit="return chkfrom();">
                      <div class="form-group">
                          <div class="col-sm-6">
                              <p> กระทู้คำถาม</p>
                              <input type="text"  name="ask" class="form-control" placeholder="ชื่อกระทู้คำถาม" required />
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12">
                              <p> รายละเอียด </p>
                              <textarea name="detail_ask" class="form-control"  rows="3" placeholder="รายละเอียดคำถาม" required></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-12">
                              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus fa-lg"></i> สร้างกระทู้คำถาม </button>
                          </div>
                      </div>
                  </form>
                  </div>
              </div>
          </div>



    </div>
    <?php
    include 'footer.php';
    ?>

  </body>
</html>
