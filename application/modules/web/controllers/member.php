<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['menu'] = $this->app_global_web->generate_index_menu();
		$d['dt_retrieve'] = $this->app_global_web->generate_index_member($GLOBALS['site_limit_medium'],$uri);
		$d['banner_berita'] = $this->app_global_web->generate_banner_berita(2);

 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_banner");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/member/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
