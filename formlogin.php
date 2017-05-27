<html>
    <head>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Fruit Market</title>
        <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
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
            <form action="login-DB.php" method="post" onSubmit="return chkfrom();">
                <div class="container">
                        <?php
                            if (isset($_GET['err'])) {
                                if($_GET['err'] == 1){      
                        ?>  

                            <br>    
                            <center>
                                <div class="alert alert-danger alert-dismissable fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>เตือน!</strong> กรุณากรองข้อมูลให้ครบ
                                </div>
                                </center>
                        <?php   
                                }
                            }
                        ?>
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4">
                          <h2>Welcome to Fruit Market</h2>
                            <center>
                              <h2><img src="logo/user-avatar.png" /></h2>
                            </center><br/>
                            <div class="form-login">
                                E-mail <input type="text" id="email" name="email" class="form-control input-sm chat-input" placeholder="E-mail" />
                                </br>
                                Passoword <input type="password" id="pass" name="pass" class="form-control input-sm chat-input" placeholder="Password" />
                                </br>
                                <div class="wrapper">
                                <span class="group-btn">
                                <button type="submit" class="btn btn-info btn-block"><img src="logo/login-user.png" />  เข้าสู่ระบบ</button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </body>
<script type="text/javascript">
    function chkfrom()
    {
        if($('#email').val() =="" || $('#pass').val() ==""){
            window.location.href = "formlogin.php?err=1";
            return false;
        }
    }
</script
</html>
