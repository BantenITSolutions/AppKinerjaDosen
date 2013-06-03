<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kinerja_bidang extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function set($bidang="",$uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['bidang'] = $bidang;
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_kinerja_bidang($bidang,$GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kinerja_bidang/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah($bidang="")
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['bidang'] = $bidang;
			$d['dosen'] = $this->db->get("dlmbg_dosen");
			$d['rekomendasi'] = $this->db->get("dlmbg_rekomendasi");
			
			$d['nomor'] = "";
			$d['id_dosen'] = "";
			$d['jenis_kegiatan'] = "";
			$d['bukti_penugasan'] = "";
			$d['sks_penugasan'] = "";
			$d['masa_penugasan'] = "";
			$d['bukti_dokumen'] = "";
			$d['sks_dokumen'] = "";
			$d['id_rekomendasi'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kinerja_bidang/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($bidang,$id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['bidang'] = $bidang;
			$d['dosen'] = $this->db->get("dlmbg_dosen");
			$d['rekomendasi'] = $this->db->get("dlmbg_rekomendasi");
			
			$where['id_kinerja'] = $id_param;
			$get = $this->db->get_where("dlmbg_kinerja",$where)->row();
			
			$d['nomor'] = $get->nomor;
			$d['id_dosen'] = $get->id_dosen;
			$d['jenis_kegiatan'] = $get->jenis_kegiatan;
			$d['bukti_penugasan'] = $get->bukti_penugasan;
			$d['sks_penugasan'] = $get->sks_penugasan;
			$d['masa_penugasan'] = $get->masa_penugasan;
			$d['bukti_dokumen'] = $get->bukti_dokumen;
			$d['sks_dokumen'] = $get->sks_dokumen;
			$d['id_rekomendasi'] = $get->id_rekomendasi;
			
			$d['id_param'] = $get->id_dosen;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("kinerja_bidang/bg_input");
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
			$id['id_kinerja'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$this->db->set('id_kinerja',"REPLACE(UUID(),'-','')",FALSE); 
				$this->db->set("nomor",$this->input->post("nomor"));
				$this->db->set("id_dosen",$this->input->post("id_dosen"));
				$this->db->set("jenis_kegiatan",$this->input->post("jenis_kegiatan"));
				$this->db->set("bukti_penugasan",$this->input->post("bukti_penugasan"));
				$this->db->set("sks_penugasan",$this->input->post("sks_penugasan"));
				$this->db->set("masa_penugasan",$this->input->post("masa_penugasan"));
				$this->db->set("bukti_dokumen",$this->input->post("bukti_dokumen"));
				$this->db->set("sks_dokumen",$this->input->post("sks_dokumen"));
				$this->db->set("jenis_kinerja",$this->input->post("jenis_kinerja"));
				$this->db->insert("dlmbg_kinerja");
				redirect("admin/kinerja_bidang/set/".$this->input->post("jenis_kinerja")."");
			}
			else if($tipe=="edit")
			{
				$this->db->set("nomor",$this->input->post("nomor"));
				$this->db->set("id_dosen",$this->input->post("id_dosen"));
				$this->db->set("jenis_kegiatan",$this->input->post("jenis_kegiatan"));
				$this->db->set("bukti_penugasan",$this->input->post("bukti_penugasan"));
				$this->db->set("sks_penugasan",$this->input->post("sks_penugasan"));
				$this->db->set("masa_penugasan",$this->input->post("masa_penugasan"));
				$this->db->set("bukti_dokumen",$this->input->post("bukti_dokumen"));
				$this->db->set("sks_dokumen",$this->input->post("sks_dokumen"));
				$this->db->update("dlmbg_kinerja");
				redirect("admin/kinerja_bidang/set/".$this->input->post("jenis_kinerja")."");
				
			}
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
			$where['id_kinerja'] = $id_param;
			$this->db->delete("dlmbg_kinerja",$where);
			redirect("admin/kinerja_bidang");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
