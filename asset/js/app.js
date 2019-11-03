$(document).ready(function() {
	$('#updatepassword').click(function(){
		var password1 = $('#password').val();
		var password2 = $('#password2').val();
		var pass = $('#pass').val();
		var repass = $('#repass').val();
		
		var hashpass1 = md5(password1);
		
		
	if(pass != repass || pass == '' || repass == ''){
			const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    Toast.fire({
                    type: 'error',
                    title: 'รหัสผ่านใหม่ไม่ตรงกัน !'
                    })
		}else if(hashpass1 != password2) {
			const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    Toast.fire({
                    type: 'error',
                    title: 'รหัสผ่านเก่าไม่ถูกต้อง !'
                    })
					console.log(password2);
		}else{
			$.ajax({
				url:'controller/edit_password.php',
				method:'post',
				data:$('#from-editpass').serialize(),
				success:function(data){
						const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500
                    })

                    Toast.fire({
                    type: 'success',
                    title: 'เปลี่ยนรหัสเรียบร้อย !'
                    })
					setTimeout(function(){
                        location.reload();
						},1500)
						
				}
			})
		};
		
	});
         $('#codesubject').keyup(function(){
                var txt = $(this).val();
                 $.ajax({
                    url: 'controller/process.php?action=fetchsubname',
                    method:'post',
                    data:{codesubject:txt},
                    success:function(data){
                        $('#subjectname').val(data);
                     }
                    });
                 });

        $('#teacher').keyup(function(){
            var txt = $(this).val();
            $.ajax({
                url: 'controller/process.php?action=fetchteach',
                method:'post',
                data:{teacher:txt},
                success:function(data){ 
                  $('#teachers').html(data);
                }
            });
        });

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
              Swal.fire(
                'สำเร็จ!',
                'บันทึกข้อมูลเรียบร้อย!',
                'success'
              )
              setTimeout(function(){
                location.reload();
              },1500)
            }else{
              Swal.fire(
                'กรอกข้อมูลไม่ครบ !',
                'กรุณากรอกข้อมูลให้ครบแล้วกดบันทึกข้อมูลอีกครั้ง',
                'warning'
              )
              
            }
        }
      });
    });
  });

