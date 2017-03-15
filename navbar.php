<link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
<?php
	session_start();
?>
<style type="text/css">
	body{
      font-family: 'Itim', cursive;
    }
	#cart{
		padding-top: 5px
	}
	div#count_cart {
    background-color: #ff0700;
    padding: 0px 5px;
    color: #fff;
    position: absolute;
    top: 25px;
    margin-left: 20px;
    border-radius: 5px;
  }
</style>
<script>
$( document ).ready(function() {

      $(".product-card_cert").click(function(){
        let count = $("#count_cart").attr("count");
        let display = "0";
        count = +count + 1;
        if (count > 99) {
          display ="99+"
        }else {
          display = count;
        }
          $("#count_cart").attr("count",count);
          $("#count_cart").html(display);
				});

 			$.post('auto_show_list_product.php', function(data, textStatus, xhr) {

 }).done(function(data){
  $("#products-lists").append(data);
	 // delete-product ลบสินค้า
		$("div.delete-product").click(function(){

				$.ajax({
					url:'delete-product.php',
					type :'post',
					data :{id : $(this).attr('id')}
				})
					.done(function(data) {
								swal({
									title: "ลบสินค้าเรียบร้อยแล้ว",
									text: " ",
									type: "success",
									showCancelButton: false,
									confirmButtonColor: "#DD6B55",
									confirmButtonText: "OK",
									},
									function(){
									window.location.href = "index.php";

								});
				});

	  });

			$("div.add-product").click(function(){

				$.ajax({
					url:'add-product-db.php'
				})
					.done(function(data) {
					alert(data)	;
				});

			});

 });

});
</script>
	<body>
		<!-- Large modal -->
    <div class="modal fade" id="shoppingModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Fruit Market | ตะกร้าสินค้า</h4>
          </div>
          <div class="modal-body" id="products-lists">
          </div>
					<div class="modal-footer">
							<div class="add-product btn btn-primary">ยืนยันการสั่งซื้อ</div>
					</div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="container-fluid">
						<div class="logo">
							<img class="navbar-brand" src="logo/apples.png" />
							<a  class="navbar-brand" href="index.php"> Fruit Market</a>
						</div>
						<ul class="nav navbar-nav">
							<li><a href="webboard.php"><i class="fa fa-comments-o fa-lg"></i> กระทู้ถาม-ตอบ</a></li>
						</ul>
						<?php
							if(isset($_SESSION['login']) && $_SESSION['login'] != 'false'){?>
							<ul class="nav navbar-nav navbar-right">
									<li></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
									<li>
										<a href="" class="dropdown-toggle" type="button" data-toggle="dropdown">ยินดีต้อนรับ <?php echo $_SESSION['name']; ?> <i class="glyphicon glyphicon-chevron-down"></i>
										</a>
											<ul class="dropdown-menu">
												<li><a href="human/profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
												<li>
												<a href="logout.php"><font color="red"><i class="fa fa-power-off fa-lg"></i> ออกจากระบบ</font></a>
												</li>
											</ul>
									</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
									<li>
										<div id="btn-cart" data-toggle="modal" data-target="#shoppingModal">
												<div id="cart"><img src="logo/cart.png"></div>
												<div id="count_cart" count="<?=array_sum($_SESSION['product_card']);?>"><?=array_sum($_SESSION['product_card']);?></div>
												<div id="in-cart"><form id="form-cart"></form></div>
										</div>
									</li>
							</ul>
						<?php }else{ ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="formlogin.php" style="cursor: pointer;"><i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="register.php" style="cursor: pointer;"><i class="fa fa-user fa-lg"></i> สมัครสมาชิก</a></li>
						</ul>
					</div>
				</div>				<?php } ?>
			</nav>

</body>
