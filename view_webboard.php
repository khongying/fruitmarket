<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>กระทู้ถาม-ตอบ | Fruit Market</title>
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    body{
          font-family: 'Itim', cursive;
    }
    #page{
          padding-top:100px;
    }
    #show{
          padding-top:50px;
    }
.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 200px;
  margin: auto;
  max-width: 900px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th.reply{
	width: 200px;
  color:#453C38;
  background:#A4E5D9;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th.reply_detail{
  color:#453C38;
  background:#A4E5D9;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}


tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}

td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td.reply {
	color:#453C38;
  background:#C8F4DE;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}


</style>
<?php
require'condatabase/conDB.php';
$ask = $_GET['ask_id'];
$sql="SELECT * FROM `ask` WHERE id_ask = '{$ask}'";
$result=getpdo($con,$sql,1);
    foreach ($result as $row) {
     $sqlask = "SELECT ask.q_ask,ask.detail,ask.create_date,users.fullname FROM ask LEFT JOIN users ON ask.user_id = users.id WHERE ask.user_id = ( SELECT id FROM users WHERE users.id = '{$row['user_id']}')";
    }

$data = getpdo($con,$sqlask,1);
    foreach ($data as $rows) {
?>
<body>
  <div id="page">

      <?php include'navbar.php'; ?>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <table class="table-fill">
                  <tr>
                    <th>Author</th>
                    <th>Topic : <?= $rows['q_ask']?></th>
                  </tr>
                  <tr>
                    <td><?= $rows['fullname']?></td>
                    <td><?= $rows['detail']?></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      Create Date : <?= $rows['create_date']?>
                    </td>
                  </tr>
              </table>
            </div>
          </div>
        </div>
<?php } ?>
<br/>

<!-- reply -->
<?php
		$sql_reply="SELECT * FROM `reply` WHERE id_ask = '{$ask}'";
		$reply_data = getpdo($con,$sql_reply,1);
		    foreach ($reply_data as $reply) {

?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<table class="table-fill">
								<tr>
									<th class="reply">Author</th>
									<th class="reply_detail">ข้อความ</th>
								</tr>
								<tr>
									<td class="reply"><?= $reply['user_name']?></td>
									<td class="reply"><?= $reply['detail']?></td>
								</tr>
								<tr>
									<td colspan="2" class="reply">
										Create Date : <?= $reply['create_date']?>
									</td>
								</tr>
						</table>
					</div>
				</div>
			</div>
			<br/>
<?php } ?>



<!-- add reply -->
        <div class="container">
            <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6"> <br />
                <form action="add_ask.php" method="POST" class="form-horizontal" enctype="multipart/form-data" onSubmit="return chkfrom();">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <p> ข้อความ </p>
                            <textarea name="detail_ask" id="reply_ask" class="form-control"  rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div  id="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o fa-lg"></i> ส่งข้อความ </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
				<?php
			  include 'footer.php';
			  ?>

<script>
	$( document ).ready(function() {
			$("div#submit").click(function(){
				if($('textarea').val() == ""){

					swal("กรุณาใส่ข้อความ!!");

				}else {
					var id_ask = <?=$ask?>;
					var reply = $("textarea").val();

					$.ajax({
						url:'add_reply.php',
						type :'post',
						data :{ idask : id_ask , detail_reply : reply}
					})
					.done(function(data) {
							swal({
								title: "ส่งข้อความสำเร็จแล้ว",
								text: " ",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "#A4E5D9",
								confirmButtonText: "OK",
								},
								function(){
								window.location.href = "view_webboard.php?ask_id=<?=$ask?>";

							});
						});
				}

			});
	});
</script>






</div>
