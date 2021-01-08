<?php 
function check_already_login()
{
    $ci =& get_instance() ;
            if (!empty($_SESSION['USERDATA']['user_id'])){
                redirect('dashboard') ;
            }

}

function check_not_login()
{

    $ci =& get_instance() ;

        if (empty($_SESSION['USERDATA']['user_id'])){
        redirect('auth/login') ;
        }
}

function check_admin()
{
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 1 ) {
        redirect('dashboard');
    }
}

function indo_currency($value)
{
    return 'Rp. ' . number_format($value, 0, ",", ".");
}