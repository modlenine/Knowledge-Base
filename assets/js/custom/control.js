$(document).ready(function () {

    /////////////////////////////////////////////////////////////////////////
    //////////// Main property and Main code
    ////////////////////////////////////////////////////////////////////////
    // Control page active
    let checkpage = $('#checkpage').val();
    if (checkpage == "addpage.html") {
        $('#m_add').addClass("current");
    } else if (checkpage == "") {
        $('#m_home').addClass("current");
    }

    /////////////////////////////////////////////////////////////////////////
    //////////// Main property and Main code
    ////////////////////////////////////////////////////////////////////////









    /////////////////////////////////////////////////////////////////////////
    //////////// Control Button
    ////////////////////////////////////////////////////////////////////////

    $('#md_close_cat').click(function () {
        location.reload();
    });

    /////////////////////////////////////////////////////////////////////////
    //////////// Control Button
    ////////////////////////////////////////////////////////////////////////








    /////////////////////////////////////////////////////////////////////////
    //////////// Control Permission
    ////////////////////////////////////////////////////////////////////////
    $('#waitOwner').click(function () {
        loaddataWaitOwner();
    });

    $('#pubOwner').click(function () {
        loaddataWaitOwnerPub();
    });

    $('#canOwner').click(function () {
        loaddataWaitOwnerCan();
    });

    $('#notAppOwner').click(function () {
        loaddataWaitOwnerNot();
    });

    $('#totalOwner').click(function () {
        loaddataWaitOwnerTotal();
    });



    controlByPermission();

    /////////////////////////////////////////////////////////////////////////
    //////////// Control Permission
    ////////////////////////////////////////////////////////////////////////















    /////////////////////////////////////////////////////////////////////////
    //////////// listdata.html
    ////////////////////////////////////////////////////////////////////////
    if (checkpage === "listdata.html") {

        ////////// Load data list by dept //////////
        loaddataByDept();
        loaddataWait();
        ////////// Load data list by dept //////////



        ///////// Control search //////////
        $('#deptSearch').keyup(function () {
            let search = $(this).val();
            if ($(this).val() != "") {
                searchListdata(search);
            } else {
                $('#searchListresult').html('');
            }
        });
        $(document).on('click', '#searchRsDept', function () {
            let data_href = $(this).attr("data_href");
            $('#deptSearch').val('');
            window.location.href = data_href;
        });
        ///////// Control search //////////



        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////
        $(document).on('click', '#appBtn', function () {
            let data_kbno = $(this).attr("data_kbno");
            approveData(data_kbno);
        });

        $(document).on('click', '#appBtnCancel', function () {
            let data_kbno2 = $(this).attr("data_kbno");
            $('#check_kbno').val(data_kbno2);
        });

        $(document).on('click', '#notAppBtn', function () {
            let data_kbno2 = $(this).attr("data_kbno");
            let data_action = $(this).attr("data_action");
            $('#check_kbno').val(data_kbno2);
            $('#checkaction').val(data_action);
        });

        $(document).on('click', '#btnCancelPub', function () {
            let kbnocan = $('#check_kbno').val();
            let resoncan = $('#resonOfCalcel').val();
            let checkaction = $('#checkaction').val();

            if(resoncan == ''){
                alert('กรุณาระบบเหตุผลในการยกเลิกการเผยแพร่ด้วยค่ะ');
                $('#resondiv').css('border' , 'solid 1px red');
                return false;
            }else{
                if(checkaction == "notapprove"){
                    notApproveData(kbnocan,resoncan)
                }else{
                    cancelData(kbnocan,resoncan);
                }
                
            }
        });



        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////









        ///////////////////////////////////////////
        ////////// Control Category
        //////////////////////////////////////////

        $('#kb_category').change(function () {
            let catname = $('#kb_category option:selected').text();
            let catcode = $('#kb_category option:selected').val();

            $('#kb_catname').val(catname);
            $('#kb_catcode').val(catcode);
        });
        // Control Category
        // Control add Category Button
        loadCategory();
        $('#btn_addCategory').click(function () {
            if ($(this).text() == "แก้ไขหมวดหมู่") {
                let data_id = $('#cat_autoid').val();
                let data_catname = $('#cat_name').val();
                let data_catmemo = $('#cat_memo').val();
                editCategory(data_id, data_catname, data_catmemo);
            } else {
                addCategory();
            }

        });

        $(document).on('click', '#catEdit', function () {
            let data_id = $(this).attr("data_id");
            let data_catname = $(this).attr("data_catname");
            let data_catmemo = $(this).attr("data_catmemo");

            $('#cat_autoid').val(data_id);
            $('#cat_name').val(data_catname);
            $('#cat_memo').val(data_catmemo);
            $('#btn_addCategory').text("แก้ไขหมวดหมู่");
            $('#btn_addCategory').removeClass("button-dirtygreen").addClass("button-amber");
        });

        $(document).on('click', '#catDel', function () {
            let data_id = $(this).attr("data_id");
            let cf = confirm('คุณต้องการลบรายการนี้ใช่หรือไม่');
            if (cf == true) {
                delCategory(data_id);
            }
        });
        // Control Category
        ///////////////////////////////////////////
        ////////// Control Category
        //////////////////////////////////////////



    }
    /////////////////////////////////////////////////////////////////////////
    //////////// listdata.html
    ////////////////////////////////////////////////////////////////////////























    /////////////////////////////////////////////////////////////////////////
    //////////// listdata_guest.html
    ////////////////////////////////////////////////////////////////////////
    if (checkpage === "listdata_guest.html") {

        ////////// Load data list by dept //////////
        let checkdept_readonly = $('#checkdept_readonly').val();
        loaddataByDeptRead(checkdept_readonly);
        ////////// Load data list by dept //////////



        ///////// Control search //////////
        $('#deptSearch_read').keyup(function () {
            let search = $(this).val();
            let checkdept_readonly = $('#checkdept_readonly').val();
            if ($(this).val() != "") {
                searchListdataRead(search ,checkdept_readonly);
            } else {
                $('#searchListresult_read').html('');
            }
        });
        $(document).on('click', '#searchRsDept_read', function () {
            let data_href = $(this).attr("data_href");
            $('#deptSearch_read').val('');
            window.location.href = data_href;
        });
        ///////// Control search //////////



        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////
        $(document).on('click', '#appBtn', function () {
            let data_kbno = $(this).attr("data_kbno");
            approveData(data_kbno);
        });

        $(document).on('click', '#appBtnCancel', function () {
            let data_kbno2 = $(this).attr("data_kbno");
            cancelData(data_kbno2);
        });



        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////









        ///////////////////////////////////////////
        ////////// Control Category
        //////////////////////////////////////////

        $('#kb_category').change(function () {
            let catname = $('#kb_category option:selected').text();
            let catcode = $('#kb_category option:selected').val();

            $('#kb_catname').val(catname);
            $('#kb_catcode').val(catcode);
        });
        // Control Category
        // Control add Category Button
        loadCategory();
        $('#btn_addCategory').click(function () {
            if ($(this).text() == "แก้ไขหมวดหมู่") {
                let data_id = $('#cat_autoid').val();
                let data_catname = $('#cat_name').val();
                let data_catmemo = $('#cat_memo').val();
                editCategory(data_id, data_catname, data_catmemo);
            } else {
                addCategory();
            }

        });

        $(document).on('click', '#catEdit', function () {
            let data_id = $(this).attr("data_id");
            let data_catname = $(this).attr("data_catname");
            let data_catmemo = $(this).attr("data_catmemo");

            $('#cat_autoid').val(data_id);
            $('#cat_name').val(data_catname);
            $('#cat_memo').val(data_catmemo);
            $('#btn_addCategory').text("แก้ไขหมวดหมู่");
            $('#btn_addCategory').removeClass("button-dirtygreen").addClass("button-amber");
        });

        $(document).on('click', '#catDel', function () {
            let data_id = $(this).attr("data_id");
            let cf = confirm('คุณต้องการลบรายการนี้ใช่หรือไม่');
            if (cf == true) {
                delCategory(data_id);
            }
        });
        // Control Category
        ///////////////////////////////////////////
        ////////// Control Category
        //////////////////////////////////////////



    }
    /////////////////////////////////////////////////////////////////////////
    //////////// listdata.html
    ////////////////////////////////////////////////////////////////////////


















    /////////////////////////////////////////////////////////////////////////
    //////////// listdatabycat.html
    ////////////////////////////////////////////////////////////////////////
    if (checkpage === "listdatabycat.html") {
        // let catcode = $('#checkcatcode').val();
        // loaddataByDeptByCat(catcode);
        $('#kb_category').change(function () {
            let catname = $('#kb_category option:selected').text();
            let catcode = $('#kb_category option:selected').val();

            $('#kb_catname').val(catname);
            $('#kb_catcode').val(catcode);
        });


        loaddataWait();
        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////
        $(document).on('click', '#appBtn', function () {
            let data_kbno = $(this).attr("data_kbno");
            approveData(data_kbno);
        });

        $(document).on('click', '#appBtnCancel', function () {
            let data_kbno2 = $(this).attr("data_kbno");
            cancelData(data_kbno2);
        });

        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////







        ///////////////////////////////////////////
        ////////// Control Category
        //////////////////////////////////////////
        // Set default category
        $('#add_datamenubar').click(function () {
            let data_catcode = $(this).attr("data_catcode");
            let data_catname = $(this).attr("data_catname");
            $('#getCatcode').val(data_catcode);

            $('#kb_category option:selected').text(data_catname).val(data_catcode);
            $('#kb_catname').val(data_catname);
            $('#kb_catcode').val(data_catcode);
        });

        $('#kb_category').change(function () {
            let catname = $('#kb_category option:selected').text();
            let catcode = $('#kb_category option:selected').val();

            $('#kb_catname').val(catname);
            $('#kb_catcode').val(catcode);
        });
        // Control Category
        // Control add Category Button
        loadCategory();
        $('#btn_addCategory').click(function () {
            if ($(this).text() == "แก้ไขหมวดหมู่") {
                let data_id = $('#cat_autoid').val();
                let data_catname = $('#cat_name').val();
                let data_catmemo = $('#cat_memo').val();
                editCategory(data_id, data_catname, data_catmemo);
            } else {
                addCategory();
            }

        });

        $(document).on('click', '#catEdit', function () {
            let data_id = $(this).attr("data_id");
            let data_catname = $(this).attr("data_catname");
            let data_catmemo = $(this).attr("data_catmemo");

            $('#cat_autoid').val(data_id);
            $('#cat_name').val(data_catname);
            $('#cat_memo').val(data_catmemo);
            $('#btn_addCategory').text("แก้ไขหมวดหมู่");
            $('#btn_addCategory').removeClass("button-dirtygreen").addClass("button-amber");
        });

        $(document).on('click', '#catDel', function () {
            let data_id = $(this).attr("data_id");
            let cf = confirm('คุณต้องการลบรายการนี้ใช่หรือไม่');
            if (cf == true) {
                delCategory(data_id);
            }
        });
        // Control Category
        ///////////////////////////////////////////
        ////////// Control Category
        //////////////////////////////////////////



    }


    /////////////////////////////////////////////////////////////////////////
    //////////// listdatabycat.html
    ////////////////////////////////////////////////////////////////////////














    /////////////////////////////////////////////////////////////////////////
    //////////// viewdata.html
    ////////////////////////////////////////////////////////////////////////
    if (checkpage == "viewdata.html") {


        loaddataWait();
        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////
        $(document).on('click', '#appBtn', function () {
            let data_kbno = $(this).attr("data_kbno");
            approveData(data_kbno);
        });

        $(document).on('click', '#appBtnCancel', function () {
            let data_kbno2 = $(this).attr("data_kbno");
            cancelData(data_kbno2);
        });
        ///////////////////////////////////////////
        ////////// Control approve btn
        //////////////////////////////////////////




        ///////////////////////////////////////////
        ////////// Control modal edit data
        //////////////////////////////////////////

        $('#editdata').click(function () {
            let data_kb_no = $(this).attr("data_kb_no");
            let data_kb_userpost = $(this).attr("data_kb_userpost");
            let data_kb_ecodepost = $(this).attr("data_kb_ecodepost");
            let data_kb_deptnamepost = $(this).attr("data_kb_deptnamepost");
            let data_kb_emailpost = $(this).attr("data_kb_emailpost");
            let data_kb_title = $(this).attr("data_kb_title");
            let data_kb_category = $(this).attr("data_kb_category");
            let data_kb_catcode = $(this).attr("data_kb_catcode");
            let data_kb_detail = $(this).attr("data_kb_detail");
            let data_kb_cause = $(this).attr("data_kb_cause");
            let data_kb_action = $(this).attr("data_kb_action");
            let data_kb_conclusion = $(this).attr("data_kb_conclusion");

            $('#kb_userpostE').val(data_kb_userpost);
            $('#kb_ecodepostE').val(data_kb_ecodepost);
            $('#kb_deptnamepostE').val(data_kb_deptnamepost);
            $('#kb_deptcodepostE').val();
            $('#kb_emailpostE').val(data_kb_emailpost);
            $('#kb_titleE').val(data_kb_title);
            $('#kb_categoryE option:selected').text(data_kb_category).val(data_kb_catcode);
            $('#kb_catnameE').val(data_kb_category);
            $('#kb_catcodeE').val(data_kb_catcode);
            $('#kb_detailE').val(data_kb_detail);
            $('#kb_causeE').val(data_kb_cause);
            $('#kb_actionE').val(data_kb_action);
            $('#kb_conclusionE').val(data_kb_conclusion);
            $('#mdtitle').text('แก้ไขรายการ ' + data_kb_no);
            $("#kbcodeE").val(data_kb_no);

            getFileEdit(data_kb_no);

            $('#kb_categoryE').change(function () {
                let catname = $('#kb_categoryE option:selected').text();
                let catcode = $('#kb_categoryE option:selected').val();

                $('#kb_catnameE').val(catname);
                $('#kb_catcodeE').val(catcode);
            });

        });

        ///////////////////////////////////////////
        ////////// Control modal edit data
        //////////////////////////////////////////





        ///////////////////////////////////////////
        ////////// Control comment section
        //////////////////////////////////////////

if($('#checkEcodeV').val() == $('#checkecode').val()){
    $('#commentzone').css('display' , 'none');
}else{
    $('#commentzone').css('display' , '');
}

        ///////////////////////////////////////////
        ////////// Control comment section
        //////////////////////////////////////////






    }


    /////////////////////////////////////////////////////////////////////////
    //////////// viewdata.html
    ////////////////////////////////////////////////////////////////////////



















    /////////////////////////////////////////////////////////////////////////
    //////////// viewdata_read.html
    ////////////////////////////////////////////////////////////////////////


    if (checkpage == "viewdata_read.html") {
        // Control comment button
        let rt_kbnocom = $('#rt_kbno').val();
        loadComment(rt_kbnocom);
        $('#rt_submit').click(function () {
            if ($('#rt_star').val() == "") {
                $('#boxstar').css('border', '1px solid red');
                alert('กรุณาเลือกคะแนนที่ท่านต้องการด้วยค่ะ');
            } else {
                $('#boxstar').css('border', '1px solid green');
            }

            if ($('#rt_comment').val() == "") {
                $('#boxcomment').css('border', '1px solid red');
                alert('กรุณาแสดงความคิดเห็นประกอบด้วยค่ะ');
            } else {
                $('#boxcomment').css('border', '1px solid green');
            }

            if ($('#rt_star').val() != "" && $('#rt_comment').val() != "") {
                saveComment();
            }
            // saveComment();
        });
    }


    /////////////////////////////////////////////////////////////////////////
    //////////// viewdata_read.html
    ////////////////////////////////////////////////////////////////////////









    /////////////////////////////////////////////////////////////////////////
    //////////// index.html
    ////////////////////////////////////////////////////////////////////////
    if (checkpage == "") {
        loadToptenDataList();

        $('#indexSearch').keyup(function () {
            let search = $(this).val();
            if ($(this).val() != "") {
                searchIndex(search);
            } else {
                $('#searchresult').html('');
            }
        });

        $(document).on('click', '#searchRs', function () {
            let data_href = $(this).attr("data_href");
            $('#indexSearch').val('');
            window.location.href = data_href;
        });

    }






    /////////////////////////////////////////////////////////////////////////
    //////////// index.html
    ////////////////////////////////////////////////////////////////////////













    // Control user menu topbar
    if ($('#checkecode') != "") {
        $('#loginalready').css('display', '');
        $('#nonelogin').css('display', 'none');
    } else {
        $('#loginalready').css('display', 'none');
        $('#nonelogin').css('display', '');
    }
    // Control user menu topbar









});
// End ready function