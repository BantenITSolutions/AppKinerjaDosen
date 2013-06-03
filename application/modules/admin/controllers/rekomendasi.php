<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rekomendasi extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_rekomendasi($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("rekomendasi/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['rekomendasi'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("rekomendasi/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_rekomendasi'] = $id_param;
			$get = $this->db->get_where("dlmbg_rekomendasi",$where)->row();
			
			$d['rekomendasi'] = $get->rekomendasi;
			
			$d['id_param'] = $get->id_rekomendasi;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("rekomendasi/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_rekomendasi'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$this->db->set('id_rekomendasi',"REPLACE(UUID(),'-','')",FALSE); 
				$this->db->set('rekomendasi',$this->input->post("rekomendasi"));
				
				$this->db->insert("dlmbg_rekomendasi");
			}
			else if($tipe=="edit")
			{
				$in['rekomendasi'] = $this->input->post("rekomendasi");
				$this->db->update("dlmbg_rekomendasi",$in,$id);
			}
			
			redirect("admin/rekomendasi");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_rekomendasi'] = $id_param;
			$this->db->delete("dlmbg)rekomendasi",$where);
			redirect("admin/rekomendasi");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
