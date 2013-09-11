<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kesimpulan extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_dosen_kesimpulan($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kesimpulan/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function detail($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_dosen'] = $id_param;
			$get = $this->db->get_where("dlmbg_dosen",$where)->row();

			$d['nama'] = $get->nama;
			$d['nip'] = $get->nip;
			$d['no_sertifikat'] = $get->no_sertifikat;
			$d['jenis'] = $get->jenis;
			$d['id_dosen'] = $get->id_dosen;
			$d['tahun_akademik'] = $get->tahun_akademik;
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kesimpulan/bg_detail");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
