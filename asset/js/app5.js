$('.editdata').click(function(){
    var uid = $(this).attr("id");
    var name = $('#subjectname2').val();
    $.ajax({
        url: "controller/process.php?action=edit",
        method:"post",
        data:$('#edit-data-' + uid).serialize() + "&uid=" + uid,
        success:function(data){
           Swal.fire({
               type:'success',
               title:'แก้ไขข้อมูลสำเร็จ',
               showConfirmButton: false,
               timer:1500
           })
        }
    }) 
})