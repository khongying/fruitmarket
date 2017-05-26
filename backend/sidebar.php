<style>
li#sidebar{
    padding-top: 13px;
}
.active {
  color: #41506B;
  background-color: #FFFFFF;
}
span#count_cart {
    background-color: #ff0700;
    padding: 3px 5px 3px 5px;
    color: #fff;
    text-align: center;
    border-radius: 2px;
  }
</style>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li id="sidebar">
            <a href="product.php" id="product"><img src="logo/shopping-cart.png" /> เพิ่มสินค้า</a>
        </li>
        <li>
            <a href="travel.php" id="travel"><img src="logo/barn.png" /> เพิ่มสวนผลไม้</a>
        </li> 
        <li>
            <a href="list_product.php" id="list_product"><img src="logo/wheelbarrow.png" />  คลังสินค้า</a>
        </li>
        <li>
            <a href="show_pay_qt.php" id="cash_qt"><img src="logo/cashbox.png" />  ตรวจสอบการแจ้งชำระ 
             <?php 
                $sql_count_pay_product = "SELECT (COUNT(view)) as total FROM `pay_qt` WHERE `view`='1'";
                $sql_count_pay_auction = "SELECT (COUNT(view)) as total FROM `pay_auction_qt` WHERE `view`='1'";
                $count_pay_product = getpdo($con,$sql_count_pay_product,'total');
                $count_pay_auction = getpdo($con,$sql_count_pay_auction,'total');
                $sum = $count_pay_product + $count_pay_auction;
                if ($count_pay_product != 0 || $count_pay_auction != 0 ) {
            ?>
                <span id="count_cart"><?=$sum?></span>
            <?php
                }else{

                }
             ?>
             </a>
            
        </li>
        <li>
            <a href="worker.php" id="worker"><img src="logo/mechanic.png" /> ระบบจัดการคนงาน</a>
        </li>
        <li>
            <a href="list_new_promotion.php" id="new_promotion"><img src="logo/megaphone.png" /> ประชาสัมพันธ์-โปรโมชั่น</a>
        </li>
        <li>
            <a href="users.php" id="user"><img src="logo/hierarchical-structure.png" /> ระบบจัดการผู้ใฃ้งาน</a>
        </li>
    </ul>
</div>
