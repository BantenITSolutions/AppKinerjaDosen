<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fakultas extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_fakultas($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("fakultas/bg_home");
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
			$d['id_universitas'] = "";
			$d['nama_fakultas'] = "";
			$d['nama_dekan'] = "";
			$d['nip_dekan'] = "";
			$d['tahun_akademik'] = "";
			$d['kota'] = "";
			$d['tgl_cetak'] = "";
			$d['sebutan_pt'] = "";
			$d['sebutan_fakultas'] = "";
			$d['sebutan_dekan'] = "";
			$d['universitas'] = $this->db->get("dlmbg_universitas");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("fakultas/bg_input");
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
			$where['id_fakultas'] = $id_param;
			$get = $this->db->get_where("dlmbg_fakultas",$where)->row();
			
			$d['id_universitas'] = $get->id_universitas;
			$d['nama_fakultas'] = $get->nama_fakultas;
			$d['nama_dekan'] = $get->nama_dekan;
			$d['nip_dekan'] = $get->nip_dekan;
			$d['tahun_akademik'] = $get->tahun_akademik;
			$d['kota'] = $get->kota;
			$d['tgl_cetak'] = $get->tgl_cetak;
			$d['sebutan_pt'] = $get->sebutan_pt;
			$d['sebutan_fakultas'] = $get->sebutan_fakultas;
			$d['sebutan_dekan'] = $get->sebutan_dekan;
			$d['universitas'] = $this->db->get("dlmbg_universitas");
			
			$d['id_param'] = $get->id_fakultas;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("fakultas/bg_input");
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
			$id['id_fakultas'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$this->db->set('id_universitas',$this->input->post("id_universitas"));
				$this->db->set('nama_fakultas',$this->input->post("nama_fakultas"));
				$this->db->set('nama_dekan',$this->input->post("nama_dekan"));
				$this->db->set('nip_dekan',$this->input->post("nip_dekan"));
				$this->db->set('tahun_akademik',$this->input->post("tahun_akademik"));
				$this->db->set('kota',$this->input->post("kota"));
				$this->db->set('tgl_cetak',$this->input->post("tgl_cetak"));
				$this->db->set('sebutan_pt',$this->input->post("sebutan_pt"));
				$this->db->set('sebutan_fakultas',$this->input->post("sebutan_fakultas"));
				$this->db->set('sebutan_dekan',$this->input->post("sebutan_dekan"));
				
				$this->db->insert("dlmbg_fakultas");
			}
			else if($tipe=="edit")
			{
				$in['id_universitas'] = $this->input->post("id_universitas");
				$in['nama_fakultas'] = $this->input->post("nama_fakultas");
				$in['nama_dekan'] = $this->input->post("nama_dekan");
				$in['nip_dekan'] = $this->input->post("nip_dekan");
				$in['tahun_akademik'] = $this->input->post("tahun_akademik");
				$in['kota'] = $this->input->post("kota");
				$in['tgl_cetak'] = $this->input->post("tgl_cetak");
				$in['sebutan_pt'] = $this->input->post("sebutan_pt");
				$in['sebutan_fakultas'] = $this->input->post("sebutan_fakultas");
				$in['sebutan_dekan'] = $this->input->post("sebutan_dekan");

				$this->db->update("dlmbg_fakultas",$in,$id);
			}
			
			redirect("admin/fakultas");
			
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
			$where['id_fakultas'] = $id_param;
			$this->db->delete("dlmbg_fakultas",$where);
			redirect("admin/fakultas");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
