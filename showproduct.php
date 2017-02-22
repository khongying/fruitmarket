<?php
        $sql="SELECT * FROM `product`";

            $result=getpdo($con,$sql,1);
            foreach ($result as $row) {
            ?>
             <div class="col-md-3 col-sm-6 hero-feature">
                  <div class="thumbnail">
                    <a href="showdetail.php?p_id=<?=$row['id']?>">
                      <img src="backend/product/<?=$row["img"]?>" style="height:150px;">
                    </a>
                    <div class="caption">
                      <label><?=$row['name']?></label>
                      <p style="color:#00FF00;">฿<?=number_format($row['price'],2)?></p>
                      <p>
                      <div class="product-card_cert btn btn-success btn-block">
                        <i class="fa fa-shopping-basket fa-lg"></i> หยิบใส่ตะกร้า
                      </div>
                      </p>
                    </div>
                  </div>
            </div>
    <?php
            }

?>
