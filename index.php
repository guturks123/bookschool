<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Systeam Book</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/semantic.min.css">
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
      <a  class="nav-item nav-link" @click="viewAdd=true,viewIndex=false"  href="#"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;เพิ่มข้อมูล <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
    </div>
  </div>
</nav>
<br>
    <!-- Insert data -->
    <?php include 'view/create.php'?>
<!-- END app -->
</div>



    <script>
      $(document).ready(function() {
      $('#insert-form').on('submit',function(e){
        e.preventDefault();
        $.ajax({
        url: "controller/process.php?action=create",
        method: "post",
        data:$('#insert-form').serialize(),
        success:function(data){
            console.log(data);
              var a = data;
            if(a == 'Success'){
              $('#insert-form')[0].reset();
              document.getElementById("alert").innerHTML = '<div class="ui green inverted segment"><h2><i class="fas fa-check"></i>&nbsp;&nbsp;บันทึกข้อมูลสำเร็จ !</h2></div><br>';

            }else{
              document.getElementById("alert").innerHTML = '<div class="ui red inverted segment"><h2><i class="fas fa-exclamation"></i>&nbsp;&nbsp;ไม่สามารถบันทึกข้อมูลได้ กรุณากรอกแบบฟอร์มให้ถูกต้อง !</h2></div><br>'
            }
        }
      });
    });
  });
            var app = new Vue({
                el:'#app',
                data:{
                    viewAdd:false,
                    viewIndex:true,
                    newUser:{name:"",email:"",kiy:""}
                },
            })
    </script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/all.min.js"></script>
    <script src="./asset/js/semantic.min.js"></script>
</body>
</html>