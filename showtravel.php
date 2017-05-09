<style>
#name{
  color: #006C9A;
  font-size: 24px;
  font-weight:bold;
}
</style>
<label id="name"> แนะนำสวนผลไม้ ณ เมืองจันทร์ </label>
<hr/>
<?php

    $sql="SELECT * FROM `travel`";

        $result=getpdo($con,$sql,1);
        foreach ($result as $row) { ?>
        <div class="col-md-3 col-sm-6 hero-feature">
          <div class="thumbnail">
            <img src="backend/travel/<?=$row["img_pro"]?>" style="height:150px;">
            <div class="caption">
                <label><?=$row["name"]?></label>
                <p>
                 <a href="show_travel_detail.php?t_id=<?=$row["id"]?>" class="btn btn-info btn-block">
                   <img src="logo/eye.png"> ดูรายละเอียด</a>
                </p>
            </div>
          </div>
      </div>
<?php
        }

?>
