<?php

function _cekAdmin()
{
    $ci = get_instance();
    $admin = $ci->session->userdata('username');
    $data = $ci->Model_User->getWhereUser(['username' => $admin])->row();
    if (!$admin) {
        $ci->session->sess_destroy();
        redirect('/');
    } else {
        $ci->session->set_userdata([
            'username' => $admin,
            'role' => $data->role
        ]);
    }
}
function _cekRole()
{
    $ci = get_instance();
    $admin = $ci->session->userdata('username');
    $cekRole = $ci->Model_User->getWhereUser(['username' => $admin])->row();
    if (!$admin) {
        $ci->session->sess_destroy();
        redirect('/');
    } else {
        if ($cekRole->role !== 'ADMIN') {
            redirect('User');
        }
    }
}
?>