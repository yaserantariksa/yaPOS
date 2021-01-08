<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function index()
	{
		check_not_login();
		
		$this->template->load('template','dashboard');
    }
    
    public function stock_in_data() {
      $this->template->load('template','transaction/stock_in/stock_in_data');

    }

    public function stock_in_add() {
      $this->template->load('template','transaction/stock_in/stock_in_form');
    }

    public function process() {
      if(isset($_POST['in_add'])) {
        echo " prosess stock in dan add " ;
      }
    }


}
