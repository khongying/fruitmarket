<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

<style type="text/css">
	.nav > li > a:hover, .nav > li > a:focus {
	  background-image:linear-gradient(45deg, #ee9ca7 0%, #ffdde1 100%);
	  text-decoration: none;
	  color: #000;
	}
	body{
      font-family: 'Kanit', sans-serif;
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
	a.name{
	  font-size:16pt;
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

		$(".number-product").blur(function() {
			var id = $(this).attr("id");
			var num = $(this).val();
			$.ajax({
				url:'update_product.php',
				type :'post',
				data :{id : id, num : num}
			})
				.done(function(data) {
							swal({
								title: "อัพเดทเรียบร้อยแล้ว",
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
					<a class="add-product btn btn-primary" href="confirm-card.php">ยืนยันการสั่งซื้อ</a>
			</div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


			<nav class="navbar navbar-fixed-top" style="background-color: #FEBFB3" role="navigation">
				<div class="container">
					<div class="container-fluid">
						<div class="logo">
							<ul class="nav navbar-nav">
									<li><a class="name" href="index.php"><img src="logo/online-shop.png" /> ระบบบริหารจัดการสวนผลไม้</a></li>
							</ul>
						</div>
						<ul class="nav navbar-nav">
							<li><a href="webboard.php"><img src="logo/chat.png" /> กระทู้ถาม-ตอบ</a></li>
						</ul>

						<ul class="nav navbar-nav">
							<li><a href="promotion.php"><img src="logo/megaphone.png" /> ประชาสัมพันธ์-โปรโมชั่น</a></li>
						</ul>
						<?php
							if(isset($_SESSION['login']) && $_SESSION['login'] != 'false'){?>
							<ul class="nav navbar-nav navbar-right">
									<li>
										<a href="" class="dropdown-toggle" type="button" data-toggle="dropdown">ยินดีต้อนรับ <?php echo $_SESSION['name']; ?>  <img src="logo/down-chevron.png" /></i>
										</a>
											<ul class="dropdown-menu">
												<li><a href="profile.php?user=<?=$_SESSION['id']?>"><img src="logo/curriculum.png" /> Profile</a></li>
												<li>
												<a href="logout.php"><font color="red"><img src="logo/off-button.png" /> ออกจากระบบ</font></a>
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
							<li><a href="formlogin.php" style="cursor: pointer;"><img src="logo/login.png" /> เข้าสู่ระบบ</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="register.php" style="cursor: pointer;"><img src="logo/user.png" /> สมัครสมาชิก</a></li>
						</ul>
					</div>
				</div>				
				<?php } ?>
			</nav>

</body>
