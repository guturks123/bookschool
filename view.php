
<?php
include_once 'controller/connect.php';
$con = new DB();
$view = $con->viewData('tbook');
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
            <td><button class="ui green button"><i class="far fa-edit"></i>&nbsp;&nbsp;แก้ไข</button></td>
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
<!-- END app -->
</div>
    <script src="./asset/datable/js/jquery.dataTables.min.js"></script>
    <script src="./asset/datable/js/dataTables.bootstrap4.min.js"></script>
    <script src="./asset/js/app2.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/all.min.js"></script>
    <script src="./asset/js/semantic.min.js"></script>

</body>
</html>