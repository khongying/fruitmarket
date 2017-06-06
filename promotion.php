<?php
        require'condatabase/conDB.php';
        session_start();

?>
<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fruit Market</title>
    <link rel="shortcut icon" type="image/png" href="logo/groceries.png">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="bootstrap/css/step.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    #page{
		    padding-top:55px;
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
<body>

<div id="page">

    <?php include'navbar.php'; ?>

        <div class="container" id="show">
              <div class="row">
                 <h1 id="profile_name"><img src="logo/news.png" />  ข่าวประชาสัมพันธ์-โปรโมชั่น</h1><hr/>
                  <section>
                      <div id="navbar" class="navbar-collapse collapse" style="background-image:linear-gradient(-20deg, #ddd6f3 0%, #faaca8 100%, #faaca8 100%);">
                        <ul class="nav navbar-nav">
                          <li class="">
                              <a href="#step1" data-toggle="tab">ทั้งหมด</a>
                          </li>

                          <li class="">
                              <a href="#step2" data-toggle="tab">ข่าวประชาสัมพันธ์</a>
                          </li>

                          <li class="">
                              <a href="#step3" data-toggle="tab">ข่าวโปรโมชั่น</a>
                          </li>

                          </ul>
                        </div> 

                          <form>
                              <div class="tab-content">
                                  <div class="tab-pane active" id="step1"><br>

                                      <?php
                                        $sql_news_promotion = "SELECT * FROM `news_promotion`";
                                        $result=getpdo($con,$sql_news_promotion,1);
                                        foreach ($result as $news_promotion ) {
                                    
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
                                        <a href="promotion_detail.php?id=<?=$news_promotion['id']?>"><?=$news_promotion['name_title']?></a> <hr/>
                                    <?php
                                        }
                                     ?> 
                                  </div>
                                  <div class="tab-pane" id="step2"> <br>
                                      <?php
                                        $sql_news = "SELECT * FROM `news_promotion` WHERE `status_category`='1'";
                                        $data = getpdo($con,$sql_news,1);
                                        foreach ($data as $news ) {
                                    
                                          if($news['status_category'] == 1){
                                          ?>
                                            <span class="news">News</span>
                                          <?php
                                          }else{
                                          ?>
                                            <span class="promotion">Promotion</span>
                                          <?php    
                                          }
                                    ?>
                                        <a href="promotion_detail.php?id=<?=$news['id']?>"><?=$news['name_title']?></a> <hr/>
                                    <?php
                                        }
                                     ?> 
                                  </div>
                                  <div class="tab-pane" id="step3"> <br>
                                      <?php
                                        $sql_promotion = "SELECT * FROM `news_promotion` WHERE `status_category`='2'";
                                        $data_promotion = getpdo($con,$sql_promotion,1);
                                        foreach ($data_promotion as $promotion ) {
                                    
                                          if($promotion['status_category'] == 1){
                                          ?>
                                            <span class="news">News</span>
                                          <?php
                                          }else{
                                          ?>
                                            <span class="promotion">Promotion</span>
                                          <?php    
                                          }
                                    ?>
                                        <a href="promotion_detail.php?id=<?=$promotion['id']?>"><?=$promotion['name_title']?></a> <hr/>
                                    <?php
                                        }
                                     ?> 
                                  </div>
                                
                                  <div class="clearfix"></div>
                              </div>
                          </form>
                      </div>
                  </section>
   
              </div>
        </div>
</div>

  <?php
  include 'footer.php';
  ?>

<script>
$("#index").attr({
        "class" : "active"
    });
</script>
</body>
</html>
