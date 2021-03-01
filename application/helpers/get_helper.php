<?php
class getfn
{
    private $ci;
    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    function gci()
    {
        return $this->ci;
    }
}

function gfn()
{
    $obj = new getfn();
    return $obj->gci();
}


/////////////////////////////////////////////////////////////////////////
//////////// GET Template zone
////////////////////////////////////////////////////////////////////////
// Get template
function getHead()
{
    gfn()->load->view("templates/head");
}

function getFooter()
{
    gfn()->load->view("templates/footer");
}

function getContent($content, $data)
{
    gfn()->parser->parse($content, $data);
}

function getSlide()
{
    gfn()->load->view("templates/slide");
}

function getModal()
{
    gfn()->load->view("templates/modal");
}

function getMenubar()
{
    gfn()->load->view("menubar");
}

function getDb()
{
    $sql = gfn()->db->query("SELECT * FROM db WHERE db_autoid = 2 ");
    return $sql->row();
}
// Get template
/////////////////////////////////////////////////////////////////////////
//////////// GET Template zone
////////////////////////////////////////////////////////////////////////









// Get kbno
// Query ข้อมูลจำพวก Group , Catagory
function getFormNo()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    kb_no FROM kb_main ORDER BY kb_autoid DESC LIMIT 1 
    ");
    $result = $checkRowdata->num_rows();

    $cutYear = substr(date("Y"), 2, 2);
    $getMonth = substr(date("m"), 0, 2);
    $formno = "";
    if ($result == 0) {
        $formno = "KB" . $cutYear . $getMonth . "001";
    } else {

        $getFormno = $checkRowdata->row()->kb_no;
        $cutGetYear = substr($getFormno, 2, 2); //KB2003001
        $cutNo = substr($getFormno, 6, 3); //อันนี้ตัดเอามาแค่ตัวเลขจาก CRF2003001 ตัดเหลือ 001
        $cutNo++;

        if ($cutNo < 10) {
            $cutNo = "00" . $cutNo;
        } else if ($cutNo < 100) {
            $cutNo = "0" . $cutNo;
        }

        if ($cutGetYear != $cutYear) {
            $formno = "KB" . $cutYear . $getMonth . $cutNo;
        } else {
            $formno = "KB" . $cutGetYear . $getMonth . $cutNo;
        }
    }

    return $formno;
}
// Get kbno





// Get data to view
function getDept($mydeptcode)
{
    $sql = gfn()->db->query("SELECT * FROM kb_dept order by dept_name asc");
    $output = '';
    foreach ($sql->result() as $rs) {
        if ($mydeptcode != $rs->dept_code) {
            $output .= '
            <li class="menu-item"><a class="menu-link" href="' . base_url('listdata_guest.html/') . $rs->dept_code . '"><div>' . $rs->dept_name . '</div></a></li>
            ';
        } else {
            continue;
        }
    }
    echo $output;
}

function getDept2()
{
    $sql = gfn()->db->query("SELECT * FROM kb_dept order by dept_name asc");
    $output = '';
    foreach ($sql->result() as $rs) {
        $output .= '
    <option value="' . $rs->dept_code . '">' . $rs->dept_name . '</option>
    ';
    }
    echo $output;
}

function sqlGetCat($deptcode)
{
    $sql = gfn()->db->query("SELECT * FROM kb_category WHERE cat_deptcode = '$deptcode' ORDER BY cat_name ASC ");
    return $sql;
}

function sqlGetCatbyCode($catcode)
{
    $sql = gfn()->db->query("SELECT * FROM kb_category WHERE cat_autoid = '$catcode' ");
    return $sql->row()->cat_name;
}

function getCategory($deptcode)
{
    $sql = sqlGetCat($deptcode);

    $output = '';
    foreach ($sql->result() as $rs) {
        $output .= '
        <tr>
            <td>' . $rs->cat_name . '</td>
            <td>' . $rs->cat_memo . '</td>
            <td>' . $rs->cat_usercreate . '</td>
            <td>' . $rs->cat_datetimecreate . '</td>
            <td>
            <a id="catDel" class="icona" href="#" 
            data_id = "' . $rs->cat_autoid . '"
            ><i class="icon-trash1 icon" style="color:red;"></i></a>

            <a id="catEdit" class="icona" href="#"
            data_id = "' . $rs->cat_autoid . '"
            data_catname = "' . $rs->cat_name . '"
            data_catmemo = "' . $rs->cat_memo . '"
            ><i class="icon-pencil2 icon" style="color:orange;"></i></a>
            </td>
        </tr>
        ';
    }
    return $output;
}


