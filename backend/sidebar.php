<style>
li#sidebar{
    padding-top: 13px;
}
.active {
  color: #41506B;
  background-color: #FFFFFF;
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
            <a href="show_pay_qt.php" id="cash_qt"><img src="logo/cashbox.png" />  ตรวจสอบการแจ้งชำระ</a>
        </li>
        <li>
            <a href="worker.php" id="worker"><img src="logo/mechanic.png" /> ระบบจัดการคนงาน</a>
        </li>
        <?php
        if($_SESSION['role'] == "power_admin"){
        ?>
        <li>
            <a href="users.php" id="users"><img src="logo/hierarchical-structure.png" /> ระบบจัดการผู้ใช้งาน</a>
        </li>
        <?php
        }else{
            echo "ไม่เจอ";
        }
        ?>
    </ul>
</div>
