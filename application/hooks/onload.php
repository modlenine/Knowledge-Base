<?php
class Onload
{
    private $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }



    ////////////////////////////////////////////////////////////////
    /////////////// CHECK LOGIN HOOK ทำงานในระดับบนสุด
    ///////////////////////////////////////////////////////////////
    public function checklogin()
    {
        $controller = $this->ci->router->class;
        $method = $this->ci->router->method;
        $checkpage = $this->ci->uri->segment(1);



        if ($this->ci->session->userdata("ecode") == "") {
            if ($controller != "login") {
                header("refresh:0; url=" . base_url('login.html'));
                exit();
            }
        } else {
            // Code Verify user
            if (checkVerifyUser($_SESSION['ecode']) == false) {
                if ($this->ci->input->post("btn_saveverify")) {
                } else {
                    if ($checkpage != "verifyuser.html") {
                        header("refresh:0; url=" . base_url('verifyuser.html'));
                    }
                }
            }
            // Code Verify user
        }
    }

    ////////////////////////////////////////////////////////////////
    /////////////// CHECK LOGIN HOOK ทำงานในระดับบนสุด
    ///////////////////////////////////////////////////////////////








}//End onload Class
