$('#table-infor').DataTable();
function delete_data(id){
    var uid = id;
    $.ajax({
        url: 'controller/process.php?action=delete',
        method:'post',
        data:{id:uid},
        success:function(data){
            location.reload();
        }
    })
}