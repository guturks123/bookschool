
<?php
include_once 'controller/connect.php';
$con = new DB();
$view = $con->viewData('tbook');
$view2 = $con->viewData('tbook');
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
    <link rel="stylesheet" href="./asset/datable/css/dataTables.bootstrap4.min.css">

    <script src="./asset/js/jquery.min.js"></script>
    <script src="./asset/js/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <style>
        body{
          background-color:#fcfcfc;
        }
    </style>
</head>
<body>

<!-- menu -->
<div id="app">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" @click="viewIndex=true,viewAdd=false" href="#"><i class="fas fa-book"></i>&nbsp;&nbsp;Book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a  class="nav-item nav-link" @click="viewAdd=true,viewIndex=false"  href="index.php"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;เพิ่มข้อมูล <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="#">ดูข้อมูล</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
    </div>
  </div>
</nav>
</div>
<br>
    <!-- Select data -->
    <div id="app2">
      <div class="container">
          <div class="row mt-3">
            <div class="col-lg-6">
              <h1 class="text-danger">ดูข้อมูล</h1>
            </div>
          </div>
          <hr class="bg-danger">
          <?php if (@$view->num_rows > 0) {
	?>
          <div id="app2">
                <table id="table-infor" class="ui red selectable celled table">
        <thead>
          <tr>
          <th>เทอม</th>
          <th>ปีการศึกษา</th>
          <th>รหัสวิชา</th>
          <th>ชื่อวิชา</th>
          <th>ครูผู้สอน</th>
          <th>แก้ไข</th>
          <th>ลบ</th>
        </tr></thead><tbody>
           <?php while ($data = $view->fetch_assoc()) {?>
          <tr id="datainfor">
            <td><?php echo $data['book_term']; ?></td>
            <td><?php echo $data['book_termyear']; ?></td>
            <td><?php echo $data['book_subcode']; ?></td>
            <td><?php echo $data['book_subname']; ?></td>
            <td><?php echo $data['book_teacher'] ?></td>
            <td><button class="ui green button" data-toggle="modal" data-target="#modal-edit-<?php echo $data['id'] ?>"><i class="far fa-edit"></i>&nbsp;&nbsp;แก้ไข</button></td>
            <td><button class="ui red button" onclick="delete_data(<?php echo $data['id']; ?>);"><i class="far fa-trash-alt"></i>&nbsp;&nbsp;ลบ</button></td>

          </tr>
           <?php }
	;} else {?>
	         <h1 style="text-align: center;" class="text-danger">ไม่พบข้อมูล</h1>
<?php }
;?>
        </tbody>

      </table>
      <hr class="bg-info">
    </div>

  </div>

      </div>
<br><br><br>
<!-- Modal Edit -->
<!-- Modal -->

