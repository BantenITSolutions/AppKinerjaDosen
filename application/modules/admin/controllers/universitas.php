<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class universitas extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_universitas($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("universitas/bg_home");
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
			$d['nama'] = "";
			$d['alamat'] = "";
			$d['kota'] = "";
			$d['nama_rektor'] = "";
			$d['nip_rektor'] = "";
			$d['tahun_laporan'] = "";
			$d['tanggal_cetak'] = "";
			$d['sebutan'] = "";
			$d['sebutan_pimpinan'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("universitas/bg_input");
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
			$where['id_universitas'] = $id_param;
			$get = $this->db->get_where("dlmbg_universitas",$where)->row();
			
			$d['nama'] = $get->nama;
			$d['alamat'] = $get->alamat;
			$d['kota'] = $get->kota;
			$d['nama_rektor'] = $get->nama_rektor;
			$d['nip_rektor'] = $get->nip_rektor;
			$d['tahun_laporan'] = $get->tahun_laporan;
			$d['tanggal_cetak'] = $get->tanggal_cetak;
			$d['sebutan'] = $get->sebutan;
			$d['sebutan_pimpinan'] = $get->sebutan_pimpinan;
			
			$d['id_param'] = $get->id_universitas;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("universitas/bg_input");
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
			$id['id_universitas'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$this->db->set('nama',$this->input->post("nama"));
				$this->db->set('alamat',$this->input->post("alamat"));
				$this->db->set('kota',$this->input->post("kota"));
				$this->db->set('nama_rektor',$this->input->post("nama_rektor"));
				$this->db->set('nip_rektor',$this->input->post("nip_rektor"));
				$this->db->set('tahun_laporan',$this->input->post("tahun_laporan"));
				$this->db->set('tanggal_cetak',$this->input->post("tanggal_cetak"));
				$this->db->set('sebutan',$this->input->post("sebutan"));
				$this->db->set('sebutan_pimpinan',$this->input->post("sebutan_pimpinan"));
				
				$this->db->insert("dlmbg_universitas");
			}
			else if($tipe=="edit")
			{
				$in['nama'] = $this->input->post("nama");
				$in['alamat'] = $this->input->post("alamat");
				$in['kota'] = $this->input->post("kota");
				$in['nama_rektor'] = $this->input->post("nama_rektor");
				$in['nip_rektor'] = $this->input->post("nip_rektor");
				$in['tahun_laporan'] = $this->input->post("tahun_laporan");
				$in['tanggal_cetak'] = $this->input->post("tanggal_cetak");
				$in['sebutan'] = $this->input->post("sebutan");
				$in['sebutan_pimpinan'] = $this->input->post("sebutan_pimpinan");

				$this->db->update("dlmbg_universitas",$in,$id);
			}
			
			redirect("admin/universitas");
			
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
			$where['id_universitas'] = $id_param;
			$this->db->delete("dlmbg_universitas",$where);
			redirect("admin/universitas");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
