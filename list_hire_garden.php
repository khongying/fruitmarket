<style>
#name{
  color: #006C9A;
  font-size: 24px;
  font-weight:bold;
}
.rounded-circle{
  border-radius:50%;
}
img.rounded-circle{
  vertical-align:middle;
}


</style>
<?php
    $sql="SELECT * FROM `hire_garden` WHERE `status`= 'A'";

        $result=getpdo($con,$sql,1);
        foreach ($result as $row) { ?>

    <div class="col-md-4" align="center">
      <img class="rounded-circle" src="backend/hire_garden/<?=$row["img_pro"]?>" alt="รูปภาพ" width="250" height="250">
      <h2 class="heading"><?=$row["name"]?></h2>
      <p class="price"><?= number_format($row["price"],2) ?> บาท/ปี</p>
      <p><a class="btn btn-info" href="show_garden_detail.php?g_id=<?=$row["id"]?>" role="button">รายละเอียด »</a></p>
    </div>

 <?php
      }
?>

