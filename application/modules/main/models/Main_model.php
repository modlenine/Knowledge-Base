<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/Bangkok");
    }




    /////////////////////////////////////////////////////////////////////////
    //////////// Data Zone
    ////////////////////////////////////////////////////////////////////////

    /////////// Save add data
    public function savedata()
    {
        $getformno = getFormNo();
        if ($this->input->post("kb_submit")) {

            $savedata = array(
                "kb_no" => $getformno,
                "kb_title" => $this->input->post("kb_title"),
                "kb_category" => $this->input->post("kb_catname"),
                "kb_categorycode" => $this->input->post("kb_catcode"),
                "kb_detail" => $this->input->post("kb_detail"),
                "kb_cause" => $this->input->post("kb_cause"),
                "kb_action" => $this->input->post("kb_action"),
                "kb_conclusion" => $this->input->post("kb_conclusion"),
                "kb_userpost" => $this->input->post("kb_userpost"),
                "kb_ecodepost" => $this->input->post("kb_ecodepost"),
                "kb_deptnamepost" => $this->input->post("kb_deptnamepost"),
                "kb_deptcodepost" => $this->input->post("kb_deptcodepost"),
                "kb_emailpost" => $this->input->post("kb_emailpost"),
                "kb_datetime" => date("Y-m-d H:i:s"),
                "kb_status" => "รอตรวจสอบ"
            );


            // Upload file Zone
            $file_name = $_FILES['kb_files']['name'];
            $fileno = 1;
            foreach ($file_name as $key => $value) {
                if ($_FILES['kb_files']['tmp_name'][$key] != "") {
                    $time = date("H-i-s"); //ดึงเวลามาก่อน

                    $filename_type = substr($value, -4);
                    $file_name_date = substr_replace($value,  $getformno . "-" . $time . "-" . $fileno . $filename_type, 0);
                    // Upload file
                    $file_tmp = $_FILES['kb_files']['tmp_name'][$key];
                    move_uploaded_file($file_tmp, "upload/" . $file_name_date);

                    $arfiles = array(
                        "file_name" => $file_name_date,
                        "file_kbno" => $getformno
                    );
                    $this->db->insert("kb_files", $arfiles);
                    $fileno++;
                } else {
                    echo "ไม่พบไฟล์แนบ";
                }
            }
            // Upload file Zone

            if ($this->db->insert("kb_main", $savedata)) {
                getUserAgent("เพิ่มรายการใหม่",$getformno);
                return true;
            } else {
                return false;
            }
        } else {
            echo "ยังไม่ได้กดปุ่มเข้ามา";
        }
    }
    /////////// Save add data







    /////////// Save add data
    public function saveEditData()
    {
        $kbcode = $this->input->post("kbcodeE");
        if ($this->input->post("kb_submit")) {

            $editdata = array(
                "kb_title" => $this->input->post("kb_title"),
                "kb_category" => $this->input->post("kb_catname"),
                "kb_categorycode" => $this->input->post("kb_catcode"),
                "kb_detail" => $this->input->post("kb_detail"),
                "kb_cause" => $this->input->post("kb_cause"),
                "kb_action" => $this->input->post("kb_action"),
                "kb_conclusion" => $this->input->post("kb_conclusion"),

                "kb_datetime_modify" => date("Y-m-d H:i:s"),
                "kb_status" => "รอตรวจสอบ"
            );


            // Upload file Zone
            $file_name = $_FILES['kb_files']['name'];
            $fileno = 1;
            if ($_FILES['kb_files']['tmp_name'] != ""){
                // ลบไฟล์ออกก่อน
                $this->db->where("file_kbno" , $kbcode);
                $this->db->delete("kb_files");
            }
            foreach ($file_name as $key => $value) {
                if ($_FILES['kb_files']['tmp_name'][$key] != "") {


                    $time = date("H-i-s"); //ดึงเวลามาก่อน

                    $filename_type = substr($value, -4);
                    $file_name_date = substr_replace($value,  $kbcode . "-" . $time . "-" . $fileno . $filename_type, 0);
                    // Upload file
                    $file_tmp = $_FILES['kb_files']['tmp_name'][$key];
                    move_uploaded_file($file_tmp, "upload/" . $file_name_date);

                    $arfiles = array(
                        "file_name" => $file_name_date,
                        "file_kbno" => $kbcode
                    );
                    $this->db->insert("kb_files", $arfiles);
                    $fileno++;
                } else {
                    echo "ไม่พบไฟล์แนบ";
                }
            }
            // Upload file Zone

            $this->db->where("kb_no" , $kbcode);
            if ($this->db->update("kb_main", $editdata)) {
                getUserAgent("แก้ไขรายการ $kbcode เรียบร้อยแล้ว",$kbcode);
                return true;
            } else {
                return false;
            }
        } else {
            echo "ยังไม่ได้กดปุ่มเข้ามา";
        }
    }
    /////////// Save add data











    // Load ข้อมูลตามหมวดหมู่ของหน่วยงานนั้นๆ แบบ Server side
    // Function สำหรับ ดึงข้อมูลใส่ Data table แบบ Server side
    // List data zone
    public function dataByCatelist($catcode)
    {

        // DB table to use
        $table = 'kb_main';
        // $table = <<<EOT
        // (
        //     select * from listdefault
        // )temp
        // EOT;

        // Table's primary key
        $primaryKey = 'kb_autoid';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes

        $columns = array(
            array(
                'db' => 'kb_no', 'dt' => 0,
                'formatter' => function ($d, $row) {
                    $ecodepost = getDataByKbcode($d)->kb_ecodepost;
                    return '
                    <div class="text-center userPostFont">
                    <img src="' . linkImg(getImageUserPost($ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                    <span>' . getDataByKbcode($d)->kb_userpost . '</span>
                    <span>' . getDataByKbcode($d)->kb_ecodepost . '</span><br>
                    <span>' . conDateTimeFromDb(getDataByKbcode($d)->kb_datetime) . '</span>
                    </div>'; //or any other format you require
                }
            ),
            array(
                'db' => 'kb_no', 'dt' => 1,
                'formatter' => function ($d, $row) {
                    $strtitle = iconv_substr(getDataByKbcode($d)->kb_title, 0, 120, "UTF-8");
                    $resultTitleCut = $strtitle . "...";

                    if (checkFilesByKbcode($d) > 0) {
                        $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
                    } else {
                        $icon = '';
                    }
                    return '
                    <b><a href="' . base_url('viewdata.html/') . $d . '">' . $resultTitleCut . " " . $icon . '</a></b><br>
                    <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . getDataByKbcode($d)->kb_categorycode . '">' . getDataByKbcode($d)->kb_category . '</a></span>
                    '; //or any other format you require
                }
            ),
            array(
                'db' => 'kb_hit', 'dt' => 2,
                'formatter' => function ($d, $row) {
                    return '
                    <span>ผู้เข้าชม : ' . $d . '</span><br>
    
                    ';
                }
            )
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        $deptcode = getUser()->DeptCode;

        // if (getUser()->ecode == "M1848" || getUser()->ecode == "M0051" || getUser()->ecode == "M0112") {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else if (getUser()->posi > 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // }


        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "kb_deptcodepost = '$deptcode' AND kb_categorycode = '$catcode' AND kb_status = 'เผยแพร่' ")
        );
    }
    // Function สำหรับ ดึงข้อมูลใส่ Data table แบบ Server side









    // Load ข้อมูลตามหมวดหมู่ของหน่วยงานนั้นๆ แบบ Server side
    // Function สำหรับ ดึงข้อมูลใส่ Data table แบบ Server side
    // List data zone
    public function dataByCatelist_read($catcode, $deptcode)
    {

        // DB table to use
        $table = 'kb_main';
        // $table = <<<EOT
        // (
        //     select * from listdefault
        // )temp
        // EOT;

        // Table's primary key
        $primaryKey = 'kb_autoid';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes

        $columns = array(
            array(
                'db' => 'kb_no', 'dt' => 0,
                'formatter' => function ($d, $row) {
                    $ecodepost = getDataByKbcode($d)->kb_ecodepost;
                    return '
                    <div class="text-center userPostFont">
                    <img src="' . linkImg(getImageUserPost($ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                    <span>' . getDataByKbcode($d)->kb_userpost . '</span>
                    <span>' . getDataByKbcode($d)->kb_ecodepost . '</span><br>
                    <span>' . conDateTimeFromDb(getDataByKbcode($d)->kb_datetime) . '</span>
                    </div>'; //or any other format you require
                }
            ),
            array(
                'db' => 'kb_no', 'dt' => 1,
                'formatter' => function ($d, $row) {
                    $strtitle = iconv_substr(getDataByKbcode($d)->kb_title, 0, 120, "UTF-8");
                    $resultTitleCut = $strtitle . "...";

                    if (checkFilesByKbcode($d) > 0) {
                        $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
                    } else {
                        $icon = '';
                    }
                    return '
                    <b><a href="' . base_url('viewdata_read.html/') . $d . '">' . $resultTitleCut . " " . $icon . '</a></b><br>
                    <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . getDataByKbcode($d)->kb_categorycode . '">' . getDataByKbcode($d)->kb_category . '</a></span>
                    '; //or any other format you require
                }
            ),
            array(
                'db' => 'kb_hit', 'dt' => 2,
                'formatter' => function ($d, $row) {
                    return '
                    <span>ผู้เข้าชม : ' . $d . '</span><br>
    
                    ';
                }
            )
        );

        // SQL server connection information
        $sql_details = array(
            'user' => getDb()->db_username,
            'pass' => getDb()->db_password,
            'db'   => getDb()->db_databasename,
            'host' => getDb()->db_host
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        require('server-side/scripts/ssp.class.php');

        $ecode = getUser()->ecode;
        // $deptcode = getUser()->DeptCode;

        // if (getUser()->ecode == "M1848" || getUser()->ecode == "M0051" || getUser()->ecode == "M0112") {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else if (getUser()->posi > 75) {
        //     echo json_encode(
        //         SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        //     );
        // } else {
        //     echo json_encode(
        //         SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "m_owner = '$ecode' ")
        //     );
        // }


        echo json_encode(
            SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "kb_deptcodepost = '$deptcode' AND kb_categorycode = '$catcode' AND kb_status = 'เผยแพร่' ")
        );
    }
    // Function สำหรับ ดึงข้อมูลใส่ Data table แบบ Server side














    public function approveData()
    {
        $data_kbno = '';

        $data_kbno = $this->input->post("data_kbno");
        $arUpdateStatus = array(
            "kb_status" => "เผยแพร่",
            "kb_datetimeapp" => date("Y-m-d H:i:s"),
            "kb_userapp" => getUser()->Fname . " " . getUser()->Lname,
            "kb_ecodeapp" => getUser()->ecode,
            "kb_deptcodeapp" => getUser()->DeptCode
        );
        $this->db->where("kb_no", $data_kbno);
        $this->db->update("kb_main", $arUpdateStatus);
        return true;
    }


    public function cancelData()
    {

        $data_kbno = '';
        $data_resoncan = '';

        $data_kbno = $this->input->post("kbnocan");
        $data_resoncan = $this->input->post("resoncan");

        $arUpdateStatus = array(
            "kb_status" => "ยกเลิกการเผยแพร่",
            "kb_datetimeapp" => date("Y-m-d H:i:s"),
            "kb_userapp" => getUser()->Fname . " " . getUser()->Lname,
            "kb_ecodeapp" => getUser()->ecode,
            "kb_deptcodeapp" => getUser()->DeptCode,
            "kb_cancel_memo" => $data_resoncan
        );
        $this->db->where("kb_no", $data_kbno);
        $this->db->update("kb_main", $arUpdateStatus);
    }


    public function notApproveData()
    {

        $data_kbno = '';
        $data_resoncan = '';

        $data_kbno = $this->input->post("kbnocan");
        $data_resoncan = $this->input->post("resoncan");

        $arUpdateStatus = array(
            "kb_status" => "ไม่อนุมัติรายการ",
            "kb_datetimeapp" => date("Y-m-d H:i:s"),
            "kb_userapp" => getUser()->Fname . " " . getUser()->Lname,
            "kb_ecodeapp" => getUser()->ecode,
            "kb_deptcodeapp" => getUser()->DeptCode,
            "kb_cancel_memo" => $data_resoncan
        );
        $this->db->where("kb_no", $data_kbno);
        $this->db->update("kb_main", $arUpdateStatus);
    }


    /////////////////////////////////////////////////////////////////////////
    //////////// Data Zone
    ////////////////////////////////////////////////////////////////////////








    /////////////////////////////////////////////////////////////////////////
    //////////// Category Zone
    ////////////////////////////////////////////////////////////////////////

    // Category Zone
    public function saveCategory()
    {
        $catname = $this->input->post("cat_name");
        $deptcode = getUser()->DeptCode;
        if(checkDubCate($catname , $deptcode) == true){
            if($catname != ""){
                $arSaveCategory = array(
                    "cat_name" => $this->input->post("cat_name"),
                    "cat_deptcode" => getUser()->DeptCode,
                    "cat_memo" => $this->input->post("cat_memo"),
                    "cat_usercreate" => getUser()->Fname . " " . getUser()->Lname,
                    "cat_ecodecreate" => getUser()->ecode,
                    "cat_datetimecreate" => date("Y-m-d H:i:s")
                );
                if ($this->db->insert("kb_category", $arSaveCategory)) {
                    echo "บันทึกสำเร็จ";
                } else {
                    echo "บันทึกไม่สำเร็จ";
                }
            }else{
                echo "ไม่ได้กรอกชื่อหมวดหมู่";
            }
            

        }else{
            echo "พบข้อมูลซ้ำ";
        }
        
    }
    public function editCategory()
    {
        $data_id = '';
        $data_catname = '';
        $data_catmemo = '';
        if ($this->input->post("data_id")) {
            $data_id = $this->input->post("data_id");
            $data_catname = $this->input->post("data_catname");
            $data_catmemo = $this->input->post("data_catmemo");

            $arEditCat = array(
                "cat_name" => $data_catname,
                "cat_memo" => $data_catmemo
            );

            $this->db->where("cat_autoid", $data_id);
            $this->db->update("kb_category", $arEditCat);
        }
    }

    public function delCategory()
    {
        $data_id = '';
        if ($this->input->post("data_id")) {
            $data_id = $this->input->post("data_id");

            $this->db->where("cat_autoid", $data_id);
            $this->db->delete("kb_category");

            return true;
        }
    }
    // Category Zone    
    /////////////////////////////////////////////////////////////////////////
    //////////// Category Zone
    ////////////////////////////////////////////////////////////////////////












    /////////////////////////////////////////////////////////////////////////
    //////////// PERMISSION ZONE
    ////////////////////////////////////////////////////////////////////////
    public function getPermission()
    {
        $userPerg = getUserPerGroup(getUser()->ecode);
        getPermissionRule($userPerg);
    }
    /////////////////////////////////////////////////////////////////////////
    //////////// PERMISISON ZONE
    ////////////////////////////////////////////////////////////////////////











    /////////////////////////////////////////////////////////////////////////
    //////////// COMMENT ZONE
    ////////////////////////////////////////////////////////////////////////