<!-- END app -->
</div>
<!-- Modal -->
<?php
        if(@$view2->num_rows > 0){
          while($data2 = $view2->fetch_assoc()){
        
?>
<div class="modal fade" id="modal-edit-<?php echo $data2['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel-<?php echo $data2['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="text-success" id="editLabel-<?php echo $data2['id'] ?>">แก้ไขข้อมูล</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-danger">ภาคเรียน/ปีการศึกษา</h3>
      <form id="edit-data">
      <div class="form-row">
          <div class="form-group col-md-2">
            <label for="term">เทอม</label>
            <select class="form-control" id="term" name="term">
              <?php if ($data2['book_term'] == 1){ ?>
      <option selected="selected">1</option>
      <option>2</option>
              <?php }else{ ?>
      <option>1</option>          
      <option selected="selected">2</option>
              <?php };?>
    </select>
          </div>
          <div class="form-group col-md-3">
            <label for="termyear">ปีการศึกษา</label>
            <input type="text" class="form-control" name="termyear" id="termyear" value="<?php echo $data2['book_termyear'] ?>">
          </div>
      </div>
      <h3 class="text-danger">รายละเอียด</h3>
      <div class="form-row">
        <div class="form-group col-md-3">
            <label for="subjectcode">รหัสวิชา</label>
            <input type="text" class="form-control" id="codesubject" name="subjectcode" value="<?php echo $data2['book_subcode'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="subjectname">ชื่อวิชา</label>
            <input type="text" class="form-control" name="subjectname" id="subjectname" value="<?php echo $data2['book_subname'] ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
            <label for="class">ระดับชั้น</label>
            <select class="form-control" id="class" name="class">
              <?php if($data2['book_class'] == 'ปวช'){ ?>
      <option selected="selected" value="ปวช">ปวช</option>
      <option value="ปวส">ปวส</option>
              <?php }else{ ?>
      <option value="ปวช">ปวช</option>
      <option selected="selected" value="ปวส">ปวส</option>
              <?php }; ?>
    </select>
        </div>
        <div class="form-group col-md-6">
            <label for="teacher">ครูผู้สอน</label>
            <input class="form-control" name="teacher" id="teacher" value="<?php echo $data2['book_teacher'] ?>">
        </div>
      </div>
      <h3 class="text-danger">ข้อมูลการอนุญาติ</h3>
      <div class="form-row">
        <div class="form-group col-md-2">
            <label for="id2">ลำดับที่</label>
            <input type="text" class="form-control" id="id2" name="id2"value="<?php echo $data2['book_id2'] ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="bookyear">ปี พ.ศ.</label>
            <input type="text" class="form-control" id="bookyear" name="bookyear" value="<?php echo $data2['book_year'] ?>">
        </div>
      </div>
       <h3 class="text-danger">รายละเอียดหนังสือ</h3>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="bookname">ชื่อหนังสือ</label>
            <input type="text" class="form-control" id="bookname" name="bookname" value="<?php echo $data2['book_name'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="publisher">สำนักพิมพ์</label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $data2['book_publisher'] ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="paper">กระดาษ</label>
            <select class="form-control" id="paper" name="paper">
              <?php if($data2['book_paper'] == 'ปอนด์'){ ?>
                  <option selected="selected" value="ปอนด์">ปอนด์</option>
                  <option value="ถนอมสายตา">ถนอมสายตา</option>
                  <option value="ถนอมสายตา">อาร์ต</option>
              <?php }else if($data2['book_paper'] == 'ถนอมสายตา'){ ?>
                  <option  value="ปอนด์">ปอนด์</option>
                  <option selected="selected" value="ถนอมสายตา">ถนอมสายตา</option>
                  <option value="ถนอมสายตา">อาร์ต</option>
              <?php }else{?>
                  <option value="ปอนด์">ปอนด์</option>
                  <option value="ถนอมสายตา">ถนอมสายตา</option>
                  <option selected="selected" value="ถนอมสายตา">อาร์ต</option>
              <?php  }; ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="format">รูปแบบ</label>
            <select class="form-control" id="format" name="format">
              <?php if($data2['book_format'] == '๑ สี'){ ?>
                <option selected="selected" value="๑ สี">1 สี</option>
                <option value="๒ สี">2 สี</option>
                <option value="๔ สี">4 สี</option>
              <?php }else if($data2['book_format'] == '๒ สี'){?>
                <option value="๑ สี">1 สี</option>
                <option selected="selected" value="๒ สี">2 สี</option>
                <option value="๔ สี">4 สี</option>
              <?php }else{?>
                <option value="๑ สี">1 สี</option>
                <option value="๒ สี">2 สี</option>
                <option selected="selected" value="๔ สี">4 สี</option>
              <?php };?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="size">ขนาดรูปเล่ม</label>
            <select class="form-control" id="size" name="size">
              <?php if($data2['book_size'] == '๘ หน้ายก'){ ?>
                <option value="๘ หน้ายก">8 หน้ายก</option>
                <option value="A๔">A4</option>
                <option value="อื่นๆ">อื่นๆ</option>
              <?php }else if($data2['book_size'] == 'A๔'){?>
                <option value="๘ หน้ายก">8 หน้ายก</option>
                <option selected="selected" value="A๔">A4</option>
                <option value="อื่นๆ">อื่นๆ</option>
              <?php }else{ ?>
                <option value="๘ หน้ายก">8 หน้ายก</option>
                <option value="A๔">A4</option>
                <option selected="selected" value="อื่นๆ">อื่นๆ</option>
              <?php };?>
            </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
            <label for="price">ราคา</label>
            <input type="text" class="form-control" name="price" id="price" value="<?php echo $data2['book_price'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for="reason">เหตุผลที่เลือก</label>
            <input type="text" class="form-control" name="reason" id="reason" value="<?php echo $data2['book_reason'] ?>">
        </div>
      </div>
      </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-success" onclick="editdata(<?php echo $data2['id']; ?>);" >บันทึก</button>
      </div>
        
    </div>
  </div>
</div>
        <?php }}; ?>
        
    <script src="./asset/datable/js/jquery.dataTables.min.js"></script>
    <script src="./asset/datable/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="./asset/js/app4.js"></script>
    <script src="./asset/js/app3.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/all.min.js"></script>
    <script src="./asset/js/semantic.min.js"></script>

</body>
</html>