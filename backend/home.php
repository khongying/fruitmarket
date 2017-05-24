<?php

session_start();
    require 'condatabase/conDB.php';

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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
                 <div class="col-md-2">
                     <select id="year" class="form-control">
                        <?php 
                            $yearNow = date('Y');
                            $historyYear =$yearNow - 10;

                        ?>
                         <?php for($historyYear ; $historyYear<=$yearNow ; $historyYear++ ){
                            if($historyYear == $yearNow){
                                $selected= "selected";
                            }else{
                                $selected = "";
                            }
                            ?>

                         <option value="<?= $historyYear?>" <?=$selected ?> > <?= $historyYear?></option>

                         <?php }?>
                     </select>
                 </div>
                </div> 

                <div class="row">
                  <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                  <div class="row">
                    
                    <div id="table"></div>  
                 
                  </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
$(function(){
          $.post('get_data.api.php',{}, function() {

            }).done(function(data){
                //alert(data);
                var json_data = jQuery.parseJSON(data);
                render_chart(json_data,"ระบบบริหารการจัดการสวนผลไม้","container");
                //render_chart(data,"หัว","ice");
            });

        $("#year").change(function(event) {
            var year_select = $(this).val();
                 $.post('get_data.api.php',{year:year_select}, function() {

                }).done(function(data){
                    //alert(data);
                    var json_data = jQuery.parseJSON(data);
                    render_chart(json_data,"ระบบบริหารการจัดการสวนผลไม้","container");
                    //render_chart(data,"หัว","ice");
                });
        });

       

// start function
function render_chart(data,title,target){
            Highcharts.chart(target, {
        chart: {
            type: 'column'
        },
        title: {
            text: title
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'รายรับ-รายจ่สย (บาท)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} บาท</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            //alert("เดือน "+this.category + "ปี" +data.year);
                            get_detail(this.category,data.year);
                            //console.log(this);
                        }
                    }
                }
            }
        },
        series: [{
            name: 'รายจ่าย',
            data: data.total_moeny1

        }, {
            name: 'รายรับ',
            data: data.total_moeny2

        }]
    });

}

function get_detail(m,y){
   
    $.post('get_detail.php', {m:m,y:y}, function() {
    
    }).done(function(data){
        $("#table").html(data);
    });
}
// end function
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
