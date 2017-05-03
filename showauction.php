<script type="text/javascript" src="countdown.js"></script>
<style>
#name{
  color: #006C9A;
  font-size: 24px;
  font-weight:bold;
}

</style>
    <?php
    $dateArrayEnd = array();
      $sql="SELECT * FROM `auction_product` WHERE status = 'A'";

            $result=getpdo($con,$sql,1);
            foreach ($result as $row) {
              $time_stramp = strtotime($row['end_time']);
              $dateArrayEnd['y'] = date('Y',$time_stramp)*1;
              $dateArrayEnd['m'] = (date('m',$time_stramp)*1)-1;
              $dateArrayEnd['d'] =  date('d',$time_stramp)*1;
              $dateArrayEnd['h'] = date('H',$time_stramp)*1;
              $dateArrayEnd['i'] = date('i',$time_stramp)*1;
              $dateArrayEnd['s'] = date('s',$time_stramp)*1;
              // echo "<pre>";
              // var_dump($dateArrayEnd);
            // $end_time =  (substr($row['end_time'],0,4)).",";
            // $end_time .=  (substr($row['end_time'],5,2)-1).",";
            // $end_time .=  substr($row['end_time'],8,2).",";
            // $end_time .=  substr($row['end_time'],10,3).",";
            // $end_time .=  substr($row['end_time'],14,2).",";
            // $end_time .=  substr($row['end_time'],17,2).",";

            // $end_time = $row['end_time'];
      ?>
      <!-- s -->
      <script type="text/javascript">
        function cooldown(y,m,d,h,i,s,target){

          let clock = document.getElementById(target)
            , targetDate = new Date(y, m, d,h,i,s); // Jan 1, 2050;

          clock.innerHTML = countdown(targetDate).toString();

           let myVar = setInterval(function(){

             //console.log($("#"+target).text());
             if($("#"+target).text() == ""){
                  clearInterval(myVar);
                  $("#"+target).parent().parent().remove();
                  $.post('service/update_status_action.php', {code: target}, function() {
                    
                  }).done(function(data){
                    if(data == "true"){
                      location.reload();
                    }
                  });
              }
             
            clock.innerHTML = countdown(targetDate).toString();
            }, 1000);

        }


        $(function(){

        cooldown(<?=$dateArrayEnd['y'] ?>,<?=$dateArrayEnd['m'] ?>,<?=$dateArrayEnd['d'] ?>,<?=$dateArrayEnd['h'] ?>,<?=$dateArrayEnd['i'] ?>,<?=$dateArrayEnd['s'] ?>,'<?= $row['code'] ?>');
        });
      </script>

           
        <div class="col-md-3 col-sm-6 hero-feature">
          <div class="thumbnail">
            <img src="backend/product/<?=$row['image']?>" style="height:150px;">
            <div class="caption">
                <label><?=$row['name']?></label><br/>
                <label id="<?= $row['code'] ?>" style="font-size: 24px; color: #006C9A;"></label>
                <p>
                 <a href="auction_detail.php?p_id=<?=$row['code']?>" class="btn btn-primary btn-block">
                   <i class="fa fa-gavel"></i> ประมูลเลย
                 </a>
                </p>
            </div>
          </div>
      </div>
      <?php
    }
      ?>