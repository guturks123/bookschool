<?php
		session_start();
		include_once 'controller/connect.php';
		$con = new DB();
		if(empty($_SESSION['user_id'])){
			header('location:login.php');
		};
		// ข้อมูลบุคคล
		@$user_id = $_SESSION['user_id'];
		@$teach = $con->viewDataTeach($user_id);
		@$data_teach = $teach->fetch_assoc();
		
		if($_SESSION['user_level'] == 1){
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Systeam Book</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/datable/semantic.min.css">
	<link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./asset/datable/css/dataTables.bootstrap4.min.css">

    <script src="./asset/js/jquery.min.js"></script>
</head>
<body>
		<!-- Menu -->
			<?php include 'view/menu.php' ?>
			<!-- Content -->
				<div class="container-fluid">
			<div class="row">
		<div class="col-md-6">
			<div class="ui purple segment">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ui violet inverted header">ประชาสัมพันธ์</h1>
					<hr>
							<!-- INFO -->
					
				<div class="ui divided selection list">
				<?php if(@$public = $con->viewDataPublic()){ ?>
				<?php while(@$data_public = @$public->fetch_assoc()){ ?>
					  <a class="item">
					  <?php if(@$data_public['public_level'] == 1 ){ ?>
						<div class="ui green horizontal label">ทั่วไป</div>
					  <?php }else{ ?>
					  <div class="ui red horizontal label">ด่วน</div>
					  <?php  };?>
						<?php echo @$data_public['public_topic'];?> &nbsp;[<?php echo @$data_public['public_date'] ?>]
					  </a>
				<?php }; ?>
				</div>
					
							<!-- END INFO -->
					</div>
				</div>
			</div>
		</div>
			<div class="col-md-6">
			<div class="ui red segment">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ui red inverted header">ข้อมูลส่วนตัว</h1>
					<hr>
					<h4>ชื่อ-นามสกุล : <?php echo $data_teach['user_fullname'];?></h4>
					<h4>เพิ่มข้อมูลไปแล้ว : <?php echo $data_teach['user_fullname'];?></h4>
					<h4>IP <?php echo $_SERVER['REMOTE_ADDR'];?></h4>
					</div>
				</div>
			</div>
		</div>
		<?php };?>
			</div>
			<br>
		<!-- Report -->
			<div class="row">
				<div class="col-md-12">
					<div class="ui red segment">
						<div class="row">
							<div class="col-md-12">
							<h1 class="ui red inverted header">รายงานปัญหา</h1>
							<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
									<div class="ui form">
									  <div class="field">
										<h3>หัวข้อ</h3>
										<input type="text">
									 </div>
									 <div class="field">
										<h3>เนื้อหา</h3>
										<textarea></textarea>
										
									 </div>
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col-md-12 ">
							<br>
									<button class="ui green button float-right">แจ้งปัญหา</button>
						</div>
					</div>
				</div>
			</div>
				</div>
				<br><br><br>
				
				
		<script src="./asset/js/bootstrap.min.js"></script>
		<script src="./asset/js/app.js"></script>
		<script src="./asset/js/sweetalert.js"></script>		
		<script src="./asset/js/semantic.min.js"></script>	

		
</body>
</html>

		<!-- ADMIN -->
		<?php }else if($_SESSION['user_level'] == 2){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Systeam Book</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/datable/semantic.min.css">
	<link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./asset/datable/css/dataTables.bootstrap4.min.css">

    <script src="./asset/js/jquery.min.js"></script>
</head>
<body>
		<!-- Menu -->
			<?php include 'view/menu.php' ?>
			<!-- Content -->
				<div class="container-fluid">
			<div class="row">
		<div class="col-md-6">
			<div class="ui purple segment">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ui violet inverted header">ประชาสัมพันธ์</h1>
					<hr>
							<!-- INFO -->
					
				<div class="ui divided selection list">
				<?php if(@$public = $con->viewDataPublic()){ ?>
				<?php while(@$data_public = @$public->fetch_assoc()){ ?>
					  <a class="item">
					  <?php if(@$data_public['public_level'] == 1 ){ ?>
						<div class="ui green horizontal label">ทั่วไป</div>
					  <?php }else{ ?>
					  <div class="ui red horizontal label">ด่วน</div>
					  <?php  };?>
						<?php echo @$data_public['public_topic'];?> &nbsp;[<?php echo @$data_public['public_date'] ?>]
					  </a>
				<?php }; ?>
				</div>
					
							<!-- END INFO -->
					</div>
				</div>
			</div>
		</div>
			<div class="col-md-6">
			<div class="ui red segment">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 class="ui red inverted header">สมาชิกทั้งหมด</h1>
					<hr>
					<h4>ชื่อ-นามสกุล : <?php echo $data_teach['user_fullname'];?></h4>
					<h4>เพิ่มข้อมูลไปแล้ว : <?php echo $data_teach['user_fullname'];?></h4>
					<h4>IP <?php echo $_SERVER['REMOTE_ADDR'];?></h4>
					</div>
				</div>
			</div>
		</div>
		<?php };?>
			</div>
			<br>
		<!-- Report -->
			<div class="row">
				<div class="col-md-12">
					<div class="ui red segment">
						<div class="row">
							<div class="col-md-12">
							<h1 class="ui red inverted header">รายงานปัญหา</h1>
							<hr>
							</div>
						</div>
				</div>
			</div>
				</div>
				<br><br><br>
				
				
		<script src="./asset/js/bootstrap.min.js"></script>
		<script src="./asset/js/app.js"></script>
		<script src="./asset/js/sweetalert.js"></script>		
		<script src="./asset/js/semantic.min.js"></script>	

		
</body>
</html>

		<?php }; ?>	