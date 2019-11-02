<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header('location:index.php');  
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <script src="./asset/js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-5 col-md-7 col-sm-6 col-lg-4">
        <form class="form-container" id="form-login">
            <h3 class="text-center">เข้าสู่ระบบ</h3>
  <div class="form-group">
    <label for="username">ชื่อผู้ใช้</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="userHelp" placeholder="...">
    <small id="userHelp" class="form-text text-muted">ใส่ข้อความเพิ่มเติม</small>
  </div>
  <div class="form-group">
    <label for="password">รหัสผ่าน</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="showPassword">
    <label class="form-check-label" for="showPassword">ดูรหัสผ่าน</label>
  </div>
  <button type="button" name="button" id="login" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
</form>
        </div> 
    </div>
</div>
<script>
$('#login').click(function(){
    $.ajax({
        url:'controller/login.php',
        method:'post',
        data:$('#form-login').serialize(),
        success:function(data){
            if(data == 'success'){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                    })

                    Toast.fire({
                    type: 'success',
                    title: 'ยินดีต้อนรับเข้าสู่ระบบ'
                    })
                    setTimeout(function(){
                        window.location = "index.php";
         },2000)
            }else{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                    })

                    Toast.fire({
                    type: 'error',
                    title: 'เข้าสู่ระบบไม่สำเร็จ'
                    })
            };
        }
    })
});

$('#showPassword').click(function(){
    var key_attr = $('#password').attr('type');

    if(key_attr != 'text'){
        $('.checkbok').addClass('show');
        $('#password').attr('type','text');
    }else{
        $('.checkbox').removeClass('show');
        $('#password').attr('type','password');
    }
});
        

</script>
<script src="./asset/js/sweetalert.js"></script>
<script src="./asset/js/bootstrap.min.js"></script>
</body>
</html>