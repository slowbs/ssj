$('.openModal').click(function () {
    var id = $(this).attr('data-id');
    $.ajax({
        url: "modal_ajax.php?id=" + id, cache: false, success: function (result) {
            $(".modal-content").html(result);
        }
    });
});

//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
$(function () {
    //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
    $('#example').dataTable();
});