<?php
	session_start();
?>

			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="container-fluid">
						<div class="logo">
							<img class="navbar-brand" src="logo/store.png" />
							<a  class="navbar-brand" href="index.php"> Fruit Market</a>
						</div>
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
						</ul>
						<?php
							if(isset($_SESSION['user'])){?>

							<ul class="nav navbar-nav navbar-right">
									<li></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
									<li>
										<a href="" class="dropdown-toggle" type="button" data-toggle="dropdown">ยินดีต้อนรับ <?php echo $_SESSION['name']; ?> <i class="glyphicon glyphicon-chevron-down"></i>
										</a>
											<ul class="dropdown-menu">
												<li><a href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>
												<li>
												<a href="logout.php"><font color="red"><i class="fa fa-power-off fa-lg"></i> ออกจากระบบ</font></a>
												</li>

											</ul>
									</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
									<li><a href="#"><i class="glyphicon glyphicon-shopping-cart"> ตะกร้าสินค้า</i></a></li>
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
