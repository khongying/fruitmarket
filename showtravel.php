<?php 

    $sql="SELECT * FROM `travel`";

        $result=getpdo($con,$sql,1);
        foreach ($result as $row) {
        echo "  <div class='col-md-3 col-sm-6 hero-feature'>
                <div class='thumbnail'>
                <img src='backend/travel/".$row['img_pro']."' style='height:150px;'>
                <div class='caption'>
                <label>".$row['name']."</label>
                <p>
                 <a href='show_travel_detail.php?t_id=".$row['id']."' class='btn btn-success'>ดูรายละเอียด</a>
                </p>
                </div>
                </div>
                </div>";

        }

?>