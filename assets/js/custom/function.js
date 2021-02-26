

/////////////////////////////////////////////////////////////////////////
//////////// Category function
////////////////////////////////////////////////////////////////////////

/////////// Add Category
function addCategory() {
    $.ajax({
        url: "/intsys/kb/main/saveCategory",
        method: "POST",
        data: $('#frm_addCategory').serialize(),
        beforeSend: function () {
            $('#spinner').html('<div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>');
        },
        success: function (data) {
            if (data == "บันทึกสำเร็จ") {
                $('#cat_name').removeClass('clscatname');
                $('#catalert').fadeIn(500);
                $('#catalert').html('<div class="alert alert-success alert-dismissible fade show" role="alert">บันทึกข้อมูลเรียบร้อยแล้ว<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                $('#cat_name').val('');
                $('#cat_memo').val('');
                loadCategory();
                $('#tb_category').dataTable();
            } else if (data == "บันทึกไม่สำเร็จ") {
                alert(data);
            } else if (data == "ไม่ได้กรอกชื่อหมวดหมู่") {
                $('#catalert').fadeIn(500);
                $('#catalert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">กรุณากรอกชื่อหมวดหมู่ด้วยค่ะ<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('#cat_name').addClass('clscatname');
                $('#cat_name').val('');
                $('#cat_memo').val('');
            } else {
                $('#catalert').fadeIn(500);
                $('#catalert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">ชื่อหมวดหมู่ซ้ำในระบบค่ะ กรุณาตรวจสอบ!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('#cat_name').val('');
                $('#cat_memo').val('');
            }


        }
    });
}
/////////// END Add Category


/////////// Load Category
function loadCategory() {
    $.ajax({
        url: "/intsys/kb/main/loadCategory",
        method: "POST",
        data: {},
        beforeSend: function () {

        },
        success: function (data) {
            $('#loadCategoryList').html(data);
            $('#tb_category').dataTable();
        }
    });
}
/////////// END Load Category


/////////// Edit Category
function editCategory(data_id, data_catname, data_catmemo) {
    $.ajax({
        url: "/intsys/kb/main/editCategory",
        method: "POST",
        data: {
            data_id: data_id,
            data_catname: data_catname,
            data_catmemo: data_catmemo
        },
        beforeSend: function () {

        },
        success: function (res) {

            $('#spinner').fadeIn(500);
            $('#spinner').html('<div class="alert alert-success" role="alert">แก้ไขข้อมูลเรียบร้อยแล้ว</div>');
            $('#spinner').fadeOut(3000);
            $('#cat_name').val('');
            $('#cat_memo').val('');
            $('#cat_autoid').val('');
            $('#btn_addCategory').text('เพิ่มหมวดหมู่');
            $('#btn_addCategory').removeClass("button-amber").addClass("button-dirtygreen");
            loadCategory();
            $('#tb_category').dataTable();
        }
    });
}
/////////// END Edit Category


/////////// Delete Category
function delCategory(data_id) {
    $.ajax({
        url: "/intsys/kb/main/delCategory",
        method: "POST",
        data: {
            data_id: data_id
        },
        beforeSend: function () {

        },
        success: function (res) {

            $('#spinner').fadeIn(500);
            $('#spinner').html('<div class="alert alert-danger" role="alert">ลบข้อมูลเรียบร้อยแล้ว</div>');
            $('#spinner').fadeOut(3000);
            $('#cat_name').val('');
            $('#cat_memo').val('');
            loadCategory();
            $('#tb_category').dataTable();


        }
    });
}
/////////// Delete Category



/////////////////////////////////////////////////////////////////////////
//////////// Category function
////////////////////////////////////////////////////////////////////////














/////////////////////////////////////////////////////////////////////////
//////////// Data function
////////////////////////////////////////////////////////////////////////

function loaddataByDept() {
    $.ajax({
        url: "/intsys/kb/main/loaddatabydept",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#showDataList').html(res);

            $('#dataListTable').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "10%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
            });
        }
    });
}



// Search data on listdata page
function searchListdata(search) {
    $.ajax({
        url: "/intsys/kb/main/searchlistdata",
        method: "POST",
        data: {
            search: search
        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#searchListresult').html(res);

        }
    });
}
// Search data on listdata read page
function searchListdataRead(search, deptcoderead) {
    $.ajax({
        url: "/intsys/kb/main/searchlistdata_read",
        method: "POST",
        data: {
            search: search,
            deptcoderead: deptcoderead
        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#searchListresult_read').html(res);

        }
    });
}



