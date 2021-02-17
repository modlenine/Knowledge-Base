<?php
class perfn{
    private $ci;
    function __construct()
    {   
        $this->ci =&get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }
    function gci()
    {
        return $this->ci;
    }
}


function gperfn()
{
    $obj = new perfn();
    return $obj->gci();
}



// FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE
// FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE
// FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE FUNCTION ZONE

function getUserPerGroup($ecode)
{
    // ดึงข้อมูล User pergroup มาจาก ตาราง permission_group ก่อน
    $sql = gperfn()->db->query("SELECT user_perg FROM kb_user WHERE user_ecode = '$ecode' ");
    return $sql->row()->user_perg;
}

function getPermissionRule($user_perg)
{
    $sql = gperfn()->db->query("SELECT * FROM permission_group WHERE perg_code = '$user_perg' ");
    foreach($sql->result() as $rss){
        $perg_name = $rss->perg_name;
        $perg_approve_data = $rss->perg_approve_data;

        $outputarray[]=array(
            "perg_name" => $perg_name,
            "perg_approve_data" => (int)$perg_approve_data
        );
    }
    echo json_encode($outputarray);
}




?>