<?php
            if (!isset($_SESSION['login'])){
              $_SESSION['login'] = "false";
            }
?>
<script>
$( document ).ready(function() {

    $("div.product-card_cert").click(function(){
 
      var login = "<?= $_SESSION['login'] ?>";

      if (login === 'user') {
        $.ajax({
          url:'shopcard.php',
          type :'post',
          data :{id : $(this).attr('id')}
        })
          .done(function(data) {
            // alert(data);
            //console.log(data);
            $("#products-lists").empty();
            $("#products-lists").append(data);

        });

      } else {
          window.location = "formlogin.php";
      }


    });
});
</script>
<?php
        $sql="SELECT * FROM `product`";

            $result=getpdo($con,$sql,1);
            foreach ($result as $row) {
            ?>
             <div class="col-md-3 col-sm-6 hero-feature">
               <div class="product" id="product-<?=$row['id']?>">
                  <div class="thumbnail">
                    <a href="showdetail.php?p_id=<?=$row['id']?>">
                      <img src="backend/product/<?=$row["img"]?>" style="height:150px;">
                    </a>
                    <div class="caption">
                      <label><?=$row['name']?></label>
                      <p style="color:#00FF00;">฿<?=number_format($row['price'],2)?></p>
                      <p>
                      <div class="product-card_cert btn btn-success btn-block"
                      id='<?= $row['code'];?>'>
                        <img src="logo/shopping-basket.png" /> หยิบใส่ตะกร้า
                      </div>
                      </p>
                    </div>
                  </div>
            </div>
          </div>

    <?php
            }
?>