function loaddataByDeptRead(deptcoderead) {
    $.ajax({
        url: "/intsys/kb/main/loaddatabydept_read",
        method: "POST",
        data: {
            deptcoderead: deptcoderead
        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#showDataList_read').html(res);

            $('#dataListTable').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "10%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
            });
        }
    });
}



function loaddataWait() {
    $.ajax({
        url: "/intsys/kb/main/loaddataWait",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#loadWait').html(res);


            $('#tb_datalistWait').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 10,
                lengthMenu: [[5, 10, 20, 50, 100, 300, 500 - 1], [5, 10, 20, 50, 100, 300, 500, 'Todos']]
            });


        }
    });
}


function loaddataWaitOwner() {
    $.ajax({
        url: "/intsys/kb/main/loaddataWaitOwner",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#loadWaitOwner').html(res);


            $('#tb_datalistWaitOwner').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 10,
                lengthMenu: [[5, 10, 20, 50, 100, 300, 500 - 1], [5, 10, 20, 50, 100, 300, 500, 'Todos']]
            });


        }
    });
}






function loaddataWaitOwnerTotal() {
    $.ajax({
        url: "/intsys/kb/main/loaddataWaitOwnerTotal",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#loadWaitOwner').html(res);


            $('#tb_datalistWaitOwner').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 10,
                lengthMenu: [[5, 10, 20, 50, 100, 300, 500 - 1], [5, 10, 20, 50, 100, 300, 500, 'Todos']]
            });


        }
    });
}







function loaddataWaitOwnerPub() {
    $.ajax({
        url: "/intsys/kb/main/loaddataWaitOwnerPub",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#loadWaitOwner').html(res);


            $('#tb_datalistWaitOwner').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 10,
                lengthMenu: [[5, 10, 20, 50, 100, 300, 500 - 1], [5, 10, 20, 50, 100, 300, 500, 'Todos']]
            });


        }
    });
}






function loaddataWaitOwnerCan() {
    $.ajax({
        url: "/intsys/kb/main/loaddataWaitOwnerCan",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#loadWaitOwner').html(res);


            $('#tb_datalistWaitOwner').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 10,
                lengthMenu: [[5, 10, 20, 50, 100, 300, 500 - 1], [5, 10, 20, 50, 100, 300, 500, 'Todos']]
            });


        }
    });
}


function loaddataWaitOwnerNot() {
    $.ajax({
        url: "/intsys/kb/main/loaddataWaitOwnerNot",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#loadWaitOwner').html(res);


            $('#tb_datalistWaitOwner').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 10,
                lengthMenu: [[5, 10, 20, 50, 100, 300, 500 - 1], [5, 10, 20, 50, 100, 300, 500, 'Todos']]
            });


        }
    });
}






function approveData(data_kbno) {
    $.ajax({
        url: "/intsys/kb/main/approveData",
        method: "POST",
        data: {
            data_kbno: data_kbno
        },
        beforeSend: function () {

        },
        success: function (res) {

            $('#alertApp').fadeIn(200);
            $('#alertApp').html('<div class="alert alert-success" role="alert">รายการดังกล่าวถูกเผยแพร่ เรียบร้อยแล้ว</div>');
            $('#alertApp').fadeOut(5000);
            loaddataWait();
            location.reload();

        }
    });
}




function cancelData(kbnocan, resoncan) {
    $.ajax({
        url: "/intsys/kb/main/cancelData",
        method: "POST",
        data: {
            kbnocan: kbnocan,
            resoncan: resoncan
        },
        beforeSend: function () {

        },
        success: function (res) {

            $('#alertApp').fadeIn(200);
            $('#alertApp').html('<div class="alert alert-success" role="alert">รายการดังกล่าวถูกยกเลิก เรียบร้อยแล้ว</div>');
            $('#alertApp').fadeOut(5000);
            loaddataWait();
            location.reload();

        }
    });
}


function notApproveData(kbnocan, resoncan) {
    $.ajax({
        url: "/intsys/kb/main/notApproveData",
        method: "POST",
        data: {
            kbnocan: kbnocan,
            resoncan: resoncan
        },
        beforeSend: function () {

        },
        success: function (res) {

            $('#alertApp').fadeIn(200);
            $('#alertApp').html('<div class="alert alert-success" role="alert">รายการดังกล่าวถูกยกเลิก เรียบร้อยแล้ว</div>');
            $('#alertApp').fadeOut(5000);
            loaddataWait();
            location.reload();

        }
    });
}


