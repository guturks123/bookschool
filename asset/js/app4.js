$('#editdata').click(function(){
        alert('Kuy');
 });

 function editdata(uid){
     var uid = uid;
     $.ajax({
         url: "controller/process.php?action=edit",
         method:"post",
         data:$('#edit-data').serialize() + "&uid=" + uid,
         success:function(data){
            Swal.fire({
                type:'success',
                title:'แก้ไขข้อมูลสำเร็จ',
                showConfirmButton: false,
                timer:1500
            })
            console.log(data);
         }
     }) 
 }


