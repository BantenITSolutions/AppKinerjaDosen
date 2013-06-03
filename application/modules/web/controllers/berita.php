<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function detail($id_param=0)
	{
		$d['menu'] = $this->app_global_web->generate_index_menu();
		$d['banner_gallery'] = $this->app_global_web->generate_banner_gallery();
		$where['id_berita'] = $id_param;
		$get_data = $this->db->get_where("dlmbg_berita",$where);
		$d['banner_berita'] = $this->app_global_web->generate_banner_berita(2);
		$d['detail_berita'] = $this->app_global_web->generate_detail_berita($id_param);
		
 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_banner");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_berita");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