function getCategoryAdd($deptcode)
{
    $sql = sqlGetCat($deptcode);
    $output = '';
    foreach ($sql->result() as $rs) {
        $output .= '
            <option value="' . $rs->cat_autoid . '">' . $rs->cat_name . '</option>
        ';
    }
    echo $output;
}


function getCategoryView($deptcode)
{
    $sql = sqlGetCat($deptcode);
    $output = '';
    foreach ($sql->result() as $rs) {

        $category = $rs->cat_name;

        $sql2 = gfn()->db->query("SELECT 
    count(kb_category)as category 
    From kb_main
    WHERE kb_deptcodepost = '$deptcode' AND kb_category = '$category' AND kb_status ='เผยแพร่'
    GROUP BY kb_category
    ");
        $output2 = '';
        foreach ($sql2->result() as $rss) {
            $output2 = $rss->category;
        }
        if ($output2 == "") {
            $output2 = 0;
        }
        $output .= '
        <div class="col-lg-2 col-3 text-center">
            <a href="' . base_url('listdatabycat.html/') . $rs->cat_autoid . '">
            <i class="icon-folder foldersize">
                <span><b>' . $output2 . '</b> เรื่อง</span>
            </i><br>
            <span><b>' . $rs->cat_name . '</b></span>
            </a>
        </div>
        ';
    }
    echo $output;
}




function getCategoryView_read($deptcode)
{
    $sql = sqlGetCat($deptcode);
    $output = '';
    foreach ($sql->result() as $rs) {

        $category = $rs->cat_name;

        $sql2 = gfn()->db->query("SELECT 
    count(kb_category)as category 
    From kb_main
    WHERE kb_deptcodepost = '$deptcode' AND kb_category = '$category' AND kb_status ='เผยแพร่'
    GROUP BY kb_category
    ");
        $output2 = '';
        foreach ($sql2->result() as $rss) {
            $output2 = $rss->category;
        }
        if ($output2 == "") {
            $output2 = 0;
        }
        $output .= '
        <div class="col-lg-2 col-3 text-center">
            <a href="' . base_url('listdatabycat_read.html/') . $rs->cat_autoid . "/" . $deptcode . '">
            <i class="icon-folder foldersize">
                <span><b>' . $output2 . '</b> เรื่อง</span>
            </i><br>
            <span><b>' . $rs->cat_name . '</b></span>
            </a>
        </div>
        ';
    }
    echo $output;
}




















/////////////////////////////////////////////////////////////////////////
//////////// Data Zone
////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
//////////// Data Zone
////////////////////////////////////////////////////////////////////////
function sqlGetdataByDept($deptcode)
{
    $sql = gfn()->db->query("SELECT
        kb_main.kb_autoid,
        kb_main.kb_no,
        kb_main.kb_title,
        kb_main.kb_category,
        kb_main.kb_categorycode,
        kb_main.kb_detail,
        kb_main.kb_cause,
        kb_main.kb_action,
        kb_main.kb_conclusion,
        kb_main.kb_userpost,
        kb_main.kb_ecodepost,
        kb_main.kb_deptnamepost,
        kb_main.kb_deptcodepost,
        kb_main.kb_emailpost,
        kb_main.kb_datetime,
        kb_main.kb_hit
        FROM
        kb_main
        WHERE kb_deptcodepost = '$deptcode' AND
        kb_status = 'เผยแพร่'
        ORDER BY kb_autoid DESC
        LIMIT 5
        ");
    return $sql;
}

function sqlGetdataByDeptByCode($deptcode)
{
    $sql = gfn()->db->query("SELECT
        kb_main.kb_autoid,
        kb_main.kb_no,
        kb_main.kb_title,
        kb_main.kb_category,
        kb_main.kb_detail,
        kb_main.kb_cause,
        kb_main.kb_action,
        kb_main.kb_conclusion,
        kb_main.kb_userpost,
        kb_main.kb_ecodepost,
        kb_main.kb_deptnamepost,
        kb_main.kb_deptcodepost,
        kb_main.kb_emailpost,
        kb_main.kb_datetime
        FROM
        kb_main
        WHERE kb_deptcodepost = '$deptcode'
        ORDER BY kb_autoid DESC
        LIMIT 5
        ");
    return $sql;
}


function loaddatabydept($deptcode)
{
    $sql = sqlGetdataByDept($deptcode);
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        if(getUser()->ecode != $rs->kb_ecodepost){
            $viewlink = base_url('viewdata_read.html/') . $rs->kb_no;
        }else{
            $viewlink = base_url('viewdata.html/') . $rs->kb_no;
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' .$viewlink. '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . $rs->kb_categorycode . '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td>ผู้เข้าชม: ' . $rs->kb_hit . '</td>
            </tr>
            ';
    }
    echo $output;
}





function loaddatabydept_read($deptcode_read)
{
    $sql = sqlGetdataByDept($deptcode_read);
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' . base_url('viewdata_read.html/') . $rs->kb_no . '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat_read.html/') . $rs->kb_categorycode ."/".$deptcode_read. '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td>ผู้เข้าชม: ' . $rs->kb_hit . '</td>
            </tr>
            ';
    }
    echo $output;
}







function loaddatabydeptbycat($deptcode)
{
    $sql = sqlGetdataByDept($deptcode);
    $output = '';
    foreach ($sql->result() as $rs) {
        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td>' . $rs->kb_category . '</td>
                <td>' . $rs->kb_userpost . '</td>
                <td>' . $rs->kb_ecodepost . '</td>
                <td>' . conDateTimeFromDb($rs->kb_datetime) . '</td>
                <td>$320,800</td>
            </tr>
            ';
    }
    echo $output;
}



function countDataByCategory($deptcode, $category)
{
    $sql = gfn()->db->query("SELECT 
    count(kb_category)as category 
    From kb_main
    WHERE kb_deptcodepost = '$deptcode' AND kb_category = '$category'
    GROUP BY kb_category
    ");

    return $sql->row();
}




function getDataByKbcode($kbcode)
{
    $sql = gfn()->db->query("SELECT
    kb_main.kb_autoid,
    kb_main.kb_no,
    kb_main.kb_title,
    kb_main.kb_category,
    kb_main.kb_categorycode,
    kb_main.kb_detail,
    kb_main.kb_cause,
    kb_main.kb_action,
    kb_main.kb_conclusion,
    kb_main.kb_userpost,
    kb_main.kb_ecodepost,
    kb_main.kb_deptnamepost,
    kb_main.kb_deptcodepost,
    kb_main.kb_emailpost,
    kb_main.kb_datetime,
    kb_main.kb_hit,
    kb_main.kb_status
    FROM
    kb_main
    WHERE kb_no = '$kbcode'
    ");

    return $sql->row();
}

function getFilesByKbcode($kbcode)
{
    $sql = gfn()->db->query("SELECT * FROM kb_files WHERE file_kbno = '$kbcode' ORDER BY file_autoid ASC ");
    $output = '';
    foreach ($sql->result() as $rs) {
        $checkfiletype = substr($rs->file_name , -4);
        $iconfiles = '';
        switch($checkfiletype){
            case ".jpg":
                $iconfiles = 'icon-file-image';
                break;
            case ".pdf":
                $iconfiles = 'icon-file-pdf';
                break;
            case ".jpeg":
                $iconfiles = 'icon-file-image';
                break;
            case ".png":
                $iconfiles = 'icon-file-image';
                break;
            default:
                $iconfiles = 'icon-file-pdf';
        }

        $output .= '
        
        <div class="col-lg-4 col-4 text-center">
        <a href="' . base_url('upload/') . $rs->file_name . '" target="_blank">
        <i class="'.$iconfiles.' iconfilesize"></i><br>
        <span><b>' . $rs->file_name . '</b></span>
        </a>
        </div>
        
        ';
    }
    echo $output;
}

function checkFilesByKbcode($kbcode)
{
    $sql = gfn()->db->query("SELECT file_kbno FROM kb_files WHERE file_kbno = '$kbcode' ");
    $result = $sql->num_rows();
    return $result;
}

function getImageUserPost($ecodepost)
{
    $sql = gfn()->db->query("SELECT * FROM kb_user WHERE user_ecode = '$ecodepost' ");
    return $sql->row()->user_image;
}


function countHit($kbcode , $ecodepost)
{
    $sql = gfn()->db->query("SELECT kb_hit FROM kb_main WHERE kb_no = '$kbcode' ");

    if ($sql->row()->kb_hit < 1) {
        $nextHit = 1;
    } else {
        foreach ($sql->result() as $rs) {
            $getHit = $rs->kb_hit;
            $getHit++;
        }
        $nextHit = $getHit;
    }

    if($ecodepost != getUser()->ecode){
        $hitar = array(
            "kb_hit" => $nextHit
        );
        gfn()->db->where("kb_no", $kbcode);
        gfn()->db->update("kb_main", $hitar);
    }else{

    }
    
}


function getUserAgent($activity,$kbno)
{
    $useragent = "Browser:".gfn()->agent->browser().' '.gfn()->agent->version(). ' Platform:'.gfn()->agent->mobile().' '.gfn()->agent->platform().' IP:'.gfn()->input->ip_address();
    $arUseragent = array(
        "ua_activity" => $activity,
        "ua_kbno" => $kbno,
        "ua_name" => getUser()->Fname." ".getUser()->Lname,
        "ua_ecode" => getUser()->ecode,
        "ua_deptcode" => getUser()->DeptCode,
        "ua_deptname" => getUser()->Dept,
        "ua_datetime" => date("Y-m-d H:i:s"),
        "ua_agent" => $useragent
    );
    if(gfn()->db->insert("kb_useractivity" , $arUseragent)){
        return "ok";
    }
}



function getDataWait($deptcode)
{
    $sql = gfn()->db->query("SELECT
    kb_main.kb_no,
    kb_main.kb_title,
    kb_main.kb_category,
    kb_main.kb_categorycode,
    kb_main.kb_userpost,
    kb_main.kb_ecodepost,
    kb_main.kb_deptnamepost,
    kb_main.kb_deptcodepost,
    kb_main.kb_emailpost,
    kb_main.kb_datetime,
    kb_main.kb_status,
    kb_main.kb_cancel_memo
    FROM
    kb_main
    WHERE kb_deptcodepost = '$deptcode'
    ORDER BY kb_autoid DESC
    ");
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $sColor = '';
        $sDis = '';
        $scDis = '';
        $nApp = '';

        if ($rs->kb_status == "เผยแพร่") {
            $sColor = ' style="color:#006400;" ';
            $sDis = ' style="display:none;" ';
            $nApp = ' style="display:none;" ';
        }else if($rs->kb_status == "ยกเลิกการเผยแพร่"){
            $sColor = ' style="color:#CD0000;" ';
            $scDis = ' style="display:none;" ';
        }else if($rs->kb_status == "ไม่อนุมัติรายการ"){
            $sColor = ' style="color:#CD0000;" ';
            $scDis = ' style="display:none;" ';
            $nApp = ' style="display:none;" ';
            $sDis = ' style="display:none;" ';
        } else {
            $scDis = ' style="display:none;" ';
        }

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' . base_url('viewdata.html/') . $rs->kb_no . '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . $rs->kb_categorycode . '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td class="text-center">
                    <div>สถานะ : <span id="vstatus" ' . $sColor . '><b>' . $rs->kb_status . '</b></span></div><br>

                    <a id="appBtn" ' . $sDis . ' href="javascript:void(0)" class="button button-mini button-circle button-green"
                        data_kbno = "' . $rs->kb_no . '"
                    ><i class="icon-off"></i>อนุมัติ</a>

                    <a id="notAppBtn" ' . $nApp . ' href="javascript:void(0)" data-toggle="modal" data-target="#md_resonCancel" class="button button-mini button-circle button-red"
                        data_kbno = "' . $rs->kb_no . '"
                        data_action = "notapprove"
                    ><i class="icon-off"></i>ไม่อนุมัติ</a>

                    <a id="appBtnCancel" ' . $scDis . ' href="javascript:void(0)" data-toggle="modal" data-target="#md_resonCancel" class="button button-mini button-circle button-red"
                        data_kbno = "' . $rs->kb_no . '"
                    ><i class="icon-off"></i>ยกเลิก</a>
                </td>
            </tr>
            ';
    }
    return $output;
}





function getDataWaitOwner($ecode)
{
    $sql = gfn()->db->query("SELECT
    kb_main.kb_no,
    kb_main.kb_title,
    kb_main.kb_category,
    kb_main.kb_categorycode,
    kb_main.kb_userpost,
    kb_main.kb_ecodepost,
    kb_main.kb_deptnamepost,
    kb_main.kb_deptcodepost,
    kb_main.kb_emailpost,
    kb_main.kb_datetime,
    kb_main.kb_status
    FROM
    kb_main
    WHERE kb_ecodepost = '$ecode' AND kb_status not in ('เผยแพร่' , 'ยกเลิกการเผยแพร่' , 'ไม่อนุมัติรายการ')
    ORDER BY kb_autoid DESC
    ");
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $sColor = '';

        if ($rs->kb_status == "รอตรวจสอบ") {
            $sColor = ' style="color:#FF8200;" ';

        } else {

        }

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' . base_url('viewdata.html/') . $rs->kb_no . '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . $rs->kb_categorycode . '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td class="text-center">
                <div>สถานะ : <span id="vstatus" ' . $sColor . '><b>' . $rs->kb_status . '</b></span></div><br>

                </td>
            </tr>
            ';
    }
    return $output;
}







function getDataWaitOwnerTotal($ecode)
{
    $sql = gfn()->db->query("SELECT
    kb_main.kb_no,
    kb_main.kb_title,
    kb_main.kb_category,
    kb_main.kb_categorycode,
    kb_main.kb_userpost,
    kb_main.kb_ecodepost,
    kb_main.kb_deptnamepost,
    kb_main.kb_deptcodepost,
    kb_main.kb_emailpost,
    kb_main.kb_datetime,
    kb_main.kb_status
    FROM
    kb_main
    WHERE kb_ecodepost = '$ecode'
    ORDER BY kb_autoid DESC
    ");
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $sColor = '';

        if ($rs->kb_status == "เผยแพร่") {
            $sColor = ' style="color:#006400;" ';
        } else if($rs->kb_status == "ยกเลิกการเผยแพร่"){
            $sColor = ' style="color:#b90000;" ';
        }else if($rs->kb_status == "รอตรวจสอบ"){
            $sColor = ' style="color:#FF8200;" ';
        }

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' . base_url('viewdata.html/') . $rs->kb_no . '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . $rs->kb_categorycode . '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td class="text-center">
                <div>สถานะ : <span id="vstatus" ' . $sColor . '><b>' . $rs->kb_status . '</b></span></div><br>

                </td>
            </tr>
            ';
    }
    return $output;
}






function getDataWaitOwnerPub($ecode)
{
    $sql = gfn()->db->query("SELECT
    kb_main.kb_no,
    kb_main.kb_title,
    kb_main.kb_category,
    kb_main.kb_categorycode,
    kb_main.kb_userpost,
    kb_main.kb_ecodepost,
    kb_main.kb_deptnamepost,
    kb_main.kb_deptcodepost,
    kb_main.kb_emailpost,
    kb_main.kb_datetime,
    kb_main.kb_status
    FROM
    kb_main
    WHERE kb_ecodepost = '$ecode' AND kb_status in ('เผยแพร่')
    ORDER BY kb_autoid DESC
    ");
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $sColor = '';
        $sDis = '';
        $scDis = '';
        if ($rs->kb_status == "เผยแพร่") {
            $sColor = ' style="color:#006400;" ';
            $sDis = ' style="display:none;" ';
        } else {
            $scDis = ' style="display:none;" ';
        }

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' . base_url('viewdata.html/') . $rs->kb_no . '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . $rs->kb_categorycode . '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td class="text-center">
                <div>สถานะ : <span id="vstatus" ' . $sColor . '><b>' . $rs->kb_status . '</b></span></div><br>

                </td>
            </tr>
            ';
    }
    return $output;
}






function getDataWaitOwnerCan($ecode)
{
    $sql = gfn()->db->query("SELECT
    kb_main.kb_no,
    kb_main.kb_title,
    kb_main.kb_category,
    kb_main.kb_categorycode,
    kb_main.kb_userpost,
    kb_main.kb_ecodepost,
    kb_main.kb_deptnamepost,
    kb_main.kb_deptcodepost,
    kb_main.kb_emailpost,
    kb_main.kb_datetime,
    kb_main.kb_status
    FROM
    kb_main
    WHERE kb_ecodepost = '$ecode' AND kb_status in ('ยกเลิกการเผยแพร่')
    ORDER BY kb_autoid DESC
    ");
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $sColor = '';
        $sDis = '';
        $scDis = '';
        if ($rs->kb_status == "เผยแพร่") {
            $sColor = ' style="color:#006400;" ';
            $sDis = ' style="display:none;" ';
        } else {
            $scDis = ' style="display:none;" ';
            $sColor = ' style="color:#CD0000;" ';
        }

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' . base_url('viewdata.html/') . $rs->kb_no . '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . $rs->kb_categorycode . '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td class="text-center">
                <div>สถานะ : <span id="vstatus" ' . $sColor . '><b>' . $rs->kb_status . '</b></span></div><br>

                </td>
            </tr>
            ';
    }
    return $output;
}






function getDataWaitOwnerNot($ecode)
{
    $sql = gfn()->db->query("SELECT
    kb_main.kb_no,
    kb_main.kb_title,
    kb_main.kb_category,
    kb_main.kb_categorycode,
    kb_main.kb_userpost,
    kb_main.kb_ecodepost,
    kb_main.kb_deptnamepost,
    kb_main.kb_deptcodepost,
    kb_main.kb_emailpost,
    kb_main.kb_datetime,
    kb_main.kb_status
    FROM
    kb_main
    WHERE kb_ecodepost = '$ecode' AND kb_status in ('ไม่อนุมัติรายการ')
    ORDER BY kb_autoid DESC
    ");
    $output = '';
    foreach ($sql->result() as $rs) {

        if (checkFilesByKbcode($rs->kb_no) > 0) {
            $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
        } else {
            $icon = '';
        }

        $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
        $resultTitleCut = $strtitle . "...";

        $sColor = '';
        $sDis = '';
        $scDis = '';
        if ($rs->kb_status == "เผยแพร่") {
            $sColor = ' style="color:#006400;" ';
            $sDis = ' style="display:none;" ';
        } else {
            $scDis = ' style="display:none;" ';
            $sColor = ' style="color:#CD0000;" ';
        }

        $output .= '
            <tr>
                <td>
                    <div class="text-center userPostFont">
                        <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                        <span>' . $rs->kb_userpost . '</span>
                        <span>' . $rs->kb_ecodepost . '</span><br>
                        <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                    </div>
                </td>
                <td class="kb-title">
                    
                        <b><a href="' . base_url('viewdata.html/') . $rs->kb_no . '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                        <span><i class="icon-folder smallfdcolor"></i> : <a href="' . base_url('listdatabycat.html/') . $rs->kb_categorycode . '">' . $rs->kb_category . '</a></span>
             
                </td>
                <td class="text-center">
                <div>สถานะ : <span id="vstatus" ' . $sColor . '><b>' . $rs->kb_status . '</b></span></div><br>

                </td>
            </tr>
            ';
    }
    return $output;
}








function getuserWaitdata($ecode)
{
    $sql = gfn()->db->query("SELECT kb_status FROM kb_main WHERE kb_ecodepost = '$ecode' AND kb_status in ('รอตรวจสอบ') ");
    return $sql->num_rows();
}

function getuserWaitdataTotal($ecode)
{
    $sql = gfn()->db->query("SELECT kb_status FROM kb_main WHERE kb_ecodepost = '$ecode' ");
    return $sql->num_rows();
}

function getuserWaitdataNotApp($ecode)
{
    $sql = gfn()->db->query("SELECT kb_status FROM kb_main WHERE kb_ecodepost = '$ecode' AND kb_status in ('ไม่อนุมัติรายการ') ");
    return $sql->num_rows();
}

function getuserWaitdataPub($ecode)
{
    $sql = gfn()->db->query("SELECT kb_status FROM kb_main WHERE kb_ecodepost = '$ecode' AND kb_status in ('เผยแพร่') ");
    return $sql->num_rows();
}

function getuserWaitdataCan($ecode)
{
    $sql = gfn()->db->query("SELECT kb_status FROM kb_main WHERE kb_ecodepost = '$ecode' AND kb_status in ('ยกเลิกการเผยแพร่') ");
    return $sql->num_rows();
}

function alertWaitApp()
{
    if(getuserWaitdata(getUser()->ecode) != 0){
        echo '<span class="badge badge-pill badge-warning">'.getuserWaitdata(getUser()->ecode).'</span>';
    }
}

/////////////////////////////////////////////////////////////////////////
//////////// Data Zone
////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
//////////// Data Zone
////////////////////////////////////////////////////////////////////////





















/////////////////////////////////////////////////////////////////////////
//////////// Comment Zone
////////////////////////////////////////////////////////////////////////
function checkDupricateComment($ecodeC, $kbnoC)
{
    $sql = gfn()->db->query("SELECT rt_kbno , rt_ecodepost FROM kb_rating WHERE rt_kbno = '$kbnoC' AND rt_ecodepost = '$ecodeC' ");
    $countComment = $sql->num_rows();
    if ($countComment > 0) {
        return false;
    } else {
        return true;
    }
}

function checkDupRat($ecodeR , $kbnoR)
{
    $sql = gfn()->db->query("SELECT rt_kbno , rt_ecodepost FROM kb_rating WHERE rt_kbno = '$kbnoR' AND rt_ecodepost = '$ecodeR' ");
    $countRat = $sql->num_rows();
    if ($countRat > 0) {
        return false;
    } else {
        return true;
    }
}

function loadCommentfn($kbcode)
{
    $sql = gfn()->db->query("SELECT 
    cm_text ,
    cm_autoid, 
    cm_kbno , 
    cm_user , 
    cm_ecode , 
    cm_datetime 
    FROM kb_comment 
    WHERE cm_kbno = '$kbcode' AND cm_cmid IS NULL
    ORDER BY cm_autoid DESC ");

    $output = '';

    foreach ($sql->result() as $rs) {
        $sql2 = gfn()->db->query("SELECT cm_reply , cm_kbno , cm_user , cm_ecode , cm_datetime FROM kb_comment WHERE cm_cmid='$rs->cm_autoid' AND cm_kbno='$rs->cm_kbno' ");
        $output2 = '';
        foreach($sql2->result() as $rss){
            $output2 .= '
            <div class="card">
        <div class="card-body p-3" style="background-color:#C0FFFF;">
            <div class="row">
                <div class="col-md-8">
                    ' . $rss->cm_reply . '
                </div>
                <div class="col-lg-4 text-center">
                    <img src="' . linkImg(getImageUserPost($rss->cm_ecode)) . '" class="img-thumbnail sizeImageReply"><br>
                    ' . $rss->cm_user . '<br>' . conDatetimeFromDb($rss->cm_datetime) . '
                    <br>
                </div>
            </div>
        </div>
        </div><br>
            ';
        }
        $output .= '
            <div class="card">
                    <div class="card-body p-3" style="background-color:#FFFFCC;">
                        <div class="row">
                            <div class="col-md-8">
                                ' . $rs->cm_text . '
                            </div>
                            <div class="col-lg-4 text-center">
                                <img src="' . linkImg(getImageUserPost($rs->cm_ecode)) . '" class="img-thumbnail sizeImage"><br>
                                ' . $rs->cm_user . '<br>' . conDatetimeFromDb($rs->cm_datetime) . '
                                <input id="rt_star" name="rt_star" type="number" class="rating" min="0" max="5" data-step="1" data-stars="5" data-size="xs" data-readonly="true" value="'.getStar($kbcode , $rs->cm_ecode ,$rs->cm_datetime).'"><br>

                                <a href="#" id="btn_reply" data-toggle="modal" data-target="#md_reply"
                                data_rpuserpost = "'.$rs->cm_user.'"
                                data_rpid = "'.$rs->cm_autoid.'"
                                data_rpkbno = "'.$rs->cm_kbno.'"
                                ><button  name="btn_reply" class="button button-mini button-circle button-3d button-second">ตอบกลับ</button></a>
                            </div>
                        </div>
                        '.$output2.'
                        ';
     

          $output .= '            
                    </div>
                </div>
                <br>
        ';
    }
    echo $output;
}



function loadReply($commentid , $kbno)
{
    $sql = gfn()->db->query("SELECT cm_reply , cm_kbno , cm_user , cm_ecode , cm_datetime FROM kb_comment WHERE cm_cmid='$commentid' AND cm_kbno='$kbno' ");
    $output2 = '';
    foreach($sql->result() as $rs){
        $output2 .= '
        <div class="card">
        <div class="card-body p-3" style="background-color:#5ABEF5;">
            <div class="row">
                <div class="col-md-8">
                    ' . $rs->cm_reply . '
                </div>
                <div class="col-lg-4 text-center">
                    <img src="' . linkImg(getImageUserPost($rs->cm_ecode)) . '" class="img-thumbnail sizeImage"><br>
                    ' . $rs->cm_user . '<br>' . conDatetimeFromDb($rs->cm_datetime) . '
                    <br>
                </div>
            </div>
        </div>
        </div>
        ';
    }
    echo $output2;
}





function getStar($kbno , $ecode ,$datetime)
{
    $sql = gfn()->db->query("SELECT rt_star FROM kb_rating WHERE rt_kbno = '$kbno' AND rt_ecodepost= '$ecode' AND rt_datetime = '$datetime' ");
    
    if($sql->num_rows() > 0){
        return $sql->row()->rt_star;
    }else{
        return 0;
    }
}




function calRating($kbno)
{
    $sql = gfn()->db->query("SELECT avg(rt_star)as avg_star FROM kb_rating WHERE rt_kbno = '$kbno' ");
    return $sql->row()->avg_star;
}

/////////////////////////////////////////////////////////////////////////
//////////// Comment Zone
////////////////////////////////////////////////////////////////////////












/////////////////////////////////////////////////////////////////////////
//////////// Index page
////////////////////////////////////////////////////////////////////////


function getDeptIndex($mydeptcode)
{
    $sql = gfn()->db->query("SELECT * FROM kb_dept ORDER BY dept_name ASC");
    $output = '';
    foreach($sql->result() as $rs){

        if($mydeptcode != $rs->dept_code){
            $output .= '
    
        <div class="col-lg-2">
        <a href="'.base_url('listdata_guest.html/').$rs->dept_code.'">
        <div class="card bg-dark text-white deptBox">
        <img src="'.base_url('assets/dept_image/').$rs->dept_bgimage.'" class="card-img deptbgimage" alt="...">
            <div class="card-img-overlay">
                
                    <span class="textdept">'.$rs->dept_name.'
                    <br><i class="icon-folder-close folderDept"> '.countAllCategoryByDept($rs->dept_code).'</i><br>
                    <i class="icon-file folderDept"> '.countAllTopicByDept($rs->dept_code).'</i>
                    </span>
                
            </div>
        </div>
        </a>
        </div>
        ';
        }else{
            continue;
        }
        
    }
    echo $output;
}

// นับจำนวนของ Category ทั้งหมดของแผนกนั้นๆ
function countAllCategoryByDept($deptcode)
{
    $sql = gfn()->db->query("SELECT cat_autoid FROM kb_category WHERE cat_deptcode = '$deptcode' ");
    return $sql->num_rows();
}

// นับจำนวนหัวข้อทั้งหมดของแผนกนั้นๆ
function countAllTopicByDept($deptcode)
{
    $sql = gfn()->db->query("SELECT kb_categorycode FROM kb_main WHERE kb_deptcodepost = '$deptcode' AND kb_status = 'เผยแพร่' ");
    return $sql->num_rows();
}


function toptenlist()
{
    $sql = gfn()->db->query("SELECT
        kb_main.kb_autoid,
        kb_main.kb_no,
        kb_main.kb_title,
        kb_main.kb_category,
        kb_main.kb_categorycode,
        kb_main.kb_detail,
        kb_main.kb_cause,
        kb_main.kb_action,
        kb_main.kb_conclusion,
        kb_main.kb_userpost,
        kb_main.kb_ecodepost,
        kb_main.kb_deptnamepost,
        kb_main.kb_deptcodepost,
        kb_main.kb_emailpost,
        kb_main.kb_datetime,
        kb_main.kb_hit
        FROM
        kb_main
        WHERE kb_status = 'เผยแพร่'
        ORDER BY kb_autoid DESC
        LIMIT 10
        ");

        $output = '';
        foreach($sql->result() as $rs){
            if (checkFilesByKbcode($rs->kb_no) > 0) {
                $icon = '<i class="icon-line-paper-clip" style="color:#CD0000;font-weight:600;font-size:16px;"></i>';
            } else {
                $icon = '';
            }

            // Check url
            $topicurl = '';
            $caturl = '';
            if(getUser()->ecode != $rs->kb_ecodepost){
                $topicurl = base_url('viewdata_read.html/').$rs->kb_no;
                $caturl = base_url('listdatabycat_read.html/') . $rs->kb_categorycode."/".$rs->kb_deptcodepost;
            }else{
                $topicurl = base_url('viewdata.html/').$rs->kb_no;
                $caturl = base_url('listdatabycat.html/') . $rs->kb_categorycode;
            }
    
            $strtitle = iconv_substr(getDataByKbcode($rs->kb_no)->kb_title, 0, 120, "UTF-8");
            $resultTitleCut = $strtitle . "...";
    
            $output .= '
                <tr>
                    <td>
                        <div class="text-center userPostFont">
                            <img src="' . linkImg(getImageUserPost($rs->kb_ecodepost)) . '" class="img-thumbnail sizeImage rounded"><br>
                            <span>' . $rs->kb_userpost . '</span>
                            <span>' . $rs->kb_ecodepost . '</span><br>
                            <span>' . conDateTimeFromDb($rs->kb_datetime) . '</span>
                        </div>
                    </td>
                    <td class="kb-title">
                        
                            <b><a href="' .$topicurl. '">' . $resultTitleCut . " " . $icon . '</b></a><br>
                            <span><i class="icon-folder smallfdcolor"></i> : <a href="' .$caturl. '">' . $rs->kb_category . '</a></span>
                 
                    </td>
                    <td>ผู้เข้าชม: ' . $rs->kb_hit . '</td>
                </tr>
                ';
        }
        echo $output;
}



/////////////////////////////////////////////////////////////////////////
//////////// Index page
////////////////////////////////////////////////////////////////////////








/////////////////////////////////////////////////////////////////////////
//////////// Category
////////////////////////////////////////////////////////////////////////


function checkDubCate($catname , $deptcode)
{
    $sql = gfn()->db->query("SELECT cat_name , cat_deptcode FROM kb_category WHERE cat_name = '$catname' AND cat_deptcode = '$deptcode' ");
    $rscheck = $sql->num_rows();
    if($rscheck != 0){
        return false;
    }else{
        return true;
    }
}

/////////////////////////////////////////////////////////////////////////
//////////// Category
////////////////////////////////////////////////////////////////////////
