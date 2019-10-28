$(document).ready(function() {
    
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

