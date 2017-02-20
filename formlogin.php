<html>
    <head>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Fruit Market</title>
        <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <style media="screen">
          #page{
            padding-top: 100px;
          }
          body{
            font-family: 'Itim', cursive;
          }
        </style>
    </head>
    <body>
      <?php require_once'navbar.php'; ?>
                <div id="page">
                    <form action="login-DB.php" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-offset-4 col-md-4">
                                  <h2>Welcome to Fruit Market</h2>
                                    <center>
                                      <h2><i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i></h2>
                                    </center><br/>
                                    <div class="form-login">
                                        E-mail <input type="text" name="email" class="form-control input-sm chat-input" placeholder="E-mail" />
                                        </br>
                                        Passoword <input type="password" name="pass" class="form-control input-sm chat-input" placeholder="Password" />
                                        </br>
                                        <div class="wrapper">
                                        <span class="group-btn">
                                        <button type="submit" class="btn btn-success btn-block">เข้าสู่ระบบ <i class="fa fa-sign-in"></i></button>
                                        <br/> <a class="btn btn-warning btn-block">ลืมรหัสผ่าน</a>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <div id="page">
      </body>
</html>
