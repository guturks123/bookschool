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
              $('#insert-form')[0].reset();
              $('#alert').html('<div class="ui green inverted segment"><h2><i class="fas fa-check"></i>&nbsp;&nbsp;บันทึกข้อมูลสำเร็จ !</h2></div><br>');
            }else{
              $('#alert').html('<div class="ui red inverted segment"><h2><i class="fas fa-exclamation"></i>&nbsp;&nbsp;ไม่สามารถบันทึกข้อมูลได้ กรุณากรอกแบบฟอร์มให้ถูกต้อง !</h2></div><br>');
            }
        }
      });
    });
  });