<?php 
						@$user_id2 = $_SESSION['user_id'];
						@$teach2 = $con->viewDataTeach($user_id2);
						@$data_teach2 = $teach2->fetch_assoc();
						if($_SESSION['user_level'] == 1){
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><?php echo $title_menu; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="insert.php"><?php echo $topic1; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="view.php"><?php echo $topic2; ?></a>
      </li>
    </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="modal" data-target="#exampleModal" href="insert.php">แก้ไขรหัสผ่าน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="controller/logout.php" id="logout">ออกจากระบบ</a>
          </li>
        </ul>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขรหัสผ่าน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form id="from-editpass">
		<div class="form-row">
				<div class="form-group col-md-12">
				<h4>รหัสผ่านเก่า</h4>
					<input type="text" id="password2" hidden value="<?php echo @$data_teach2['user_pass']; ?>">
					<input type="password" id="password" name="password" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
				<h4>รหัสผ่านใหม่</h4>
					<input type="text" hidden id="seid" name="seid" value="<?php echo $_SESSION['user_id']; ?>">
					<input type="password" id="pass" name="pass" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
				<h4>รหัสผ่านใหม่อีกครั้ง</h4>
					<input type="password" id="repass" name="repass" class="form-control">
				</div>
			</div>
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" id="updatepassword" class="btn btn-success updatepassword">บันทึก</button>
		</form>	
      </div>
    </div>
  </div>
</div>
<script src="./asset/js/md5.min.js"></script>	
<br>

<!-- ADMIN -->
						<?php }else if ($_SESSION['user_level'] == 2) { ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><?php echo $title_menu_admin; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="insert.php"><?php echo $topic1; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="view.php"><?php echo $topic2; ?></a>
      </li>
    </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="modal" data-target="#exampleModal" href="insert.php">แก้ไขรหัสผ่าน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="controller/logout.php" id="logout">ออกจากระบบ</a>
          </li>
        </ul>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขรหัสผ่าน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form id="from-editpass">
		<div class="form-row">
				<div class="form-group col-md-12">
				<h4>รหัสผ่านเก่า</h4>
					<input type="text" id="password2" hidden value="<?php echo @$data_teach2['user_pass']; ?>">
					<input type="password" id="password" name="password" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
				<h4>รหัสผ่านใหม่</h4>
					<input type="text" hidden id="seid" name="seid" value="<?php echo $_SESSION['user_id']; ?>">
					<input type="password" id="pass" name="pass" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
				<h4>รหัสผ่านใหม่อีกครั้ง</h4>
					<input type="password" id="repass" name="repass" class="form-control">
				</div>
			</div>
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" id="updatepassword" class="btn btn-success updatepassword">บันทึก</button>
		</form>	
      </div>
    </div>
  </div>
</div>
<script src="./asset/js/md5.min.js"></script>	
<br>

						<?php }; ?>					
						