<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/bangkok");
        $this->db2 = $this->load->database('saleecolour', TRUE);
    }


    private function escape_string()
    {
        return mysqli_connect("192.190.2.3", "chainarong", "Admin1234", "saleecolour");
    }


    //Start checklogin method
    public function checklogin()
    {
        if ($this->input->post("login_submit") != "") {

            $this->load->library('user_agent');
            $user = mysqli_real_escape_string($this->escape_string(), $_POST['login_username']);
            $pass = mysqli_real_escape_string($this->escape_string(), md5($_POST['login_password']));
            // If System go on Please add md5 to element name password 'md5'

            $checkuser = $this->db2->query(sprintf("SELECT * FROM member WHERE username = '%s' and password = '%s'  ", $user, $pass));
            $checkdata = $checkuser->num_rows();

            if ($checkdata == 0) {
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" style="font-size:15px;text-align: center;">ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง</div>');
                redirect('login.html');
                die();
            } else {

                foreach ($checkuser->result_array() as $r) {
                    $_SESSION['username'] = $r['username'];
                    $_SESSION['password'] = $r['password'];
                    $_SESSION['Fname'] = $r['Fname'];
                    $_SESSION['Lname'] = $r['Lname'];
                    $_SESSION['Dept'] = $r['Dept'];
                    $_SESSION['ecode'] = $r['ecode'];
                    $_SESSION['DeptCode'] = $r['DeptCode'];
                    $_SESSION['memberemail'] = $r['memberemail'];
                    $_SESSION['file_img'] = $r['file_img'];

                    // insert login log
                    session_write_close();
                }


                // Code Verify user
                if (checkVerifyUser($_SESSION['ecode']) == false) {
                    header("refresh:0; url=" . base_url('verifyuser.html'));
                } else {
                    getUserAgent("Login เข้าใช้งานโปรแกรม","");
                    $uri = isset($_SESSION['RedirectKe']) ? $_SESSION['RedirectKe'] : '/intsys/kb';
                    header('location:' . $uri);
                    // header("refresh:0; url=" . base_url());
                }
                // Code Verify user

            }
        }
    } //End checklogin


    public function save_verify()
    {
        if ($this->input->post("btn_saveverify")) {

            // CHECK MANAGER
            $user_perg = '';
            switch (getUser()->ecode) {
                case "M0282":
                    $user_perg = 70;
                    break;
                case "M0025":
                    $user_perg = 70;
                    break;
                case "M0051":
                    $user_perg = 70;
                    break;
                case "M0503":
                    $user_perg = 70;
                    break;
                case "M1344":
                    $user_perg = 70;
                    break;
                case "M0040":
                    $user_perg = 70;
                    break;
                case "M2066":
                    $user_perg = 70;
                    break;
                case "M0003":
                    $user_perg = 70;
                    break;
                case "M0002":
                    $user_perg = 70;
                    break;
                case "M0501":
                    $user_perg = 70;
                    break;
                case "M0449":
                    $user_perg = 70;
                    break;
                case "M1848":
                    $user_perg = 70;
                    break;
                default:
                    $user_perg = 40;
            }


            $verify = array(
                "user_fname" => $this->input->post("user_fname"),
                "user_lname" => $this->input->post("user_lname"),
                "user_ecode" => $this->input->post("user_ecode"),
                "user_deptname" => $this->input->post("user_deptname_confirm"),
                "user_deptcode" => $this->input->post("user_deptcode_confirm"),
                "user_image" => getUser()->file_img,
                "user_email" => $this->input->post("user_email"),
                "user_datetime" => date("Y-m-d H:i:s"),
                "user_status" => "activate",
                "user_perg" => $user_perg
            );

            $this->db->insert("kb_user", $verify);
        }
    }




    public function logout()
    {
        getUserAgent("Logout ออกจากโปรแกรม","");
        session_destroy();
        $this->session->unset_userdata('referrer_url');
        header("refresh:0; url=" . base_url('login.html'));
        die();
    }



    public function getuser()
    {
        $sessionEcode = $_SESSION['ecode'];
        $sql = $this->db2->query("SELECT * FROM member WHERE ecode = '$sessionEcode' ");
        return $sql->row();
    }


    public function callLogin()
    {
        if ($this->session->userdata("ecode") == "") {
            header("refresh:0; url=" . base_url('login.html'));
            exit();
        }
    }



    
}/* End of file ModelName.php */
