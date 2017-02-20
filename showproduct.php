<?php 
        $sql="SELECT * FROM `product`";
        
            $result=getpdo($con,$sql,1);
            foreach ($result as $row) {
            echo "  <div class='col-md-3 col-sm-6 hero-feature'>
                    <div class='thumbnail'>
                    <img src='backend/product/".$row['img']."' style='height:150px;'>
                    <div class='caption'>
                    <label>".$row['name']."</label>
                    <p style='color:#00FF00;'>฿ ".$row['price']."</p>
                    <p>
                    <a href='#' class='btn btn-success'><i class='fa fa-plus fa-lg'></i> ซื้อ</a> <a href='showdetail.php?p_id=".$row['id']."' class='btn btn-default'> ดูรายละเอียด</a>
                    </p>
                    </div>
                    </div>
                    </div>";

            $row['code'];
            $row['name'];
            $row['img'];
            $row['price'];
            }

?>
                        