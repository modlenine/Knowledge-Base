<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends MX_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model("main_model", "main");
    }



    /////////////////////////////////////////////////////////////////////////
    //////////// Index page
    ////////////////////////////////////////////////////////////////////////
    public function index()
    {
        $data = array(
            "title" => "test page"
        );
        getHead();
        getSlide();
        getContent("index", $data);
        getFooter();
    }

    public function loadToptenData()
    {
        $this->main->loadToptenData();
    }

    public function searchindex()
    {
        $this->main->searchindex();
    }
    /////////////////////////////////////////////////////////////////////////
    //////////// Index page
    ////////////////////////////////////////////////////////////////////////









    /////////////////////////////////////////////////////////////////////////
    //////////// Data Zone
    ////////////////////////////////////////////////////////////////////////
    public function viewdata($kbcode)
    {
        if(getUser()->ecode != getDataByKbcode($kbcode)->kb_ecodepost){
            echo "<script>";
            echo "alert('คุณไม่สามารถเข้าใช้งานหน้านี้ได้ กรุณาติดต่อ IT')";
            echo "</script>";
            header("refresh:0; url=".base_url());
            exit;
        }
        countHit($kbcode);
        $data = array(
            "title" => "หน้า View ข้อมูล",
            "kbcode" => $kbcode,

            "kb_no" => getDataByKbcode($kbcode)->kb_no,
            "kb_title" => getDataByKbcode($kbcode)->kb_title,
            "kb_category" => getDataByKbcode($kbcode)->kb_category,
            "kb_categorycode" => getDataByKbcode($kbcode)->kb_categorycode,
            "kb_detail" => getDataByKbcode($kbcode)->kb_detail,
            "kb_cause" => getDataByKbcode($kbcode)->kb_cause,
            "kb_action" => getDataByKbcode($kbcode)->kb_action,
            "kb_conclusion" => getDataByKbcode($kbcode)->kb_conclusion,
            "kb_userpost" => getDataByKbcode($kbcode)->kb_userpost,
            "kb_ecodepost" => getDataByKbcode($kbcode)->kb_ecodepost,
            "kb_deptnamepost" => getDataByKbcode($kbcode)->kb_deptnamepost,
            "kb_deptcodepost" => getDataByKbcode($kbcode)->kb_deptcodepost,
            "kb_emailpost" => getDataByKbcode($kbcode)->kb_emailpost,
            "kb_datetime" => getDataByKbcode($kbcode)->kb_datetime,
            "kb_status" => getDataByKbcode($kbcode)->kb_status,
        );
        getHead();
        getContent("viewdata", $data);
        getFooter();
    }



    public function viewdata_read($kbcode)
    {
        countHit($kbcode);
        $data = array(
            "title" => "หน้า View ข้อมูล (Readonly)",
            "kbcode" => $kbcode,

            "kb_no" => getDataByKbcode($kbcode)->kb_no,
            "kb_title" => getDataByKbcode($kbcode)->kb_title,
            "kb_category" => getDataByKbcode($kbcode)->kb_category,
            "kb_categorycode" => getDataByKbcode($kbcode)->kb_categorycode,
            "kb_detail" => getDataByKbcode($kbcode)->kb_detail,
            "kb_cause" => getDataByKbcode($kbcode)->kb_cause,
            "kb_action" => getDataByKbcode($kbcode)->kb_action,
            "kb_conclusion" => getDataByKbcode($kbcode)->kb_conclusion,
            "kb_userpost" => getDataByKbcode($kbcode)->kb_userpost,
            "kb_ecodepost" => getDataByKbcode($kbcode)->kb_ecodepost,
            "kb_deptnamepost" => getDataByKbcode($kbcode)->kb_deptnamepost,
            "kb_deptcodepost" => getDataByKbcode($kbcode)->kb_deptcodepost,
            "kb_emailpost" => getDataByKbcode($kbcode)->kb_emailpost,
            "kb_datetime" => getDataByKbcode($kbcode)->kb_datetime,
            "kb_status" => getDataByKbcode($kbcode)->kb_status,
        );
        getHead();
        getContent("viewdata_read", $data);
        getFooter();
    }
    public function listdata()
    {
        $data = array(
            "title" => "หน้า list",
        );
        getHead();
        getContent("listdata", $data);
        getFooter();
    }

    public function searchlistdata()
    {
        $this->main->searchlistdata(getUser()->DeptCode);
    }

    public function searchlistdata_read()
    {
        $this->main->searchlistdata_read();
    }



    public function listdata_readonly($deptcode_read)
    {
        $data = array(
            "title" => "หน้า List",
            "deptcode_read" => "$deptcode_read",
            "deptname_read" => conDeptcodeToDeptname($deptcode_read)
        );
        getHead();
        getContent("listdata_readonly", $data);
        getFooter();
    }
    public function listdatabycat($catcode)
    {
        $data = array(
            "title" => "หน้า List By Cat",
            "catname" => sqlGetCatbyCode($catcode),
            "catcode" => $catcode
        );
        getHead();
        getContent("listdata_bycat", $data);
        getFooter();
    }
    public function listdatabycat_read($catcode, $deptcode)
    {
        $data = array(
            "title" => "หน้า List By Cat (readonly)",
            "catname" => sqlGetCatbyCode($catcode),
            "catcode" => $catcode,
            "deptcode" => $deptcode,
            "deptname_read" => conDeptcodeToDeptname($deptcode)
        );
        getHead();
        getContent("listdata_bycat_readonly", $data);
        getFooter();
    }
    public function saveadd_data()
    {
        if ($this->main->savedata() == true) {
            header("refresh:0; url=" . base_url('listdata.html'));
        } else {
            echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ')</script>";
        }
    }
    ///////////// Ajax load data by dept
    public function loaddatabydept()
    {
        loaddatabydept(getUser()->DeptCode);
    }
    public function loaddatabydept_read()
    {
        $deptcode_read = '';

        $deptcode_read = $this->input->post("deptcoderead");
        loaddatabydept_read($deptcode_read);
    }
    public function loaddatabydeptbycat($catcode)
    {
        $this->main->dataByCatelist($catcode);
    }
    public function loaddatabydeptbycat_read($catcode, $deptcode)
    {
        $this->main->dataByCatelist_read($catcode, $deptcode);
    }
    public function loaddataWait()
    {
        $data['resultDatawait'] = getDataWait(getUser()->DeptCode);
        $this->load->view("resultDatalistWait", $data);
    }




    public function loaddataWaitOwner()
    {
        $data['resultDatawaitOwner'] = getDataWaitOwner(getUser()->ecode);
        $this->load->view("resultDatalistWaitOwner", $data);
    }

    public function loaddataWaitOwnerTotal()
    {
        $data['resultDatawaitOwner'] = getDataWaitOwnerTotal(getUser()->ecode);
        $this->load->view("resultDatalistWaitOwner", $data);
    }

    public function loaddataWaitOwnerPub()
    {
        $data['resultDatawaitOwner'] = getDataWaitOwnerPub(getUser()->ecode);
        $this->load->view("resultDatalistWaitOwner", $data);
    }

    public function loaddataWaitOwnerCan()
    {
        $data['resultDatawaitOwner'] = getDataWaitOwnerCan(getUser()->ecode);
        $this->load->view("resultDatalistWaitOwner", $data);
    }

    public function loaddataWaitOwnerNot()
    {
        $data['resultDatawaitOwner'] = getDataWaitOwnerNot(getUser()->ecode);
        $this->load->view("resultDatalistWaitOwner", $data);
    }






    ///////////// Control approve data list
    public function approveData()
    {
        $this->main->approveData();
    }

    public function cancelData()
    {
        $this->main->cancelData();
    }

    public function notApproveData()
    {
        $this->main->notApproveData();
    }
    ///////////// Control approve data list
    /////////////////////////////////////////////////////////////////////////
    //////////// Data Zone
    ////////////////////////////////////////////////////////////////////////











    /////////////////////////////////////////////////////////////////////////
    //////////// Category Zone
    ////////////////////////////////////////////////////////////////////////
    public function saveCategory()
    {
        $this->main->saveCategory();
    }
    public function loadCategory()
    {
        $data['resultCategory'] = getCategory(getUser()->DeptCode);
        $this->load->view("resultCategory", $data);
    }
    public function editCategory()
    {
        $this->main->editCategory();
    }
    public function delCategory()
    {
        $this->main->delCategory();
    }
    /////////////////////////////////////////////////////////////////////////
    //////////// Category Zone
    ////////////////////////////////////////////////////////////////////////














    /////////////////////////////////////////////////////////////////////////
    //////////// PERMISSION ZONE
    ////////////////////////////////////////////////////////////////////////
    public function getPermission()
    {
        $this->main->getPermission();
    }
    /////////////////////////////////////////////////////////////////////////
    //////////// PERMISSION ZONE
    ////////////////////////////////////////////////////////////////////////

















    /////////////////////////////////////////////////////////////////////////
    //////////// COMMENT ZONE
    ////////////////////////////////////////////////////////////////////////

    public function savecomment()
    {
        if (!$this->input->post("rt_submit")) {
            $ecodeC = getUser()->ecode;
            $kbnoC = $this->input->post("rt_kbno");
            if (checkDupRat($ecodeC , $kbnoC) == true) {
                $this->main->saveRating();
                $this->main->saveComment();
            } else {
                echo "Insert fail";
                $this->main->saveComment();
            }
        }
    }

    public function loadcomment()
    {
        if ($this->input->post("kbno")) {
            $this->main->loadcomment();
        }
    }

    public function saveReply()
    {
        $this->main->saveReply();
    }

    /////////////////////////////////////////////////////////////////////////
    //////////// COMMENT ZONE
    ////////////////////////////////////////////////////////////////////////






    /////////////////////////////////////////////////////////////////////////
    //////////// EDIT DATA
    ////////////////////////////////////////////////////////////////////////

    public function loadFileEdit()
    {
        $kbnoE = '';

        $kbnoE = $this->input->post("kbno");
        getFilesByKbcode($kbnoE);
    }

    public function saveEditData()
    {
        if ($this->main->saveEditData() == true) {
            header("refresh:0; url=" . base_url('listdata.html'));
        } else {
            echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ')</script>";
        }
    }

    /////////////////////////////////////////////////////////////////////////
    //////////// EDIT DATA
    ////////////////////////////////////////////////////////////////////////













    public function test()
    {
        echo substr("image.jpg" , -4);
    }
}/* End of file Main.php */
