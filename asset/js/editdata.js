function editdata() {
    $.ajax({
        url: "controller/process.php?action=edit",
        method: "post",
        data: ('#edit-data').serialize(),
        success: function (data) {
            Swal.fire({
                type: 'success',
                title: 'แก้ไขข้อมูลสำเร็จ',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
}
