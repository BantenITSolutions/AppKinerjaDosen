<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cetak extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_dosen_cetak($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("cetak/bg_home");
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
			
			$d['no_sertifikat'] = $get->no_sertifikat;
			$d['nip'] = $get->nip;
			$d['nidn'] = $get->nidn;
			$d['nama'] = $get->nama;
			$d['nama_pt'] = $get->nama_pt;
			$d['alamat_pt'] = $get->alamat_pt;
			$d['fakultas'] = $get->fakultas;
			$d['prodi'] = $get->prodi;
			$d['jab_fungsional'] = $get->jab_fungsional;
			$d['tgl_lahir'] = $get->tgl_lahir;
			$d['bln_lahir'] = $get->bln_lahir;
			$d['thn_lahir'] = $get->thn_lahir;
			$d['tmp_lahir'] = $get->tmp_lahir;
			$d['s1'] = $get->s1;
			$d['s2'] = $get->s2;
			$d['s3'] = $get->s3;
			$d['jenis'] = $get->jenis;
			$d['bidang_ilmu'] = $get->bidang_ilmu;
			$d['no_hp'] = $get->no_hp;
			$d['tahun_akademik'] = $get->tahun_akademik;
			$d['asesor1'] = $get->asesor1;
			$d['asesor2'] = $get->asesor2;
			$d['email'] = $get->email;
			$d['gambar'] = $get->gambar;
			
			$d['id_param'] = $get->id_dosen;
			$d['tipe'] = "edit";
			$d['dt_retrieve'] = $this->app_global_admin_model->generate_index_dosen_cetak_detail($get->id_dosen);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("cetak/bg_detail");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function cetak_data($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_dosen'] = $id_param;
			$get = $this->db->get_where("dlmbg_dosen",$where)->row();
			
			$d['no_sertifikat'] = $get->no_sertifikat;
			$d['nip'] = $get->nip;
			$d['nidn'] = $get->nidn;
			$d['nama'] = $get->nama;
			$d['nama_pt'] = $get->nama_pt;
			$d['alamat_pt'] = $get->alamat_pt;
			$d['fakultas'] = $get->fakultas;
			$d['prodi'] = $get->prodi;
			$d['jab_fungsional'] = $get->jab_fungsional;
			$d['tgl_lahir'] = $get->tgl_lahir;
			$d['bln_lahir'] = $get->bln_lahir;
			$d['thn_lahir'] = $get->thn_lahir;
			$d['tmp_lahir'] = $get->tmp_lahir;
			$d['s1'] = $get->s1;
			$d['s2'] = $get->s2;
			$d['s3'] = $get->s3;
			$d['jenis'] = $get->jenis;
			$d['bidang_ilmu'] = $get->bidang_ilmu;
			$d['no_hp'] = $get->no_hp;
			$d['tahun_akademik'] = $get->tahun_akademik;
			$d['asesor1'] = $get->asesor1;
			$d['asesor2'] = $get->asesor2;
			$d['email'] = $get->email;
			$d['gambar'] = $get->gambar;
			
			$d['id_param'] = $get->id_dosen;
			$d['tipe'] = "edit";
			$d['dt_retrieve'] = $this->app_global_admin_model->generate_index_dosen_cetak_detail($get->id_dosen);
			
 			$this->load->view("cetak/bg_cetak",$d);
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
