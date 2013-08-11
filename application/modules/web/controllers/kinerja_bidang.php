<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kinerja_bidang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function set($param='',$uri=0)
	{
		if($this->session->userdata("logged_in")=="")
		{
			?>
			<script type="text/javascript">alert("anda harus login untuk mengakses menu ini"); window.location = "<?php echo base_url(); ?>";</script>
			<?php
		}
		else
		{
			$d['bidang'] = $param;
			$d['menu'] = $this->app_global_web->generate_index_menu();
			$d['banner_gallery'] = $this->app_global_web->generate_banner_gallery();
			$d['banner_berita'] = $this->app_global_web->generate_banner_berita(2);
			$d['dt_retrieve'] = $this->app_global_web->generate_index_kinerja_bidang($param,$GLOBALS['site_limit_medium'],$uri);

	 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
	 		$this->load->view($GLOBALS['site_theme']."/front/bg_banner");
	 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
	 		$this->load->view($GLOBALS['site_theme']."/front/kinerja_bidang/bg_home");
	 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
		}
	}

	function detail($bidang='',$param='')
	{
		$d['bidang'] = $bidang;
		$d['menu'] = $this->app_global_web->generate_index_menu();
		$d['banner_gallery'] = $this->app_global_web->generate_banner_gallery();
		$d['banner_berita'] = $this->app_global_web->generate_banner_berita(2);
		$d['dt_retrieve'] = $this->app_global_web->generate_detail_kinerja_bidang($bidang,$param);

 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_banner");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/kinerja_bidang/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
