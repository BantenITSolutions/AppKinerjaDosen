<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$set['cari_data'] = $_POST['cari'];
		$this->session->set_userdata($set);

		$d['menu'] = $this->app_global_web->generate_index_menu();
		$d['banner_gallery'] = $this->app_global_web->generate_banner_gallery();

		$d['dosen'] = $this->app_global_web->generate_index_cari_dosen($GLOBALS['site_limit_medium'],$uri);
		$d['kinerja'] = $this->app_global_web->generate_index_cari_kinerja($GLOBALS['site_limit_medium'],$uri);
		$d['member'] = $this->app_global_web->generate_index_cari_member($GLOBALS['site_limit_medium'],$uri);

		$d['banner_berita'] = $this->app_global_web->generate_banner_berita(2);

 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_banner");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/search/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
