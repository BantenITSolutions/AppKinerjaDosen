<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kategori extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

	function set($param=0,$uri=0)
	{
		$d['menu'] = $this->app_global_web->generate_index_menu();

		$where['id_kategori'] = $param;
		$get = $this->db->get_where("dlmbg_kategori",$where)->row();
		$d['kategori'] = $get->nama_kategori;

		$d['detail'] = $this->app_global_forum->generate_index_forum_thread_kategori($param,$GLOBALS['site_limit_medium'],$uri);

 		$this->load->view($GLOBALS['site_theme']."/forum/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/forum/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/forum/bg_kategori");
 		$this->load->view($GLOBALS['site_theme']."/forum/bg_footer");
	}
}