function controlByPermission() {
    $.ajax({
        url: "/intsys/kb/main/getPermission",
        method: "POST",
        data: {

        },
        dataType: "json",
        beforeSend: function () {

        },
        success: function (res) {


            for (let i = 0; i < res.length; i++) {
                pergname = res[i].perg_name;
                pergApp = res[i].perg_approve_data;
            }
            if (pergname === "admin" || pergname === "superuser" || pergname === "manager") {
                if (pergApp === 1) {
                    $('#checkDataBtn').css('display', '');
                }

            }
        }
    });
}


// function loaddataByDeptByCat(catcode)
// {
//     $.ajax({
//         url:"/intsys/kb/main/loaddatabydeptbycat",
//         method:"POST",
//         data:{
//             catcode:catcode
//         },
//         beforeSend:function(){

//         },
//         success:function(res){
//             $('#showDataListByCat').html(res);
//             console.log(res);
//             $('#dataListByCatTable').dataTable({
//                 "ordering": false,
//                 pageLength : 10,
//                 lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
//             });
//         }
//     });
// }


/////////////////////////////////////////////////////////////////////////
//////////// Data function
////////////////////////////////////////////////////////////////////////














/////////////////////////////////////////////////////////////////////////
//////////// Comment function
////////////////////////////////////////////////////////////////////////

function saveComment() {
    $.ajax({
        url: "/intsys/kb/main/savecomment",
        method: "POST",
        data: $('#frm_comment').serialize(),
        success: function (res) {

            $('#rt_star').val('');
            $('#rt_comment').val('');
            if (res == "Insert fail") {
                // alert('คุณได้ทำการให้คะแนนรายการดังกล่าวไปแล้วไม่สามารถให้คะแนนซ้ำอีกได้');
            } else {
                $('#alrtComment').html('<div class="alert alert-success" role="alert">บันทึกข้อมูล เรียบร้อยแล้ว</div>');
            }
            location.reload();
        }
    });
}


function loadComment(kbno) {
    $.ajax({
        url: "/intsys/kb/main/loadcomment",
        method: "POST",
        data: {
            kbno: kbno
        },
        success: function (res) {
            $('#show_comment').html(res);

        }
    });
}



function saveReply() 
{
    $.ajax({
        url: "/intsys/kb/main/saveReply",
        method: "POST",
        data: $('#frm_reply').serialize(),
        success: function (res) {
            console.log(res);
            if(res == "บันทึกสำเร็จ"){
                location.reload();
            }
        }
    });
}

/////////////////////////////////////////////////////////////////////////
//////////// Comment function
////////////////////////////////////////////////////////////////////////











/////////////////////////////////////////////////////////////////////////
//////////// Index page function load data
////////////////////////////////////////////////////////////////////////
function loadToptenDataList() {
    $.ajax({
        url: "/intsys/kb/main/loadToptenData",
        method: "POST",
        data: {

        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#showDataToptenList').html(res);

            $('#tbl_toptenlist').dataTable({
                columnDefs: [
                    { "width": "15%", "targets": 0 },
                    { "width": "15%", "targets": 2 },
                ],
                "ordering": false,
                pageLength: 10,
                lengthMenu: [[5, 10, 20, 50, 100, 300, 500 - 1], [5, 10, 20, 50, 100, 300, 500, 'Todos']]
            });
        }
    });
}



function searchIndex(search) {
    $.ajax({
        url: "/intsys/kb/main/searchindex",
        method: "POST",
        data: {
            search: search
        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#searchresult').html(res);

        }
    });
}




/////////////////////////////////////////////////////////////////////////
//////////// Index page function load data
////////////////////////////////////////////////////////////////////////










/////////////////////////////////////////////////////////////////////////
//////////// Edit page
////////////////////////////////////////////////////////////////////////

function getFileEdit(kbno) {
    $.ajax({
        url: "/intsys/kb/main/loadFileEdit",
        method: "POST",
        data: {
            kbno: kbno
        },
        beforeSend: function () {

        },
        success: function (res) {
            $('#showOldFile').html(res);
        }
    });
}


/////////////////////////////////////////////////////////////////////////
//////////// Edit page
////////////////////////////////////////////////////////////////////////