<?php 

function _cekAdmin()
    {
        $ci = get_instance();
        $admin = $ci->session->userdata('username');
        $ci->Model_User->getWhereUser(['username' => $admin])->row();
        if (!$admin) {
            $ci->session->sess_destroy();
            redirect('/');
        }
    }
?>