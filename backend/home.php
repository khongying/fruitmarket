<?php

session_start();
    require 'condatabase/conDB.php';

    $sql="SELECT * FROM `content`";

        $result=getpdo($con,$sql,1);
        foreach ($result as $row) {
                $content = $row['text'];
        }

            if (!isset($_SESSION['admin'])){  //check session
                Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login
                }else{?>
<html>
<head>
    <title>Backend</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/sidebar.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="tinymce/js/tinymce/init-tinymce.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <style type="text/css" media="screen">
        #wrapper{
            padding-top:50px;
        }
        #container {
            min-width: 310px;
            max-width: 800px;
            height: 400px;
            margin: 0 auto
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
                  <div id="container"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $(function(){

        $.get('get_data.api.php', function() {
            /*optional stuff to do after success */
        }).done(function(data){



        },function(data){
            console.log(data);
            data = jQuery.parseJSON(data);

            Highcharts.chart('container', {
                chart: {
                    type: 'line',
                     zoomType: 'xy'
                },
                title: {
                    text: 'ระบบบริหารการจัดการสวนผลไม้'
                },

                subtitle: {
                    text: 'สรุปราย-รายจ่าย'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'รายรับ-รายจ่าย'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'รายจ่าย',
                    data: data.total_moeny1
                },{
                    name: 'รายรับ',
                    data: data.total_moeny2
                }]
            });

        });



    });


    // end charts
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
<?php } ?>
