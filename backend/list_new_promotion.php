<?php 
    require 'condatabase/conDB.php';
    session_start();
            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend | เพิ่มสินค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
        body{
            font-family: 'Itim', cursive;
        }
        #wrapper{
            padding-top:50px;
        }
        span.news{        
            background-color: #FF9600;
            border-left: 5px solid #FF6600;
            width: 95px;
            font-size: 16px;
            line-height: 12px;
            font-weight: bold;
            padding: 10px 0 10px 10px;
            display: inline-block;
            color: #FFFFFF;
        }
        span.promotion{        
            background-color: #3695cb;
            border-left: 5px solid #0069a6;
            width: 95px;
            font-size: 16px;
            line-height: 12px;
            font-weight: bold;
            padding: 10px 0 10px 10px;
            display: inline-block;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <diV id="navbar">
        <?php
                include 'navbar.php';
        ?>
    </diV> 
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include 'sidebar.php';
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content --> 
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><img src="logo/text-lines.png" />  ประชาสัมพันธ์-โปรโมชั่น</h2><hr/>
                            <div class="col-md-offset-3 col-md-6">
                            <a class="btn btn-info" href="new_promotion.php"><img src="logo/newspaper.png" /> เพิ่มข่าวประชาสัมพันธ์-โปรโมชั่น</a>
                                            <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>สถานะ</th>
                                                  <th>ชื่อผลไม้</th>
                                                  <th>แก้ไข / ลบ</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                    <?php
                                        $sql_news_promotion = "SELECT * FROM `news_promotion`";
                                        $result=getpdo($con,$sql_news_promotion,1);
                                        foreach ($result as $news_promotion ) {
                                    ?>
                                                <tr>
                                                  <td scope="row">
                                                      <?php  
                                                        if($news_promotion['status_category'] == 1){
                                                        ?>
                                                            <span class="news">News</span>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <span class="promotion">Promotion</span>
                                                        <?php    
                                                        }
                                                      ?>
                                                  </td>
                                                  <td><?= $news_promotion['name_title'] ?></td>
                                                  <td>
                                                    <a href="edit_news_promotion.php?id=<?= $news_promotion['id']; ?>" class="btn btn-warning" target="_blank"><i class="fa fa-pencil-square-o"></i></a>

                                                    <a class="del_news_promotion btn btn-danger" news_promotion="<?=$news_promotion['id']?>"><i class="fa fa-trash"></i></a>
                                                  </td>
                                                </tr>          
                                    <?php
                                        }
                                     ?>   
                                              </tbody>
                                            </table>
                                    </div>


                    
            
                        <div class="col-md-12">
                            <hr/>
                            <footer class="footer">
                            <p>&copy; BSRU 2017</p>
                            </footer>  
                        </div> 
                        <!-- form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#new_promotion").attr({
        "class" : "active"
    });



    $('.del_news_promotion').click(function(event) {
        var id = $(this).attr('news_promotion');
        $.post('del_news_promotion.php', {news_promotion: id}, 
            function() {
                
        }).done(function(data){
             location.reload();
        });

        
    });    

</script>
</body>
</html>
<?php } ?>

