<?php
class confn{
    private $ci;
    function __construct()
    {
        $this->ci =&get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }
    function conci(){
        return $this->ci;
    }
}



function cfn()
{
    $obj = new confn();
    return $obj->conci();
}



function conDateTimeFromDb($datetime)
{
    $ori = date_create($datetime);
    return date_format($ori , "d/m/Y H:i:s");
}

function conDeptcodeToDeptname($deptcode)
{
    $sql = cfn()->db->query("SELECT dept_name FROM kb_dept WHERE dept_code = '$deptcode' ");
    return $sql->row()->dept_name;
}




?>