public function saveRating()
{
    $arComment = array(
        // "rt_comment" => $this->input->post("rt_comment"),
        "rt_star" => $this->input->post("rt_star"),
        "rt_kbno" => $this->input->post("rt_kbno"),
        "rt_userpost" => getUser()->Fname." ".getUser()->Lname,
        "rt_ecodepost" => getUser()->ecode,
        "rt_datetime" => date("Y-m-d H:i:s")
    );

    if($this->db->insert("kb_rating",$arComment)){
        echo "Insert success";
    }

    
}

public function saveComment()
{
    $arComment = array(
        "cm_text" => $this->input->post("rt_comment"),
        // "rt_star" => $this->input->post("rt_star"),
        "cm_kbno" => $this->input->post("rt_kbno"),
        "cm_user" => getUser()->Fname." ".getUser()->Lname,
        "cm_ecode" => getUser()->ecode,
        "cm_datetime" => date("Y-m-d H:i:s")
    );

    if($this->db->insert("kb_comment",$arComment)){
        echo "Insert success";
    }

    
}

public function loadcomment()
{
    $kbno = "";

    $kbno = $this->input->post("kbno");
    $sql = $this->db->query("SELECT 
    rt_comment , 
    rt_star , 
    rt_kbno , 
    rt_userpost , 
    rt_ecodepost , 
    rt_datetime 
    FROM kb_rating 
    WHERE rt_kbno = '$kbno' 
    ORDER BY rt_autoid DESC ");

    $output = '';

    foreach($sql->result() as $rs){
        $output .= '
        <div class="card">
                <div class="card-body p-3" style="background-color:#FFFFCC;">
                    <div class="row">
                        <div class="col-md-8">
                            '.$rs->rt_comment.'
                        </div>
                        <div class="col-lg-4 text-center">
                        <img src="' . linkImg(getImageUserPost($rs->rt_ecodepost)) . '" class="img-thumbnail sizeImage"><br>
                        '.$rs->rt_userpost.'&nbsp;'.conDatetimeFromDb($rs->rt_datetime).'
                        </div>
                    </div>

                    


                </div>
            </div><br>
        ';
    }
    echo $output;
}




public function saveReply()
{
    $arReply = array(
        "cm_cmid" => $this->input->post("cm_cmid"),
        "cm_reply" => $this->input->post("reply_text"),
        "cm_kbno" => $this->input->post("cm_kbno"),
        "cm_user" => getUser()->Fname." ".getUser()->Lname,
        "cm_ecode" => getUser()->ecode,
        "cm_datetime" => date("Y-m-d H:i:s")
    );
    if($this->db->insert("kb_comment" , $arReply)){
        echo "บันทึกสำเร็จ";
    }else{
        echo "บันทึกไม่สำเร็จ";
    }
}

    /////////////////////////////////////////////////////////////////////////
    //////////// COMMENT ZONE
    ////////////////////////////////////////////////////////////////////////











    /////////////////////////////////////////////////////////////////////////
    //////////// Index page
    ////////////////////////////////////////////////////////////////////////

    public function loadToptenData()
    {
        toptenlist();
    }

    public function searchindex()
    {
        $searchText = '';

        $searchText = $this->input->post("search");
        $idArr = explode(" ", $searchText);
        $context = " CONCAT(kb_no,' ',
        kb_title,' ',
        kb_detail,' ',
        kb_cause,' ',
        kb_action,' ',
        kb_conclusion,' ',
        kb_category) ";
        $condition = " $context LIKE '%" . implode("%' OR $context LIKE '%", $idArr) . "%' ";

        $sql = $this->db->query("SELECT 
        kb_no , 
        kb_title , 
        kb_category ,
        kb_detail ,
        kb_cause , 
        kb_action ,
        kb_conclusion ,
        kb_ecodepost
        FROM kb_main 
        WHERE $condition
        ORDER BY kb_autoid DESC");

        $output = '<ul class="list-group">';
        foreach($sql->result() as $rs){

            // Check url
            $topicurl = '';
            if(getUser()->ecode != $rs->kb_ecodepost){
                $topicurl = base_url('viewdata_read.html/').$rs->kb_no;
            }else{
                $topicurl = base_url('viewdata.html/').$rs->kb_no;
            }


            $output .= '
                <a id="searchRs" href="#" data_href = "'.$topicurl.'"><li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>รหัส:</b>'.$rs->kb_no."&nbsp;&nbsp;<b>ชื่อเอกสาร:</b>".$rs->kb_title." <b>&nbsp;&nbsp;หมวดหมู่:</b>".$rs->kb_category.'
                </a></li>
            ';
        }
        $output .= '</ul>';
        echo $output;
    }


    /////////////////////////////////////////////////////////////////////////
    //////////// Index page
    ////////////////////////////////////////////////////////////////////////





    /////////////////////////////////////////////////////////////////////////
    //////////// Listdata page
    ////////////////////////////////////////////////////////////////////////
public function searchlistdata($deptcode)
{
    $searchText = '';

    $searchText = $this->input->post("search");
    $idArr = explode(" ", $searchText);
    $context = " CONCAT(kb_no,' ',
    kb_title,' ',
    kb_detail,' ',
    kb_cause,' ',
    kb_action,' ',
    kb_conclusion,' ',
    kb_category) ";
    $condition = " $context LIKE '%" . implode("%' OR $context LIKE '%", $idArr) . "%' ";

    $sql = $this->db->query("SELECT 
    kb_no , 
    kb_title , 
    kb_category ,
    kb_detail ,
    kb_cause , 
    kb_action ,
    kb_conclusion ,
    kb_ecodepost
    FROM kb_main 
    WHERE $condition AND kb_deptcodepost = '$deptcode'
    ORDER BY kb_autoid DESC
    LIMIT 50");

    $output = '<ul class="list-group">';
    foreach($sql->result() as $rs){

        // Check url
        $topicurl = '';
        if(getUser()->ecode != $rs->kb_ecodepost){
            $topicurl = base_url('viewdata_read.html/').$rs->kb_no;
        }else{
            $topicurl = base_url('viewdata.html/').$rs->kb_no;
        }


        $output .= '
            <a id="searchRsDept" href="#" data_href = "'.$topicurl.'"><li class="list-group-item d-flex justify-content-between align-items-center">
                <b>รหัส:</b>'.$rs->kb_no."&nbsp;&nbsp;<b>ชื่อเอกสาร:</b>".$rs->kb_title." <b>&nbsp;&nbsp;หมวดหมู่:</b>".$rs->kb_category.'
            </a></li>
        ';
    }
    $output .= '</ul>';
    echo $output;
}






    /////////////////////////////////////////////////////////////////////////
    //////////// Listdata read page
    ////////////////////////////////////////////////////////////////////////

    public function searchlistdata_read()
    {
        $searchText = '';
        $deptcoderead = '';
    
        $searchText = $this->input->post("search");
        $idArr = explode(" ", $searchText);
        $context = " CONCAT(kb_no,' ',
        kb_title,' ',
        kb_detail,' ',
        kb_cause,' ',
        kb_action,' ',
        kb_conclusion,' ',
        kb_category) ";
        $condition = " $context LIKE '%" . implode("%' OR $context LIKE '%", $idArr) . "%' ";

        $deptcoderead = $this->input->post("deptcoderead");
    
        $sql = $this->db->query("SELECT 
        kb_no , 
        kb_title , 
        kb_category ,
        kb_detail ,
        kb_cause , 
        kb_action ,
        kb_conclusion ,
        kb_ecodepost
        FROM kb_main 
        WHERE $condition AND kb_deptcodepost = '$deptcoderead'
        ORDER BY kb_autoid DESC
        LIMIT 50");
    
        $output = '<ul class="list-group">';
        foreach($sql->result() as $rs){
    
            // Check url
            $topicurl = '';
            if(getUser()->ecode != $rs->kb_ecodepost){
                $topicurl = base_url('viewdata_read.html/').$rs->kb_no;
            }else{
                $topicurl = base_url('viewdata.html/').$rs->kb_no;
            }
    
    
            $output .= '
                <a id="searchRsDept_read" href="#" data_href = "'.$topicurl.'"><li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>รหัส:</b>'.$rs->kb_no."&nbsp;&nbsp;<b>ชื่อเอกสาร:</b>".$rs->kb_title." <b>&nbsp;&nbsp;หมวดหมู่:</b>".$rs->kb_category.'
                </a></li>
            ';
        }
        $output .= '</ul>';
        echo $output;
    }




















}/* End of file ModelName.php */
