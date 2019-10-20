<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/semantic.min.css">
    <script src="./asset/js/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 id="alertaaaaaaaaaaa">	</h1>
	<form method="post" id="insert-form">
			<input class="form-control" type="text" name="name"><br>
			<input class="form-control" type="text" name="lastname"><br>
			<input class="form-control" type="text" name="age"><br>
			<br>
			<input type="submit" class="btn btn-success" id="insert" value="บันทึกข้อมูล">

	</form>
</div>

<script>
		$(document).ready(function() {
			$('#insert-form').on('submit',function(e){
				e.preventDefault();
				$.ajax({
				url: "send.php",
				method: "post",
				data:$('#insert-form').serialize(),
				success:function(data){
						if(data == 'Success'){
							document.getElementById("alertaaaaaaaaaaa").innerText = "เพิ่มข้อมูลสำเร็จ";
						}else{
						 document.getElementById("alertaaaaaaaaaaa").innerText = "เกิดข้อผิดพลาด";
				}
						}
			});
		});
	});
	</script>
</body>
</html>